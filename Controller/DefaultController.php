<?php

namespace Rombit\FadeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function startAction(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $fadesettings = $em->getRepository('RombitFadeBundle:Fadesettings')->findOneOrCreate();

        $fadesettings->setOpacity(1.0);
        $fadesettings->setUpdatedAt(new \DateTime('now'));
        $fadesettings->setActive(true);
        $em->flush();

        return new Response('ok');
    }

    public function stopAction(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $fadesettings = $em->getRepository('RombitFadeBundle:Fadesettings')->findOneOrCreate();

        $fadesettings->setOpacity(1.0);
        $fadesettings->setUpdatedAt(new \DateTime('now'));
        $fadesettings->setActive(false);
        $em->flush();

        return new Response('ok');
    }

    public function upAction(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $fadesettings = $em->getRepository('RombitFadeBundle:Fadesettings')->findOneOrCreate();

        if ($fadesettings->getActive()) {
            $fadesettings->setOpacity(min(1.0, $fadesettings->getOpacity() + 0.1));
            $fadesettings->setUpdatedAt(new \DateTime('now'));
            $em->flush();
        }

        return new Response('ok');
    }

    public function downAction(Request $request)
    {
        $em = $this->get('doctrine.orm.default_entity_manager');
        $fadesettings = $em->getRepository('RombitFadeBundle:Fadesettings')->findOneOrCreate();

        if ($fadesettings->getActive()) {
            $fadesettings->setOpacity(max(0.0, $fadesettings->getOpacity() - 0.1));
            $fadesettings->setUpdatedAt(new \DateTime('now'));
            $em->flush();
        }

        return new Response('ok');
    }

}
