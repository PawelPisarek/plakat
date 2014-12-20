<?php

namespace Obrazki\jakoProduktyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\typyType;

/**
 * typy controller.
 *
 * @Route("/typy")
 */
class typyController extends Controller
{

    /**
     * Lists all typy entities.
     *
     * @Route("/", name="typy")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkijakoProduktyBundle:typy')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new typy entity.
     *
     * @Route("/", name="typy_create")
     * @Method("POST")
     * @Template("ObrazkijakoProduktyBundle:typy:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new typy();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typy_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a typy entity.
     *
     * @param typy $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(typy $entity)
    {
        $form = $this->createForm(new typyType(), $entity, array(
            'action' => $this->generateUrl('typy_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new typy entity.
     *
     * @Route("/new", name="typy_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new typy();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a typy entity.
     *
     * @Route("/{id}", name="typy_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:typy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find typy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing typy entity.
     *
     * @Route("/{id}/edit", name="typy_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:typy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find typy entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a typy entity.
    *
    * @param typy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(typy $entity)
    {
        $form = $this->createForm(new typyType(), $entity, array(
            'action' => $this->generateUrl('typy_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing typy entity.
     *
     * @Route("/{id}", name="typy_update")
     * @Method("PUT")
     * @Template("ObrazkijakoProduktyBundle:typy:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:typy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find typy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typy_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a typy entity.
     *
     * @Route("/{id}", name="typy_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkijakoProduktyBundle:typy')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find typy entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typy'));
    }

    /**
     * Creates a form to delete a typy entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typy_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
