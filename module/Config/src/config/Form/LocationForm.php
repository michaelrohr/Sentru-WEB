<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author Administrator
 */

namespace Config\Form;

use Zend\Form\Form;
use Application\Entity\Location;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;
use Config\Fieldset\FileFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\EmailAddress;

class LocationForm extends Form implements InputFilterProviderInterface {

    protected $translator;

    public function __construct() {

        parent::__construct('tlocation');
        $this->translator = new Translator();
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Location());


        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Name'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'website',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Webseite'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'address',
            'type' => 'Config\Fieldset\AddressFieldset',
        ));

        $this->add(
                $this->addFile('./data/image/location/picture', 'picture')
        );

        $this->add(
                $this->addFile('./data/image/location/map', 'map')
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

    public function addFile($target, $name) {
        $file = new FileFieldset($target);
        $file->setName($name);
        $file->useAsBaseFieldset(true);

        return $file;
    }

    public function getInputFilterSpecification() {

        return array(
        );
    }

}
