<?php

namespace Config\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ConfigService
 * 
 */
class ImpulsedayService extends CoreService {

    public function getAllImpulsedays() {
        $impulseday = $this->entityManager->getRepository('Application\Entity\Impulseday')->findAll();
        return $impulseday;
    }

    public function getImpulseday($id) {
        $impulseday = $this->entityManager->getRepository('Application\Entity\Impulseday')->findOneBy(array('id' => $id));
        return $impulseday;
    }

    public function add($impulseday) {
        $this->save($impulseday);
        return $impulseday;
    }

    public function edit($impulseday) {
        $this->save($impulseday);
        return $impulseday;
    }

    public function delete($id) {
        $entity = $this->getImpulseday($id);
        $this->remove($entity);
        return true;
    }

    public function setServiceManager(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

}
