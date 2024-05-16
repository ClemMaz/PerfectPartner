<?php

namespace App\DataFixtures;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un utilisateur admin
        $user = new User();
        $user->setEmail('admin@admin.fr')
            ->setPassword('$2y$13$Cw5xWlfd4hq/jKcz9s9dzOwnThPHEgSgPX30Iw3Qre4crZHiF5wPK') // admin
            ->setRoles(['ROLE_ADMIN'])
            ;
        $manager->persist($user);

        $manager->flush();
    }
}
