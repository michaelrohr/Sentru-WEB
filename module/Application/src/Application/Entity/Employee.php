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
class Employee extends CoreEntity {

    /** @ORM\Column(type="string") */
    protected $firstName;

    /** @ORM\Column(type="string") */
    protected $lastName;

    /** @ORM\Column(type="string") */
    protected $quote;

    /** @ORM\Column(type="string") */
    protected $aboutMe;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"persist", "remove"})
     */
    protected $image;

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getQuote() {
        return $this->quote;
    }

    function getAboutMe() {
        return $this->aboutMe;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setQuote($quote) {
        $this->quote = $quote;
    }

    function setAboutMe($aboutMe) {
        $this->aboutMe = $aboutMe;
    }

}
