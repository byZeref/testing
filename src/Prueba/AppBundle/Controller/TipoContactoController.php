<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\TipoContacto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tipocontacto controller.
 *
 */
class TipoContactoController extends Controller
{
    /**
     * Lists all tipoContacto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoContactos = $em->getRepository('PruebaAppBundle:TipoContacto')->findAll();

        return $this->render('PruebaAppBundle:TipoContacto:index.html.twig', array(
            'tipoContactos' => $tipoContactos,
        ));
    }

    /**
     * Creates a new tipoContacto entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipoContacto = new Tipocontacto();
        $form = $this->createForm('Prueba\AppBundle\Form\TipoContactoType', $tipoContacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoContacto);
            $em->flush();

            return $this->redirectToRoute('tipocontacto_show', array('id' => $tipoContacto->getId()));
        }

        return $this->render('PruebaAppBundle:TipoContacto:new.html.twig', array(
            'tipoContacto' => $tipoContacto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoContacto entity.
     *
     */
    public function showAction(TipoContacto $tipoContacto)
    {
        $deleteForm = $this->createDeleteForm($tipoContacto);

        return $this->render('PruebaAppBundle:TipoContacto:show.html.twig', array(
            'tipoContacto' => $tipoContacto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoContacto entity.
     *
     */
    public function editAction(Request $request, TipoContacto $tipoContacto)
    {
        $deleteForm = $this->createDeleteForm($tipoContacto);
        $editForm = $this->createForm('Prueba\AppBundle\Form\TipoContactoType', $tipoContacto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipocontacto_edit', array('id' => $tipoContacto->getId()));
        }

        return $this->render('PruebaAppBundle:TipoContacto:edit.html.twig', array(
            'tipoContacto' => $tipoContacto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoContacto entity.
     *
     */
    public function deleteAction(Request $request, TipoContacto $tipoContacto)
    {
        $form = $this->createDeleteForm($tipoContacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoContacto);
            $em->flush();
        }

        return $this->redirectToRoute('tipocontacto_index');
    }

    /**
     * Creates a form to delete a tipoContacto entity.
     *
     * @param TipoContacto $tipoContacto The tipoContacto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoContacto $tipoContacto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocontacto_delete', array('id' => $tipoContacto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
