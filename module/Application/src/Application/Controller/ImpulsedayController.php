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
use Application\Service\ImpulsedayService;

class ImpulsedayController extends AbstractActionController {

    protected $impulsedayService;

    function __construct(ImpulsedayService $service) {
        $this->impulsedayService = $service;
    }

    public function impulsedayAction() {
        $impulseday = $this->impulsedayService->getAl();

        return array(
            'impulseday' => $impulseday
        );
    }

}
