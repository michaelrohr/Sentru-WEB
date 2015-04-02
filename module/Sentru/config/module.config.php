<?php

/*
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Sentru\Controller\Sentru' => 'Sentru\Controller\SentruController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'sentru' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'index',
                    ),
                ),
            ),
            'about' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/about',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'about',
                    ),
                ),
            ),
            'contact' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/contact',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'contact',
                    ),
                ),
            ),
            'impulsdays' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/impulsdays',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'impulsdays',
                    ),
                ),
            ),
            'leadership' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/leadership',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'leadership',
                    ),
                ),
            ),
            'seminare' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/seminare',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'seminare',
                    ),
                ),
            ),
            'teambuilding' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/teambuilding',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'teambuilding',
                    ),
                ),
            ),
            'location' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/location',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'location',
                    ),
                ),
            ),
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'index',
                    ),
                ),
            ),
            'info' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/sentru/info',
                    'defaults' => array(
                        'controller' => 'Sentru\Controller\Sentru',
                        'action' => 'info',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Sentru' => __DIR__ . '/../view',
        ),
    ),
);
