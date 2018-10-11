<?php

namespace Prueba\AppBundle\DataFixtures;

use Prueba\AppBundle\Entity\Equipo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $eq = new Equipo();
        $eq->setNombre('Barcelona');
        $eq->setDivision(random_int(1,3));
        $manager->persist($eq);

//        $eq->setNombre('Barcelona');
//        $eq->setDivision(random_int(1,3));
//        $manager->persist($eq);
//
        $manager->flush();
    }
}
