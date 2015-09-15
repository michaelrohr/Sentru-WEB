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

/** @ORM\Entity */
class Address extends CoreEntity {

    /** @ORM\Column(type="string", nullable=true) */
    protected $place;

    /** @ORM\Column(type="integer", nullable=true) */
    protected $postalcode;

    /** @ORM\Column(type="string", nullable=true) */
    protected $street;

    /** @ORM\Column(type="string", nullable=true) */
    protected $number;

    /** @ORM\Column(type="string", nullable=true) */
    protected $country;

    function getPlace() {
        return $this->place;
    }

    function getPostalcode() {
        return $this->postalcode;
    }

    function getStreet() {
        return $this->street;
    }

    function getNumber() {
        return $this->number;
    }

    function getCountry() {
        return $this->country;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setPostalcode($postalcode) {
        $this->postalcode = $postalcode;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setCountry($country) {
        $this->country = $country;
    }

}
