<?php

namespace Config\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Controller\ConfigController;

class ConfigControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Config\Service\ConfigService');

        return new ConfigController($service);
    }

}
