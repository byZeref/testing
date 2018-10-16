<?php

namespace Prueba\AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Prueba\AppBundle\Entity\TipoContacto;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tipo = new TipoContacto();
        $tipo->setTipo('telefono');
        $manager->persist($tipo);
        $tipo2 = new TipoContacto();
        $tipo2->setTipo('correo');
        $manager->persist($tipo2);

        $manager->flush();
    }
}
