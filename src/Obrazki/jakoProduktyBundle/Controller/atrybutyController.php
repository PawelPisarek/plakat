<?php

namespace Obrazki\jakoProduktyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;

/**
 * atrybuty controller.
 *
 * @Route("/atrybuty")
 */
class atrybutyController extends Controller
{

    /**
     * Lists all atrybuty entities.
     *
     * @Route("/", name="atrybuty")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkijakoProduktyBundle:atrybuty')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new atrybuty entity.
     *
     * @Route("/", name="atrybuty_create")
     * @Method("POST")
     * @Template("ObrazkijakoProduktyBundle:atrybuty:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new atrybuty();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('atrybuty_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a atrybuty entity.
     *
     * @param atrybuty $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(atrybuty $entity)
    {
        $form = $this->createForm(new atrybutyType(), $entity, array(
            'action' => $this->generateUrl('atrybuty_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new atrybuty entity.
     *
     * @Route("/new", name="atrybuty_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new atrybuty();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a atrybuty entity.
     *
     * @Route("/{id}", name="atrybuty_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:atrybuty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find atrybuty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing atrybuty entity.
     *
     * @Route("/{id}/edit", name="atrybuty_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:atrybuty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find atrybuty entity.');
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
    * Creates a form to edit a atrybuty entity.
    *
    * @param atrybuty $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(atrybuty $entity)
    {
        $form = $this->createForm(new atrybutyType(), $entity, array(
            'action' => $this->generateUrl('atrybuty_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing atrybuty entity.
     *
     * @Route("/{id}", name="atrybuty_update")
     * @Method("PUT")
     * @Template("ObrazkijakoProduktyBundle:atrybuty:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:atrybuty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find atrybuty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('atrybuty_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a atrybuty entity.
     *
     * @Route("/{id}", name="atrybuty_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkijakoProduktyBundle:atrybuty')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find atrybuty entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('atrybuty'));
    }

    /**
     * Creates a form to delete a atrybuty entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('atrybuty_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
