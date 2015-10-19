<?php

namespace Config\Fieldset;

use Config\Fieldset\Core\CoreFieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Application\Entity\File;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\I18n\Translator\Translator;

class FileFieldset extends CoreFieldset implements InputFilterProviderInterface {

    protected $translator;
    protected $target;

    public function __construct() {

        parent::__construct('file');
        $this->translator = new Translator();
//        $this->target = $target;
        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new File());

        $this->add(array(
            'name' => 'file',
            'type' => 'File',
            'attributes' => array(
                'id' => 'file'
            )
        ));
    }
  

    public function createInputFilter() {
        $inputFilter = new InputFilter();
        $file = new FileInput('file');
        $file->setRequired(true);
        $file->getFilterChain()->attachByName(
                'filerenameupload', array(
            'target' => $this->target,
            'use_upload_name' => true,
                )
        );
        $inputFilter->add($file);

        return $inputFilter;
    }

    public function getInputFilterSpecification() {
        return array(
            'image' => array(
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
                            'extension' => array('ppt', 'jpeg', 'jpg', 'png', 'gif'),
                            'messages' => array(
                                \Zend\Validator\File\Extension::FALSE_EXTENSION => $this->translator->translate("Zulässige Formate sind: 'ppt','jpeg', 'jpg', 'png', 'gif'"),
                            ),
                        )
                    ),
                ),
            ),
        );
    }

}
