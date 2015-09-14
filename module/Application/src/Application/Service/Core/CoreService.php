<?php

namespace Application\Service\Core;

use Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * CoreService
 * 
 * Implements core service ServiceManagerAwareInterface
 */
abstract class CoreService implements ServiceManagerAwareInterface {

    protected $serviceManager;
    protected $entityManager;

    /**
     * save
     * save entity.
     *
     * @param    $entity
     * @return   object $entity
     *
     */
    public function save($entity, $flush = true) {
        $entity->setDate();
        $this->entityManager->persist($entity);
        if ($flush) {
            $this->entityManager->flush();
        }
        return $entity;
    }

    public function remove($entity, $flush = true) {
        $this->entityManager->remove($entity);
        if ($flush) {
            $this->entityManager->flush();
        }
        return $entity;
    }

}
