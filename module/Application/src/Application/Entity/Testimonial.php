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
class Testimonial extends CoreEntity {

    /** @ORM\Column(type="string", nullable=true) */
    protected $firstName;

    /** @ORM\Column(type="string", nullable=true) */
    protected $lastName;

    /** @ORM\Column(type="string", nullable=true) */
    protected $email;

    /** @ORM\Column(type="string", nullable=true) */
    protected $company;

    /** @ORM\Column(type="string", nullable=true) */
    protected $position;

    /** @ORM\Column(type="text", nullable=true) */
    protected $statement;

    /**
     *  @ORM\OneToOne(targetEntity="Application\Entity\File",cascade={"persist", "remove"})
     */
    protected $logo;

    function getStatement() {
        return $this->statement;
    }

    function setStatement($statement) {
        $this->statement = $statement;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getCompany() {
        return $this->company;
    }

    function getPosition() {
        return $this->position;
    }

    function getLogo() {
        return $this->logo;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCompany($company) {
        $this->company = $company;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

}
