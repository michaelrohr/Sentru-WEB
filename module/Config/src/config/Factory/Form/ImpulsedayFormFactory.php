<?php

namespace Config\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Config\Form\ImpulsedayForm;

class ImpulsedayFormFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {

        $services = $serviceLocator->getServiceLocator();
        $entityManager = $services->get('Doctrine\ORM\EntityManager');

        $form = new ImpulsedayForm($entityManager);

        return $form;
    }

}
