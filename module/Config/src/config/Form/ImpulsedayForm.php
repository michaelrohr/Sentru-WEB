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
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ImpulsedayForm extends Form implements InputFilterProviderInterface, ObjectManagerAwareInterface {

    protected $translator;
    protected $entityManager;
    protected $objectManager;

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function init() {
        $this->add(array(
            'name' => 'location',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->entityManager,
                'target_class' => 'Application\Entity\Location',
                'property' => 'name',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'getName',
                ),
            ),
        ));
    }

    public function __construct(EntityManager $entityManager) {

        parent::__construct('location');
        $this->translator = new Translator();
        $this->setHydrator(new DoctrineHydrator($entityManager));
        $this->setObject(new Impulseday());

        $this->entityManager = $entityManager;

//        $this->add(array(
//            'name' => 'location',
//            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
//            'options' => array(
//                'object_manager' => $this->getObjectManager(),
//                'target_class' => 'Application\Entity\Location',
//                'property' => 'name',
////                'is_method' => true,
////                'find_method' => array(
////                    'name' => 'getName',
////                ),
//            ),
//        ));

        $this->add(array(
            'name' => 'startTime',
            'type' => 'Date',
            'options' => array(
                'label' => $this->translator->translate('Start Datum'),
                'format' => 'Y-m-d',
            ),
            'attributes' => array(
                'required' => 'required',
            )
        ));

        $this->add(array(
            'name' => 'endTime',
            'type' => 'Date',
            'options' => array(
                'label' => $this->translator->translate('End Datum'),
                'format' => 'Y-m-d',
            ),
            'attributes' => array(
                'required' => 'required',
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

//        $this->add(array(
//            'type' => 'Config\Fieldset\LocationFieldset',
//        ));
//        $this->add(array(
//            'name' => 'location',
//            'type' => 'Select',
//            'attributes' => array(
//            ),
//            'options' => array(
//                'label' => $this->translator->translate('Location'),
//            ),
//        ));
//        $this->add(array(
//            'name' => 'continent',
//            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
//            'options' => array(
//                'object_manager' => $this->entityManager,
//                'target_class' => 'Tutorial\Entity\Countries',
//                'property' => 'continent',
//                'is_method' => true,
//                'find_method' => array(
//                    'name' => 'getContinent',
//                ),
//            ),
//        ));


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
