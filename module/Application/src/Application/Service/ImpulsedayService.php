<?php

namespace Application\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ImpulsedayService
 * 
 */
class ImpulsedayService extends CoreService {

    public function getAllTestimonials() {
        $impulsedays = $this->entityManager->getRepository('Application\Entity\Impulseday')->findAll();
        return $impulsedays;
    }

    public function setServiceManager(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

}
