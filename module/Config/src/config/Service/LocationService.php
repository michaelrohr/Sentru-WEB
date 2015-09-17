<?php

namespace Config\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ConfigService
 * 
 */
class LocationService extends CoreService {

    public function getAllLocations() {
        $location = $this->entityManager->getRepository('Application\Entity\Location')->findAll();
        return $location;
    }

    public function getLocation($id) {
        $location = $this->entityManager->getRepository('Application\Entity\Location')->findOneBy(array('id' => $id));
        return $location;
    }

    public function add($location) {
        $this->save($location);
        return $location;
    }

    public function edit($location) {
        $this->save($location);
        return $location;
    }

    public function delete($id) {
        $entity = $this->getLocation($id);
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
