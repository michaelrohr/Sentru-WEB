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
use Application\Entity\Testimonial;

class TestimonialCarouselHelper extends AbstractHelper {

    public function __invoke($entites, $id) {

        if (!$entites == null) {

            return $ret;
        } else {
            return null;
        }
    }

}
