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
use Config\Service\LocationService;
use Config\Form\LocationForm;
use Application\Entity\Location;

class LocationController extends AbstractActionController {

    protected $locationService;

    function __construct(LocationService $service) {
        $this->locationService = $service;
        
    }

    public function indexAction() {
        $locations = $this->locationService->getAllLocations();

        if ($locations == null) {
            $this->flashMessenger()->addInfoMessage('Es sind noch keine Impulstage vorhanden !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'location', 'action' => 'add'), null);
        }

        return array(
            'locations' => $locations
        );
    }

    public function addAction() {
        $request = $this->getRequest();
        $form = new LocationForm();
        if ($request->isPost()) {
            $location = new Location;
            $form->bind($location);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->locationService->add($location);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'location', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction() {
        $form = new LocationForm();
        $request = $this->getRequest();
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $location = $this->locationService->getLocation($id);
        $form->bind($location);

        if ($request->isPost()) {
            $form->bind($location);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->locationService->edit($location);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'location', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function deleteAction() {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($this->locationService->delete($id)) {
            $this->flashMessenger()->addSuccessMessage('Benutzer wurde gelöscht !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'location', 'action' => 'index'), null);
        } else {
            $this->flashMessenger()->addErrorMessage('Es ist ein Fehler aufgetreten !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'location', 'action' => 'index'), null);
        }
    }

}
