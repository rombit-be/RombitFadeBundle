<?php
namespace Rombit\FadeBundle\Listener;

use Doctrine\ORM\EntityManager;
use Rombit\FadeBundle\Entity\Fadesettings;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class ModifyResponseListener
{
    private $templating;
    private $em;

    public function __construct(EngineInterface $templating, EntityManager $em)
    {
        $this->templating = $templating;
        $this->em = $em;
    }

    public function onKernelResponse( $event)
    {
        // We probably want to ignore sub-requests
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $response = $event->getResponse();
        $content = $response->getContent();

        // Get opacity
        $fadesettings = $this->em->getRepository('RombitFadeBundle:Fadesettings')->find();
        if (!$fadesettings) {
            $fadesettings = new Fadesettings();
            $this->em->persist($fadesettings);
            $this->em->flush();
        }

        $now = new \DateTime('now');
        $datediff = $fadesettings->getUpdatedAt()->diff($now);
        if ($fadesettings->getActive() && $datediff->days > 0) {
            $fadesettings->setOpacity(($fadesettings->getOpacity() - 0.1));
            $fadesettings->setUpdatedAt($now);
            $this->em->flush();
        }

        // make extra JS
        $our_stuff = $this->templating->render(
            'RombitFadeBundle:Default:index.html.twig',
            array(
                'opacity' => $fadesettings->getOpacity(),
            )
        );

        // Here we inject our stuff
        $content = preg_replace('/\<\/body\>/is', $our_stuff.'</body>', $content);

        $response->setContent($content);
    }
}
