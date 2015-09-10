<?php
namespace Application\Common\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Ddl\Column\Varchar;
use User\Service\UserService;
use Application\Common\Service\EntityManagerHolder;

class EntityManagerHolderFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new EntityManagerHolder($serviceLocator->get('Doctrine\ORM\EntityManager'));
    }
}
