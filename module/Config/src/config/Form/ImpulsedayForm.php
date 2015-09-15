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
use Application\Entity\Impulseday;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;
use Zend\InputFilter\InputFilterProviderInterface;

class ImpulsedayForm extends Form implements InputFilterProviderInterface {

    protected $translator;

    public function __construct() {

        parent::__construct('location');
        $this->translator = new Translator();
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Impulseday());

        $this->add(array(
            'name' => 'startTime',
            'type' => 'Date',
            'options' => array(
                'label' => $this->translator->translate('Startdatum und Zeit'),
                'format' => 'Y-m-d',
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'Date',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Enddatum und Zeit'),
                'format' => 'Y-m-d',
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Beschreibung'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'type' => 'Config\Fieldset\LocationFieldset',
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => $this->translator->translate('Speichern'),
            ),
        ));
    }

    public function getInputFilterSpecification() {

        return array(
            'description' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'min' => 2,
                            'max' => 256,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => "Max 256 Zeichen",
                                \Zend\Validator\StringLength::TOO_SHORT => "Min 2 Zeichen",
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

}
