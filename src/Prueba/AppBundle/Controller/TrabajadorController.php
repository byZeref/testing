<?php

namespace Prueba\AppBundle\Controller;

use Prueba\AppBundle\Entity\Contacto;
use Prueba\AppBundle\Entity\Estado;
use Prueba\AppBundle\Entity\Registro;
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
//    el findAll() devuelve un array de entidades
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trabajadors = $em->getRepository('PruebaAppBundle:Trabajador')->findAll();
//        foreach ($trabajadors as $trab){
//            print_r($trab->getEstado()[0]->getEstado()->getValorEstado());die();
//        }

        return $this->render('PruebaAppBundle:Trabajador:index.html.twig', array(
            'trabajadors' => $trabajadors,
        ));
    }

    /**
     * Creates a new trabajador entity.
     *
     */

    /* un trabajador puede tener muchos contactos a la vez, se necesita el foreach para recorrerlos y setearles el trabajador
       un trabajador no puede tener dos estados a la vez por lo q siempre sera el 1ro, no hace falta el foreach */
    public function newAction(Request $request)
    {
//        $f=date('d-m-Y H:i:s');echo $f;die();

        $trabajador = new Trabajador();
        $trabajador->getContactos()->add(new Contacto());

        $form = $this->createForm('Prueba\AppBundle\Form\TrabajadorType', $trabajador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $fecha = new \DateTime(date('d-m-Y'));
            $nuevo = $em->getRepository('PruebaAppBundle:Estado')->findOneBy(['valor_estado' => 'Nuevo']);
            $find_trab = $em->getRepository('PruebaAppBundle:Trabajador')->findOneBy(['ci' => $trabajador->getCi()]);

            if ($find_trab != null && $find_trab->getEstado()[0]->getFechaFinal() == null) {
                // todo: validar CI unico
                echo 'ya esta + no eliminado + validar';
                die();
            } elseif ($find_trab != null && $find_trab->getEstado()[0]->getFechaFinal() != null) {
                // todo: cambiar estado + datos nuevos del form?
//                $find_trab->getEstado()[0]->setEstado($nuevo);
//                $find_trab->getEstado()[0]->setFechaInicial($fecha);
//                $find_trab->getEstado()[0]->setFechaFinal(null);
                echo 'ya esta + eliminado + cambiar a contratado';
                die();
            } else {
                foreach ($trabajador->getContactos() as $contacto) {
                    $contacto->setTrabajador($trabajador);
                }

                $trabajador->getEstado()->add(new Registro());
                $trabajador->getEstado()[0]->setTrabajador($trabajador);
                $trabajador->getEstado()[0]->setFechaInicial($fecha);
                $trabajador->getEstado()[0]->setEstado($nuevo);

                $em->persist($trabajador);
                $em->flush();

                $this->addFlash('creado', 'El trabajador se ha creado correctamente!');

            }
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
        return $this->render('PruebaAppBundle:Trabajador:show.html.twig', array(
            'trabajador' => $trabajador,
        ));
    }

    /**
     * Displays a form to edit an existing trabajador entity.
     *
     */
    public function editAction(Request $request, Trabajador $trabajador)
    {// todo: validar CI unico

        if ($trabajador->getEstado()[0]->getEstado() == 'Contratado' ||
            $trabajador->getEstado()[0]->getEstado() == 'Inactivo'){
            throw $this->createAccessDeniedException('No se puede editar este trabajador');
        }

//        $deleteForm = $this->createDeleteForm($trabajador);
        $editForm = $this->createForm('Prueba\AppBundle\Form\TrabajadorType', $trabajador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trabajador_index', array('id' => $trabajador->getId()));
        }

        return $this->render('PruebaAppBundle:Trabajador:edit.html.twig', array(
            'trabajador' => $trabajador,
            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a trabajador entity.
     *
     */
//    no puede eliminar de la bd, cambiar estado y poner fecha_fin
    public function deleteAction(Trabajador $trabajador)
    {
        $em = $this->getDoctrine()->getManager();

        $fecha_hoy = new \DateTime(date('d-m-Y'));
        $trabajador->getEstado()[0]->setFechaFinal($fecha_hoy);
        $inactivo = $em->getRepository('PruebaAppBundle:Estado')->findOneBy(['valor_estado' => 'Inactivo']);
        $trabajador->getEstado()[0]->setEstado($inactivo);

        $em->persist($trabajador);
        $em->flush();

        return $this->redirectToRoute('trabajador_index');
    }

    public function contratarAction(Trabajador $trabajador)
    {
        $em = $this->getDoctrine()->getManager();
        $contratado = $em->getRepository('PruebaAppBundle:Estado')->findOneBy(['valor_estado' => 'Contratado']);

        $trabajador->getEstado()[0]->setEstado($contratado);
        $em->persist($trabajador);
        $em->flush();

        return $this->redirectToRoute('trabajador_index');
    }

//    public function deleteAction(Request $request, Trabajador $trabajador)
//    {
//        $form = $this->createDeleteForm($trabajador);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($trabajador);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('trabajador_index');
//    }

    /**
     * Creates a form to delete a trabajador entity.
     *
     * @param Trabajador $trabajador The trabajador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
//    private function createDeleteForm(Trabajador $trabajador)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('trabajador_delete', array('id' => $trabajador->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
