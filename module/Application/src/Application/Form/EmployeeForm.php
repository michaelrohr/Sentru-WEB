<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Administrator
 */

namespace Application\Form;

use Zend\Form\Form;
use Application\Entity\Employee;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;
use Application\Fieldset\FileFieldset;

class EmployeeForm extends Form {

    protected $translator;

    public function __construct() {

        parent::__construct('employee');
        $this->translator = new Translator();
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Employee());


        $this->add(array(
            'name' => 'firstName',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Vorname'),
            ),
        ));

        $this->add(array(
            'name' => 'lastName',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Nachname'),
            ),
        ));

        $this->add(array(
            'name' => 'quote',
            'type' => 'TextArea',
            'options' => array(
                'label' => $this->translator->translate('Zitat'),
            ),
        ));

        $this->add(array(
            'name' => 'aboutMe',
            'type' => 'TextArea',
            'options' => array(
                'label' => $this->translator->translate('Über mich'),
            ),
        ));

        $this->add(
             $this->addFile('./data/image/employee/')
        );

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => $this->translator->translate('Speichern'),
            ),
        ));
    }

    public function addFile($target) {
        $file = new FileFieldset($target);
        $file->setName('image');
        $file->useAsBaseFieldset(true);

        return $file;
    }

}
