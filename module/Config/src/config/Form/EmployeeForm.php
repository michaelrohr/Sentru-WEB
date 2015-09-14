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

namespace Config\Form;

use Zend\Form\Form;
use Application\Entity\Employee;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;
use Config\Fieldset\FileFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\EmailAddress;

class EmployeeForm extends Form implements InputFilterProviderInterface {

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
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'lastName',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Nachname'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => $this->translator->translate('Email'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'quote',
            'type' => 'TextArea',
            'options' => array(
                'label' => $this->translator->translate('Zitat'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'aboutMe',
            'type' => 'TextArea',
            'options' => array(
                'label' => $this->translator->translate('Über mich'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(
                $this->addFile('./data/image/employee/')
        );

        $this->add(array(
            'name' => 'active',
            'type' => 'Checkbox',
            'options' => array(
                'label' => $this->translator->translate('Aktiv'),
            ),
        ));

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

    public function getInputFilterSpecification() {

        return array(
            'firstName' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 256,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Max 256 Zeichen",
                                \Zend\Validator\StringLength::TOO_SHORT => "Min 3 Zeichen",
                            ),
                        ),
                    ),
                ),
            ),
            'lastName' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 256,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Max 256 Zeichen",
                                \Zend\Validator\StringLength::TOO_SHORT => "Min 3 Zeichen",
                            ),
                        ),
                    ),
                ),
            ),
            'email' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    new EmailAddress(),
                ),
            ),
            'quote' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 2400,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Max 2400 Zeichen",
                                \Zend\Validator\StringLength::TOO_SHORT => "Min 3 Zeichen",
                            ),
                        ),
                    ),
                ),
            ),
            'aboutMe' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 3,
                            'max' => 2400,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Max 2400 Zeichen",
                                \Zend\Validator\StringLength::TOO_SHORT => "Min 3 Zeichen",
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

}
