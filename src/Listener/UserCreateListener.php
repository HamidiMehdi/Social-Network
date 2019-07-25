<?php

namespace App\Listener;

use App\Entity\User;
use App\Traits\EntityManagerAwareTrait;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\UnitOfWork;

class UserCreateListener
{
    /**
     * @param OnFlushEventArgs $eventArgs
     */
    public function onFlush(OnFlushEventArgs $eventArgs)
    {
        /** @var EntityManager $em */
        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();

        $usersCreated = array_filter($uow->getScheduledEntityInsertions(), function ($entity) {
            return $entity instanceof User;
        });

        foreach ($usersCreated as $user) {
            //envoyer un mail ici car mdp encore visible
            $user->setPassword(hash('sha512', $user->getPassword()));
            $em->persist($user);
        }
        //revoir c amarche pas
        //$em->flush();
    }

}