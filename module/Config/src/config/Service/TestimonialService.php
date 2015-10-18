<?php

namespace Config\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ConfigService
 * 
 */
class TestimonialService extends CoreService {

    public function getAllTestimonials() {
        $testimonial = $this->entityManager->getRepository('Application\Entity\Testimonial')->findAll();
        return $testimonial;
    }

    public function getTestimonial($id) {
        $testimonial = $this->entityManager->getRepository('Application\Entity\Testimonial')->findOneBy(array('id' => $id));
        return $testimonial;
    }

    public function add($testimonial, $file) {
        $this->save($testimonial);
        return $testimonial;
    }

    public function edit($testimonial, $file) {
//        $tes timonial->setLogo($file);
        $this->save($testimonial);
        return $testimonial;
    }

    public function delete($id) {
        $entity = $this->getTestimonial($id);
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
