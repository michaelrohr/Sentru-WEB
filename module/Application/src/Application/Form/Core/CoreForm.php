<?php

namespace Application\Form\Core;

use Zend\Form\Form;

abstract class CoreForm extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));
    }

}
