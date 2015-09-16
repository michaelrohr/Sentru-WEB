<?php

namespace Config\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Controller\ImpulsedayController;

class ImpulsedayControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Config\Service\ImpulsedayService');
        $form = $sm->get('FormElementManager')->get('Config\Form\ImpulsedayForm');

        return new ImpulsedayController($service, $form);
    }

}
