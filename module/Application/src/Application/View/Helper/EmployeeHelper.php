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

    protected $ret = '';

    public function __invoke(Employee $entity) {
        
        $this->$ret.='' ;



        return $ret;
    }

}
