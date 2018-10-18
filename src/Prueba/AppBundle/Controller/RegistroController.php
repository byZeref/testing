<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Registro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Registro controller.
 *
 */
class RegistroController extends Controller
{
    /**
     * Lists all registro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $registros = $em->getRepository('PruebaAppBundle:Registro')->findAll();

        return $this->render('PruebaAppBundle:Registro:index.html.twig', array(
            'registros' => $registros,
        ));
    }

    /**
     * Creates a new registro entity.
     *
     */
    public function newAction(Request $request)
    {
        $registro = new Registro();
        $form = $this->createForm('Prueba\AppBundle\Form\RegistroType', $registro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($registro);
            $em->flush();

            return $this->redirectToRoute('registro_show', array('id' => $registro->getId()));
        }

        return $this->render('PruebaAppBundle:Registro:new.html.twig', array(
            'registro' => $registro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a registro entity.
     *
     */
    public function showAction(Registro $registro)
    {
        $deleteForm = $this->createDeleteForm($registro);

        return $this->render('PruebaAppBundle:Registro:show.html.twig', array(
            'registro' => $registro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing registro entity.
     *
     */
    public function editAction(Request $request, Registro $registro)
    {
        $deleteForm = $this->createDeleteForm($registro);
        $editForm = $this->createForm('Prueba\AppBundle\Form\RegistroType', $registro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registro_edit', array('id' => $registro->getId()));
        }

        return $this->render('PruebaAppBundle:Registro:edit.html.twig', array(
            'registro' => $registro,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a registro entity.
     *
     */
    public function deleteAction(Request $request, Registro $registro)
    {
        $form = $this->createDeleteForm($registro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($registro);
            $em->flush();
        }

        return $this->redirectToRoute('registro_index');
    }

    /**
     * Creates a form to delete a registro entity.
     *
     * @param Registro $registro The registro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Registro $registro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('registro_delete', array('id' => $registro->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
