<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setIsCompany(true);
        $user->setPassword($this->passwordEncoder->encodePassword(
        $user,
                         'azerty'
                     ));
        $user->setFirstname('Ozan');
        $user->setLastname('YILDIZ');
        $user->setEmail('Shijinboshi@hotmail.fr');
        $user->setRoles('');

        $manager->persist($user);

        $manager->flush();
    }
}