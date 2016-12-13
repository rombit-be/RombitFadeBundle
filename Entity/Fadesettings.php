<?php
/**
 * Created by PhpStorm.
 * User: cjpa
 * Date: 13/12/16
 * Time: 19:41
 */

namespace Rombit\FadeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Fadesettings
 * @package Rombit\FadeBundle\Entity
 *
 * @ORM\Entity
 */
class Fadesettings
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var float
     * @ORM\Column(type="float", options={"default" : 1.0})
     */
    private $opacity;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $active;


    function __construct()
    {
        // We start with full opacity
        $this
            ->setOpacity(1.0)
            ->setUpdatedAt(new \DateTime('now'))
            ->setActive(false)
        ;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * @param float $opacity
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;

    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
}