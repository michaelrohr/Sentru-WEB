<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SentruController
 *
 * @author michaelrohr
 */

namespace Sentru\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class SentruController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

    public function leadershipAction() {
        return new ViewModel();
    }

    public function impulsdaysAction() {
        return new ViewModel();
    }

    public function teambuildingAction() {
        return new ViewModel();
    }

    public function aboutAction() {
        return new ViewModel();
    }

    public function locationAction() {
        return new ViewModel();
    }

    public function contactAction() {
        return new ViewModel();
    }

    public function seminareAction() {
        return new ViewModel();
    }

}
