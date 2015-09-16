<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'langroute' => array(
                'child_routes' => array(
                    'config' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/config',
                            'defaults' => array(
                                'controller' => 'config',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/[:controller[/:action[/:id]]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'config',
                                        'action' => 'index',
                                        'id' => null,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'ActiveHelper' => 'Config\View\Helper\ActiveHelper',
        ),
        'factories' => array(
        ),
    ),
    'controllers' => array(
        'aliases' => array(
            'config' => 'Config\Controller\ConfigController',
            'employee' => 'Config\Controller\EmployeeController',
            'testimonial' => 'Config\Controller\TestimonialController',
            'impulseday' => 'Config\Controller\ImpulsedayController',
        ),
        'factories' => array(
            'Config\Controller\ConfigController' => 'Config\Factory\Controller\ConfigControllerFactory',
            'Config\Controller\EmployeeController' => 'Config\Factory\Controller\EmployeeControllerFactory',
            'Config\Controller\TestimonialController' => 'Config\Factory\Controller\TestimonialControllerFactory',
            'Config\Controller\ImpulsedayController' => 'Config\Factory\Controller\ImpulsedayControllerFactory',
        ),
    ),
    'form_elements' => array(
        'factories' => array(
            'Config\Form\ImpulsedayForm' => 'Config\Factory\Form\ImpulsedayFormFactory',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    ),
);
