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
use Config\Service\TestimonialService;
use Config\Form\TestimonialForm;
use Application\Entity\Testimonial;

class TestimonialController extends AbstractActionController {

    protected $testimonialService;

    function __construct(TestimonialService $service) {
        $this->testimonialService = $service;
    }

    public function indexAction() {
        $testimonials = $this->testimonialService->getAllTestimonials();
        
        if($testimonials==null){
            $this->flashMessenger()->addInfoMessage('Es sind noch keine Testimonials vorhanden !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'add'), null);
        }

        return array(
            'testimonials' => $testimonials
        );
    }

    public function addAction() {
        $form = new TestimonialForm();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $testimonial = new Testimonial;
            $form->bind($testimonial);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->testimonialService->add($testimonial);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction() {
        $form = new TestimonialForm();
        $request = $this->getRequest();
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $testimonial = $this->testimonialService->getTestimonial($id);
        $form->bind($testimonial);

        if ($request->isPost()) {
            $form->bind($testimonial);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->testimonialService->edit($testimonial);
                $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'index'), null);
            }
        }
        return array(
            'form' => $form
        );
    }

    public function deleteAction() {
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        if ($this->testimonialService->delete($id)) {
            $this->flashMessenger()->addSuccessMessage('Testimonial wurde gelöscht !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'index'), null);
        } else {
            $this->flashMessenger()->addErrorMessage('Es ist ein Fehler aufgetreten !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'index'), null);
        }
    }

}
