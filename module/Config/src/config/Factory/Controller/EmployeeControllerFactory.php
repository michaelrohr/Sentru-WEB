<?php

namespace Config\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Controller\EmployeeController;

class EmployeeControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Config\Service\EmployeeService');

        return new EmployeeController($service);
    }

}
