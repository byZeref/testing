<?php

namespace Prueba\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PruebaAppBundle:Default:index.html.twig');
    }
}
