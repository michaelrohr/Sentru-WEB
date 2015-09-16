<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocationsRepository
 *
 * @author Administrator
 */

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

class LocationsRepository extends EntityRepository {

    public function getName() {
        $querybuilder = $this->createQueryBuilder('c');
        return $querybuilder->select('c')
                        ->groupBy('c.name')
                        ->orderBy('c.id', 'ASC')
                        ->getQuery()->getResult();
    }

}
