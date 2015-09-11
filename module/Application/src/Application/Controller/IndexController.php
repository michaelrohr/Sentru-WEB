<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\IndexService;
use Application\Form\EmployeeForm;
use Zend\Http\PhpEnvironment\Response;
use Application\Entity\Employee;

class IndexController extends AbstractActionController {

    protected $indexService;

    function __construct(IndexService $service) {
        $this->indexService = $service;
    }

    public function indexAction() {
        return new ViewModel();
    }

    public function editAction() {
        $form = new EmployeeForm();
        $employee = new Employee();
        
        $prg = $this->prg(
                $this->url()->fromRoute(
                        'langroute', array('controller' => 'index', 'action' => 'edit')
                ), true
        );
        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return array('form' => $form);
        }

        if ($form->isValid()) {
            $this->indexService->save($entity);
            return $this->redirect()->toRoute('/user/profile-pic/success');
        } else {
            // Form not valid, but file uploads might be valid and uploaded
            $fileErrors = $form->get('file')->getMessages();
            if (empty($fileErrors)) {
                $tempFile = $form->get('file')->getValue();
            }
        }
    }

}
