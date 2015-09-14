<?php

namespace Config\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ConfigService
 * 
 */
class ConfigService extends CoreService {

    /**
     *
     *
     */
    public function setServiceManager(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

}
