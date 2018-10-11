<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Entrenador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Entrenador controller.
 *
 */
class EntrenadorController extends Controller
{
    /**
     * Lists all entrenador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entrenadors = $em->getRepository('PruebaAppBundle:Entrenador')->findAll();

        return $this->render('PruebaAppBundle:Entrenador:index.html.twig', array(
            'entrenadors' => $entrenadors,
        ));
    }

    /**
     * Creates a new entrenador entity.
     *
     */
    public function newAction(Request $request)
    {
        $entrenador = new Entrenador();
        $form = $this->createForm('Prueba\AppBundle\Form\EntrenadorType', $entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrenador);
            $em->flush();

            return $this->redirectToRoute('entrenador_show', array('id' => $entrenador->getId()));
        }

        return $this->render('PruebaAppBundle:Entrenador:new.html.twig', array(
            'entrenador' => $entrenador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a entrenador entity.
     *
     */
    public function showAction(Entrenador $entrenador)
    {
        $deleteForm = $this->createDeleteForm($entrenador);

        return $this->render('PruebaAppBundle:Entrenador:show.html.twig', array(
            'entrenador' => $entrenador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entrenador entity.
     *
     */
    public function editAction(Request $request, Entrenador $entrenador)
    {
        $deleteForm = $this->createDeleteForm($entrenador);
        $editForm = $this->createForm('Prueba\AppBundle\Form\EntrenadorType', $entrenador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrenador_edit', array('id' => $entrenador->getId()));
        }

        return $this->render('PruebaAppBundle:Entrenador:edit.html.twig', array(
            'entrenador' => $entrenador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a entrenador entity.
     *
     */
    public function deleteAction(Request $request, Entrenador $entrenador)
    {
        $form = $this->createDeleteForm($entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entrenador);
            $em->flush();
        }

        return $this->redirectToRoute('entrenador_index');
    }

    /**
     * Creates a form to delete a entrenador entity.
     *
     * @param Entrenador $entrenador The entrenador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Entrenador $entrenador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entrenador_delete', array('id' => $entrenador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
