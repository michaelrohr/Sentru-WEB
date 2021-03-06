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

    /** @ORM\Column(type="string", nullable=true) */
    protected $firstName;

    /** @ORM\Column(type="string", nullable=true) */
    protected $lastName;

    /** @ORM\Column(type="string", nullable=true) */
    protected $email;

    /** @ORM\Column(type="text", nullable=true) */
    protected $quote;

    /** @ORM\Column(type="text", nullable=true) */
    protected $aboutMe;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"persist", "remove"})
     */
    protected $image;

    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

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
