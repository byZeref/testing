<?php

namespace Prueba\AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Prueba\AppBundle\Entity\Estado;
use Prueba\AppBundle\Entity\TipoContacto;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//      tipos de contacos
        $tipo1 = new TipoContacto();
        $tipo1->setTipo('Teléfono');
        $manager->persist($tipo1);
        $tipo2 = new TipoContacto();
        $tipo2->setTipo('Correo');
        $manager->persist($tipo2);

//      estados del trabajador
        $est1 = new Estado();
        $est1->setValorEstado('Nuevo');
        $manager->persist($est1);
        $est2 = new Estado();
        $est2->setValorEstado('Contratado');
        $manager->persist($est2);
        $est3 = new Estado();
        $est3->setValorEstado('Inactivo');
        $manager->persist($est3);

        $manager->flush();
    }
}
