<?php

namespace App\Service;

use App\Entity\User;
use App\Traits\EntityManagerAwareTrait;

class UserService
{
    use EntityManagerAwareTrait;

    const REFERENCE = 'aregis.service.user_service';

    public function findUserForAuth($username, $password)
    {
        $user = $this->getRepository(User::class)->findOneBy([
            'username' => $username,
            'password' => $password
        ]);

        return !$user ? null : $user;
    }

}