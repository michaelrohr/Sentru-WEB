<?php

namespace Application\Fieldset\Core;

use Zend\Form\Fieldset;

abstract class CoreFieldset extends Fieldset {

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
    }

}
