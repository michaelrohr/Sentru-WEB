<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Administrator
 */

namespace Application\Entity;

use Application\Entity\Core\CoreEntity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\LocationsRepository") */
class Location extends CoreEntity {

    /** @ORM\Column(type="string", nullable=true) */
    protected $name;

    /** @ORM\Column(type="string", nullable=true) */
    protected $website;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\Address",cascade={"persist"})
     */
    protected $address;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"persist", "remove"})
     */
    protected $picture;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"persist", "remove"})
     */
    protected $map;

    function getName() {
        return $this->name;
    }

    function getWebsite() {
        return $this->website;
    }

    function getAddress() {
        return $this->address;
    }

    function getPicture() {
        return $this->picture;
    }

    function getMap() {
        return $this->map;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

    function setMap($map) {
        $this->map = $map;
    }

}
