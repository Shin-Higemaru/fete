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
        $password = "azerty";
        $user->setPassword($this->userPasswordEncoder->encodePassword($user,$password));
        $user->setFirstname('Ozan');
        $user->setLastname('YILDIZ');
        $user->setEmail('Shijinboshi@hotmail.fr');
        $user->setRoles(['ROLE_USER','ROLE_ADMIN']);

        $manager->persist($user);

        $manager->flush();
    }
}
