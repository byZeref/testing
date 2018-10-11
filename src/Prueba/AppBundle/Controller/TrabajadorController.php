<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Contacto;
use Prueba\AppBundle\Entity\Trabajador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Trabajador controller.
 *
 */
class TrabajadorController extends Controller
{
    /**
     * Lists all trabajador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trabajadors = $em->getRepository('PruebaAppBundle:Trabajador')->findAll();

        return $this->render('PruebaAppBundle:Trabajador:index.html.twig', array(
            'trabajadors' => $trabajadors,
        ));
    }

    /**
     * Creates a new trabajador entity.
     *
     */
    public function newAction(Request $request)
    {
        $trabajador = new Trabajador();
        $trabajador->getContactos()->add(new Contacto());
//        print_r($trabajador);die();

        $form = $this->createForm('Prueba\AppBundle\Form\TrabajadorType', $trabajador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            var_dump($trabajador->getContactos()->toArray());die();
            $em = $this->getDoctrine()->getManager();
            $em->persist($trabajador);
            $em->flush();

            return $this->redirectToRoute('trabajador_show', array('id' => $trabajador->getId()));
        }

        return $this->render('PruebaAppBundle:Trabajador:new.html.twig', array(
            'trabajador' => $trabajador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a trabajador entity.
     *
     */
    public function showAction(Trabajador $trabajador)
    {
        $deleteForm = $this->createDeleteForm($trabajador);

        return $this->render('PruebaAppBundle:Trabajador:show.html.twig', array(
            'trabajador' => $trabajador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing trabajador entity.
     *
     */
    public function editAction(Request $request, Trabajador $trabajador)
    {
        $deleteForm = $this->createDeleteForm($trabajador);
        $editForm = $this->createForm('Prueba\AppBundle\Form\TrabajadorType', $trabajador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trabajador_edit', array('id' => $trabajador->getId()));
        }

        return $this->render('PruebaAppBundle:Trabajador:edit.html.twig', array(
            'trabajador' => $trabajador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a trabajador entity.
     *
     */
    public function deleteAction(Request $request, Trabajador $trabajador)
    {
        $form = $this->createDeleteForm($trabajador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trabajador);
            $em->flush();
        }

        return $this->redirectToRoute('trabajador_index');
    }

    /**
     * Creates a form to delete a trabajador entity.
     *
     * @param Trabajador $trabajador The trabajador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Trabajador $trabajador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trabajador_delete', array('id' => $trabajador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
