<?php

namespace Config\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Controller\TestimonialController;

class TestimonialControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Config\Service\TestimonialService');

        return new TestimonialController($service);
    }

}
