<?php

namespace App\Traits;

use Doctrine\ORM\EntityManager;

trait EntityManagerAwareTrait
{
    /** @var EntityManager */
    protected $em;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param $reference
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository($reference)
    {
        return $this->em->getRepository($reference);
    }
}