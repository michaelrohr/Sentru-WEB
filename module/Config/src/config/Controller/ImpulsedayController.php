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
use Config\Service\ImpulsedayService;
use Config\Form\ImpulsedayForm;
use Application\Entity\Impulseday;

class ImpulsedayController extends AbstractActionController {

    protected $impulsedayService;

    function __construct(ImpulsedayService $service) {
        $this->impulsedayService = $service;
    }

    public function indexAction() {
        $impulsedays = $this->impulsedayService->getAllImpulsedays();

        if ($impulsedays == null) {
            $this->flashMessenger()->addInfoMessage('Es sind noch keine Impulstage vorhanden !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'impulseday', 'action' => 'add'), null);
        }

        return array(
            'impulsedays' => $impulsedays
        );
    }

    public function addAction() {
        $form = new ImpulsedayForm();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $impulseday = new Impulseday;
            $form->bind($impulseday);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->impulsedayService->add($impulseday);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'impulseday', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction() {
        $form = new ImpulsedayForm();
        $request = $this->getRequest();
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $impulseday = $this->impulsedayService->getImpulseday($id);
        $form->bind($impulseday);

        if ($request->isPost()) {
            $form->bind($impulseday);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->impulsedayService->edit($impulseday);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'impulseday', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function deleteAction() {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($this->impulsedayService->delete($id)) {
            $this->flashMessenger()->addSuccessMessage('Benutzer wurde gelöscht !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'impulseday', 'action' => 'index'), null);
        } else {
            $this->flashMessenger()->addErrorMessage('Es ist ein Fehler aufgetreten !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'impulseday', 'action' => 'index'), null);
        }
    }

}
