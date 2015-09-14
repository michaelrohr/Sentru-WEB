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

            $ret = '';

            $ret.= '<div id="' . $id . '" class="carousel slide" data-ride="carousel">';
            $ret.= '<ol class="carousel-indicators">';
            foreach ($entites as $entity) {
                if ($entity->getActive()) {
                    $ret.=' <li data-target="' . $id . '" data-slide-to = "' . $entity->getId() . '" class = "active"></li>';
                }
            }
            $ret.= '</ol>';
            $ret.= '<div class = "carousel-inner" role = "listbox">';

            foreach ($entites as $entity) {
                $ret.= ' <div class = "carousel-inner" role = "listbox">';
                $ret.= ' <div class = "item-active">';
                $ret.= ' <img src = "' . $entity->getLogo()->getPath() . '" alt = "' . $entity->getCompany() . '-logo">';
                $ret.= ' <div class = "carousel-caption">';
                $ret.= ' <h3>Chania</h3>';
                $ret.= ' <p>' . $entity->getStatement() . '</p>';
                $ret.= ' </div>';
                $ret.= ' </div>';
                $ret.= ' </div>';
            }


            $ret.= '</div>';
            $ret.= '</div>';

            return $ret;
        } else {
            return null;
        }
    }

}
