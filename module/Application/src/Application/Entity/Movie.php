<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author Administrator
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\Core\CoreEntity;

/** @ORM\Entity */
class Movie extends CoreEntity {

    /** @ORM\Column(type="string", nullable=true) */
    protected $name;

    /** @ORM\Column(type="string", nullable=true) */
    protected $description;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"remove"})
     */
    protected $file;

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getFile() {
        return $this->file;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setFile($file) {
        $this->file = $file;
    }

}
