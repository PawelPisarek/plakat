<?php

namespace Obrazki\jakoProduktyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\jakoProduktyBundle\Entity\filtr;
use Obrazki\jakoProduktyBundle\Form\filtrType;

/**
 * filtr controller.
 *
 * @Route("/filtr")
 */
class filtrController extends Controller
{

    /**
     * Lists all filtr entities.
     *
     * @Route("/", name="filtr")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkijakoProduktyBundle:filtr')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new filtr entity.
     *
     * @Route("/", name="filtr_create")
     * @Method("POST")
     * @Template("ObrazkijakoProduktyBundle:filtr:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new filtr();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('filtr_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a filtr entity.
     *
     * @param filtr $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(filtr $entity)
    {
        $form = $this->createForm(new filtrType(), $entity, array(
            'action' => $this->generateUrl('filtr_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new filtr entity.
     *
     * @Route("/new", name="filtr_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new filtr();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a filtr entity.
     *
     * @Route("/{id}", name="filtr_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:filtr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find filtr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing filtr entity.
     *
     * @Route("/{id}/edit", name="filtr_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:filtr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find filtr entity.');
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
    * Creates a form to edit a filtr entity.
    *
    * @param filtr $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(filtr $entity)
    {
        $form = $this->createForm(new filtrType(), $entity, array(
            'action' => $this->generateUrl('filtr_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing filtr entity.
     *
     * @Route("/{id}", name="filtr_update")
     * @Method("PUT")
     * @Template("ObrazkijakoProduktyBundle:filtr:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:filtr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find filtr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('filtr_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a filtr entity.
     *
     * @Route("/{id}", name="filtr_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkijakoProduktyBundle:filtr')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find filtr entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('filtr'));
    }

    /**
     * Creates a form to delete a filtr entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('filtr_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
