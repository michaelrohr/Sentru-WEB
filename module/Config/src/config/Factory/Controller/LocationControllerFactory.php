<?php

namespace Config\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Controller\LocationController;

class LocationControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Config\Service\LocationService');
        $form = $sm->get('FormElementManager')->get('Config\Form\LocationForm');

        return new LocationController($service, $form);
    }

}
