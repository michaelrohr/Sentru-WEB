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

        if ($testimonials == null) {
            $this->flashMessenger()->addInfoMessage('Es sind noch keine Testimonials vorhanden !');
            return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'add'), null);
        }

        return array(
            'testimonials' => $testimonials
        );
    }

    public function addAction() {
        $form = new TestimonialForm();

        return array(
            'form' => $form
        );
    }

    public function editAction() {
        $form = new TestimonialForm();
        $id = $this->params('id');
        $testimonial = $this->testimonialService->getTestimonial($id);
        $form->bind($testimonial);

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

    public function saveEditAction() {
        $form = new TestimonialForm();
        $id = $this->params('id');
        $testimonial = $this->testimonialService->getTestimonial($id);

        if ($testimonial) {
            $form->bind($testimonial);
        } else {
            return $this->notFoundAction();
        }

        $prg = $this->fileprg($form);
        if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            return $prg; // Return PRG redirect response
        } elseif (is_array($prg)) {
            try {
                if ($form->isValid()) {
//                    var_dump($prg['file']);
                    $this->testimonialService->edit($testimonial, $file);
                    $this->flashMessenger()->addSuccessMessage('Änderung erfolgreich !');
                    return $this->redirect()->toRoute('langroute/config/default', array('controller' => 'testimonial', 'action' => 'index'), null);
                } else {
                    throw new ValidationException($this->translator->translate('Bitte überprüfen Sie Ihre Eingaben.'), null, $form->getInputFilter());
                }
            } catch (Exception $ex) {
                $this->logError($ex);
                $this->flashMessenger()->addErrorMessage($ex->getMessage());
            }
        } else {
            return $this->redirect()->toRoute('langroute/config/default', array('action' => 'edit'), array(), true);
        }

        $model = new ViewModel();
        $model->setTemplate('config/testimonial/edit');
        $model->setVariable('form', $form);
        $model->setVariable('id', $id);
        return $model;
    }

    public function downloadAction() {
        $fileId = $this->getEvent()->getRouteMatch()->getParam('id');
        $file = $this->leafletService->getFile($fileId);

        if ($file) {
            $response = new Stream();
            $response->setStream(fopen($file, 'r'));
            $response->setStatusCode(200);
            $response->setStreamName(basename($file));
            $headers = new Headers();
            $headers->addHeaders(array(
                'Content-Disposition' => 'attachment; filename="' . basename($file) . '"',
                'Content-Type' => 'application/octet-stream',
                'Content-Length' => filesize($file),
                'Expires' => '@0', // @0, because zf2 parses date as string to \DateTime() object
                'Cache-Control' => 'must-revalidate',
                'Pragma' => 'public'
            ));
            $response->setHeaders($headers);
            return $response;
        }
        return $this->notFoundAction();
    }

}
