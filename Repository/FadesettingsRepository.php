<?php
/**
 * Created by PhpStorm.
 * User: cjpa
 * Date: 13/12/16
 * Time: 22:20
 */

namespace Rombit\FadeBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FadesettingsRepository  extends EntityRepository
{
    public function findOneOrCreate()
    {
        $entity = $this->find();

        if (null === $entity)
        {
            $entity = new $this->getClassName();
            $this->getEntityManager()->persist($entity);
            $this->getEntityManager()->flush();
        }

        return $entity;
    }
}