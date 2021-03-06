<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Testimonial
 *
 * @author Administrator
 */

namespace Config\Form;

use Zend\Form\Form;
use Application\Entity\Testimonial;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;
use Config\Fieldset\FileFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\EmailAddress;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;

class TestimonialForm extends Form implements InputFilterProviderInterface {

    protected $translator;

    public function __construct() {

        parent::__construct('testimonial');
        $this->translator = new Translator();
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Testimonial());


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
            'name' => 'company',
            'options' => array(
                'label' => $this->translator->translate('Firma'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'position',
            'type' => 'Text',
            'options' => array(
                'label' => $this->translator->translate('Position'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'statement',
            'type' => 'TextArea',
            'options' => array(
                'label' => $this->translator->translate('Statement'),
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

//        $this->add(array(
//            'name' => 'logo',
//            'type' => 'Config\Fieldset\FileFieldset',
//             'options' => array(
//                'label' => $this->translator->translate('Logo'),
//            ),
//        ));
//
        $this->add(
                $this->addFile('./data/file/testimonial/')
        );

//        $this->add(array(
//            'name' => 'file',
//            'type' => 'file',
//            'options' => array(
//                'label' => $this->translator->translate('Datei hinzufügen')
//            ),
//            'attributes' => array(
//                'id' => 'file'
//            )
//                )
//        );

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

        $this->setInputFilter($this->createInputFilter());

    }

    public function addFile($target) {
        $file = new FileFieldset($target);
        $file->setName('logo');
        $file->setLabel('Logo');
        $file->useAsBaseFieldset(true);
//        $file->setInp
//
        return $file;
    }

    public function createInputFilter() {
        $inputFilter = new InputFilter();

        // File Input
        $file = new FileInput('file');
        $file->setRequired(true);
        $file->getFilterChain()->attachByName('filerenameupload', array(
            'target' => './data/files/testimonials/',
            'randomize' => true,
            'use_upload_name' => true,
        ));
        $inputFilter->add($file);

        return $inputFilter;
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
            'company' => array(
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
            'position' => array(
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
            'statement' => array(
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
            'file' => array(
                'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\File\Size',
                        'options' => array(
                            'max' => '8MB',
                        ),
                    ),
                    array(
                        'name' => 'Zend\Validator\File\Extension',
                        'options' => array(
                            'extension' => array('pdf', 'ppt', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'jpeg', 'jpg', 'png', 'gif', 'txt'),
                            'messages' => array(
                                \Zend\Validator\File\Extension::FALSE_EXTENSION => "Zulässige Formate sind: .pdf .ppt .pptx .doc .docx .xls .xlsx .jpeg .jpg .png",
                            ),
                        )
                    ),
                ),
            ),
        );
    }

}
