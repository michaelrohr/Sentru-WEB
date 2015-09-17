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
use Application\Service\IndexService;

class ActionController extends AbstractActionController {

    protected $indexService;

    function __construct(IndexService $service) {
        $this->indexService = $service;
    }

    public
            function indexAction() {
        $employees = $this->indexService->getAllEmployees();
        $testimonials = $this->indexService->getAllTestimonials();

        return array(
            'employees' => $employees,
            'testimonials' => $testimonials
        );
    }

}
