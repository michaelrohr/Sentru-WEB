<?php

namespace Config\Fieldset;

use Config\Fieldset\Core\CoreFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Application\Entity\Address;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;

class AddressFieldset extends CoreFieldset implements InputFilterProviderInterface {

    protected $translator;

    public function __construct() {
        parent::__construct('address');
        $this->translator = new Translator();
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Address());

        $this->add(array(
            'name' => 'street',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Strasse'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'number',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Nummer'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'place',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Ort'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'postalcode',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('PLZ'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'country',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Land'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
    }

    public function getInputFilterSpecification() {

        return array(
            'street' => array(
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
            'country' => array(
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
            'postalcode' => array(
                'required' => false,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                    array('name' => 'Zend\Filter\StripTags')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\Regex',
                        'options' => array(
                            'pattern' => '/^(?:[1-9]\d{3}|\d{5})$/',
                            'messages' => array(
                                \Zend\Validator\Regex::NOT_MATCH => "Bitte eine gültige Postleitzahl angeben",
                            )
                        )
                    )
                )
            ),
            'number' => array(
                'required' => false,
                'filters' => array(
                    array('name' => 'Zend\Filter\StringTrim'),
                    array('name' => 'Zend\Filter\StripTags')
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'max' => '6',
                        ),
                    ),
                    array(
                        'name' => 'Zend\Validator\Regex',
                        'options' => array(
                            'pattern' => '/^(\d+).[a-zA-Z]*$|\d/',
                            'messages' => array(
                                \Zend\Validator\Regex::NOT_MATCH => "Bitte eine gültige Hausnummer angeben",
                            )
                        )
                    )
                ),
            ),
        );
    }

}
