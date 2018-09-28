<?php

namespace Prueba\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PruebaAppBundle:Default:index.html.twig');
    }

    public function nameAction($myname = 'default')
    {
        return $this->render('PruebaAppBundle:Default:name.html.twig', ['myname' => $myname]);
    }

    public function redirAction()
    {
        return $this->redirectToRoute('prueba_app_name', ['myname' => 'red']);
    }


}
