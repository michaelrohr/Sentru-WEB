<?php

namespace Config\Fieldset;

use Config\Fieldset\Core\CoreFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Application\Entity\Location;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;

class LocationFieldset extends CoreFieldset implements InputFilterProviderInterface {

    protected $translator;

    public function __construct() {
        parent::__construct('location');
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
            'type' => 'Config\Fieldset\AddressFieldset',
        ));
    }

    public function getInputFilterSpecification() {

        return array(
            'name' => array(
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
