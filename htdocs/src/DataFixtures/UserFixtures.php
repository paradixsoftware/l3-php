<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordHasher;

     public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        // ...

                 $user->setPassword($this->passwordHasher->hashPassword(
                         $user,
                         'the_new_password'
                     ));

        // ...
    }
}
