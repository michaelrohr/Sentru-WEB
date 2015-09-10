<?php

namespace Application\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $sm = $serviceLocator->getServiceLocator();
        $service = $sm->get('Application\Service\IndexService');
                   
        return new IndexController($service);
    }

}
