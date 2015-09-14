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
use Zend\View\Model\ViewModel;
use Config\Service\ConfigService;

class ConfigController extends AbstractActionController {

    protected $configService;

    function __construct(ConfigService $service) {
        $this->configService = $service;
    }

    public function indexAction() {
        return new ViewModel();
    }
}
