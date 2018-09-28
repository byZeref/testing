<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Libro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LibroController extends Controller
{
    public function indexAction()
    {
        $books = $this->getDoctrine()->getRepository(Libro::class)->findAll();

        return $this->render('PruebaAppBundle:Libro:index.html.twig', ['books' => $books]);
    }

    public function createAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $book = new Libro();
        $book->setTitulo('Queen of the South');
        $book->setGenero('Accion');
        $book->setNombAutor('Teresa Mendoza');

        $manager->persist($book);
        $manager->flush();

        return new Response('Se agrego un nuevo libro con titulo: '.$book->getTitulo());
    }

    public function updateAction($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $book = $manager->getRepository(Libro::class)->find($id);

        $book->setNombAutor('Bob Lee Swagger');
        $manager->flush();

        return $this->indexAction();
    }

    public function deleteAction($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $book = $manager->getRepository(Libro::class)->find($id);

        $manager->remove($book);
        $manager->flush();

        return $this->indexAction();
    }

}
