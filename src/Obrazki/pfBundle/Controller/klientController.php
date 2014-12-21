<?php

namespace Obrazki\pfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\pfBundle\Entity\klient;
use Obrazki\pfBundle\Form\klientType;

/**
 * klient controller.
 *
 * @Route("/klient")
 */
class klientController extends Controller
{

    /**
     * Lists all klient entities.
     *
     * @Route("/", name="klient")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkipfBundle:klient')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new klient entity.
     *
     * @Route("/", name="klient_create")
     * @Method("POST")
     * @Template("ObrazkipfBundle:klient:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new klient();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('klient_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a klient entity.
     *
     * @param klient $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(klient $entity)
    {
        $form = $this->createForm(new klientType(), $entity, array(
            'action' => $this->generateUrl('klient_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new klient entity.
     *
     * @Route("/new", name="klient_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new klient();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a klient entity.
     *
     * @Route("/{id}", name="klient_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:klient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find klient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing klient entity.
     *
     * @Route("/{id}/edit", name="klient_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:klient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find klient entity.');
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
    * Creates a form to edit a klient entity.
    *
    * @param klient $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(klient $entity)
    {
        $form = $this->createForm(new klientType(), $entity, array(
            'action' => $this->generateUrl('klient_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing klient entity.
     *
     * @Route("/{id}", name="klient_update")
     * @Method("PUT")
     * @Template("ObrazkipfBundle:klient:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:klient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find klient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('klient_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a klient entity.
     *
     * @Route("/{id}", name="klient_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkipfBundle:klient')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find klient entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('klient'));
    }

    /**
     * Creates a form to delete a klient entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('klient_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
