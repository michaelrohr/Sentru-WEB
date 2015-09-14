<?php

namespace Application\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * IndexService
 * 
 */
class IndexService extends CoreService {

    public function getAllTestimonials() {
        $testimonial = $this->entityManager->getRepository('Application\Entity\Testimonial')->findAll();
        return $testimonial;
    }

    public function getAllEmployees() {
        $employee = $this->entityManager->getRepository('Application\Entity\Employee')->findAll();
        return $employee;
    }

    public function setServiceManager(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

}
