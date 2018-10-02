<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Libro;
use Prueba\AppBundle\Form\LibroType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LibroController extends Controller
{
    public function indexAction()
    {
        $books = $this->getDoctrine()->getRepository(Libro::class)->findAll();

        return $this->render('PruebaAppBundle:Libro:index.html.twig', ['books' => $books]);
    }

    public function createAction(Request $request)
    {
        $book = new Libro();
        $form = $this->createForm(LibroType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $book = $form->getData();

            $man = $this->getDoctrine()->getManager();
            $man->persist($book);
            $man->flush();

            return $this->redirectToRoute('libro_home');
        }

        return $this->render('PruebaAppBundle:Libro:create.html.twig', ['form' => $form->createView()]);
    }

    public function updateAction($id, Request $request)
    {
        $book = $this->getDoctrine()->getRepository(Libro::class)->find($id);
        $form = $this->createForm(LibroType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $book = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($book);
            $manager->flush();

            return $this->redirect($this->generateUrl('libro_home'));
        }
        return $this->render('PruebaAppBundle:Libro:update.html.twig', ['form' => $form->createView()]);
    }

    public function viewAction($id, Request $request)
    {
        $book = $this->getDoctrine()->getRepository(Libro::class)->find($id);

        return $this->render('PruebaAppBundle:Libro:view.html.twig', ['book' => $book]);
    }

    public function deleteAction($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $book = $manager->getRepository(Libro::class)->find($id);

        $manager->remove($book);
        $manager->flush();

        return $this->redirect($this->generateUrl('libro_home'));
    }

}
