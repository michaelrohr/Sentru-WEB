<?php
namespace Application\Common\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerHolder implements EntityManagerHolderInterface {
    private $entityManager;
    
    public function __construct(EntityManagerInterface $em) {
        $this->entityManager = $em;
        // Fix exception: Doctrine\DBAL\DBALException: Unknown database type enum requested
        $platform = $em->getConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');
    }
    
    public function getEntityManager() {
        if(!$this->entityManager->isOpen()) {
            $this->entityManager = $this->createEntityManager($this->entityManager);
        }
        return $this->entityManager;
    }
    
    public function createEntityManager(EntityManagerInterface $em) {
        return EntityManager::create($em->getConnection(), $em->getConfiguration());
    }
}
