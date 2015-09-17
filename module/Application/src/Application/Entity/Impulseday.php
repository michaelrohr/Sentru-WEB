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
class Impulseday extends CoreEntity {

    /**
     * @var string
     * @ORM\Column(type="string",nullable=true)
     */
    protected $startTime;

    /**
     * @var string
     * @ORM\Column(type="string",nullable=true)
     */
    protected $endTime;

    /** @ORM\Column(type="text", nullable=true) */
    protected $description;

    /**
     *  @ORM\ManyToOne(targetEntity="Application\Entity\Location",cascade={"persist", "remove"})
     */
    protected $location;

    function getStartTime() {
        return $this->startTime;
    }

    function getEndTime() {
        return $this->endTime;
    }

    function getDescription() {
        return $this->description;
    }

    function getLocation() {
        return $this->location;
    }

    function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLocation($location) {
        $this->location = $location;
    }

}
