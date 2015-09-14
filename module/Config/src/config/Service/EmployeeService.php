<?php

namespace Config\Service;

use Application\Service\Core\CoreService;
use Zend\ServiceManager\ServiceManager;

/**
 * ConfigService
 * 
 */
class EmployeeService extends CoreService {

    public function getAllEmployees() {
        $employee = $this->entityManager->getRepository('Application\Entity\Employee')->findAll();
        return $employee;
    }

    public function getEmployee($id) {
        $employee = $this->entityManager->getRepository('Application\Entity\Employee')->findOneBy(array('id' => $id));
        return $employee;
    }

    public function add($employee) {
        $this->save($employee);
        return $employee;
    }

    public function edit($employee) {
        $this->save($employee);
        return $employee;
    }

    public function delete($id) {
        $entity = $this->getEmployee($id);
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
