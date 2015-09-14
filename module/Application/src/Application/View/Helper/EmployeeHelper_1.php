<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeHelper
 *
 * @author Administrator
 */

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Application\Entity\Employee;

class EmployeeHelper extends AbstractHelper {

    public function __invoke(Employee $entity) {

        if ($entity->getActive()) {

            $ret = '';
            $ret.= '<div class="col-md-4 employee">';
            $ret.= '<img class="img-circle img-responsive center" src="' . $entity->getImage()->getPath() . '">';
            $ret.= '<h3 class="text-center">' . $entity->getFirstName() . ' ' . $entity->getLastName() . '</h3>';
            $ret.= '<p class="text-center"><i>"' . $entity->getQuote() . '"</i></p>';
            $ret.= '<br>';
            $ret.= '<p class="text-justify">' . $entity->getAboutMe() . '</p>';
            $ret.='</div>';

            return $ret;
        } else {
            return null;
        }
    }

}
