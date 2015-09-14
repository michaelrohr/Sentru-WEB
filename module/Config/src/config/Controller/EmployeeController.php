<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Config\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Config\Service\EmployeeService;
use Config\Form\EmployeeForm;
use Application\Entity\Employee;

class EmployeeController extends AbstractActionController {

    protected $employeeService;

    function __construct(EmployeeService $service) {
        $this->employeeService = $service;
    }

    public function indexAction() {
        $employees = $this->employeeService->getAllEmployees();

        return array(
            'employees' => $employees
        );
    }

    public function addAction() {
        $form = new EmployeeForm();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $employee = new Employee;
            $form->bind($employee);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->employeeService->add($employee);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'employee', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction() {
        $form = new EmployeeForm();
        $request = $this->getRequest();
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $employee = $this->employeeService->getEmployee($id);
        $form->bind($employee);

        if ($request->isPost()) {
            $form->bind($employee);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->employeeService->edit($employee);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'employee', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function deleteAction() {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($this->employeeService->delete($id)) {
            $this->flashMessenger()->addSuccessMessage('Benutzer wurde gelöscht !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'employee', 'action' => 'index'), null);
        } else {
            $this->flashMessenger()->addErrorMessage('Es ist ein Fehler aufgetreten !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'employee', 'action' => 'index'), null);
        }
    }

}
