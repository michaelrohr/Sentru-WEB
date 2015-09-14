<?php

namespace Application\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

abstract class CoreEntity {

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="integer", nullable=true) */
    protected $active;

    /**
     * @var string
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $createDate;

    /**
     * @var string
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $updateDate;

    function getActive() {
        return $this->active;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCreateDate() {
        $this->createDate = new DateTime("now");
    }

    function setUpdateDate() {
        $this->updateDate = new DateTime("now");
    }

    function setDate() {
        if ($this->getCreateDate() == null) {
            $this->setCreateDate();
            $this->setUpdateDate();
        } else {
            $this->setUpdateDate();
        }
    }

    function getCreateDate() {
        return $this->createDate;
    }

    function getUpdateDate() {
        return $this->updateDate;
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps() {
        $this->setUpdateDate(new DateTime('now'));

        if ($this->getCreateDate() == null) {
            $this->setCreateDate(new DateTime('now'));
        }
    }

}
