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
class File extends CoreEntity {

    /** @ORM\Column(type="string") */
    protected $path;

    /** @ORM\Column(type="string") */
    protected $fileName;

    function getPath() {
        return $this->path;
    }

    function getFileName() {
        return $this->fileName;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

}
