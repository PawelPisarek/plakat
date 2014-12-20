<?php

namespace Obrazki\jakoProduktyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\jakoProduktyBundle\Entity\Grupa;
use Obrazki\jakoProduktyBundle\Form\GrupaType;

/**
 * Grupa controller.
 *
 * @Route("/grupa")
 */
class GrupaController extends Controller
{

    /**
     * Lists all Grupa entities.
     *
     * @Route("/", name="grupa")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkijakoProduktyBundle:Grupa')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Grupa entity.
     *
     * @Route("/", name="grupa_create")
     * @Method("POST")
     * @Template("ObrazkijakoProduktyBundle:Grupa:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Grupa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('grupa_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Grupa entity.
     *
     * @param Grupa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Grupa $entity)
    {
        $form = $this->createForm(new GrupaType(), $entity, array(
            'action' => $this->generateUrl('grupa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Grupa entity.
     *
     * @Route("/new", name="grupa_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Grupa();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Grupa entity.
     *
     * @Route("/{id}", name="grupa_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:Grupa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Grupa entity.
     *
     * @Route("/{id}/edit", name="grupa_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:Grupa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupa entity.');
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
    * Creates a form to edit a Grupa entity.
    *
    * @param Grupa $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Grupa $entity)
    {
        $form = $this->createForm(new GrupaType(), $entity, array(
            'action' => $this->generateUrl('grupa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Grupa entity.
     *
     * @Route("/{id}", name="grupa_update")
     * @Method("PUT")
     * @Template("ObrazkijakoProduktyBundle:Grupa:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkijakoProduktyBundle:Grupa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('grupa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Grupa entity.
     *
     * @Route("/{id}", name="grupa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkijakoProduktyBundle:Grupa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grupa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grupa'));
    }

    /**
     * Creates a form to delete a Grupa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
