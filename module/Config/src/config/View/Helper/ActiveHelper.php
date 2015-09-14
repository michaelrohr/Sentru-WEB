<?php

namespace Config\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ActiveHelper extends AbstractHelper{

    public function __invoke($state) {

        $result = '';

        if ($state == '1') {
            $result .= '<span class="glyphicon glyphicon-ok text-state-success"></span>';
        } else {
            $result .= '<span class="glyphicon glyphicon-remove text-state-danger"></span>';
        }

        return($result);
    }

}
