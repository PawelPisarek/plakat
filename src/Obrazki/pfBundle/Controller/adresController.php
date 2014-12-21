<?php

namespace Obrazki\pfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\pfBundle\Entity\adres;
use Obrazki\pfBundle\Form\adresType;

/**
 * adres controller.
 *
 * @Route("/adres")
 */
class adresController extends Controller
{

    /**
     * Lists all adres entities.
     *
     * @Route("/", name="adres")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkipfBundle:adres')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new adres entity.
     *
     * @Route("/", name="adres_create")
     * @Method("POST")
     * @Template("ObrazkipfBundle:adres:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new adres();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adres_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a adres entity.
     *
     * @param adres $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(adres $entity)
    {
        $form = $this->createForm(new adresType(), $entity, array(
            'action' => $this->generateUrl('adres_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new adres entity.
     *
     * @Route("/new", name="adres_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new adres();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a adres entity.
     *
     * @Route("/{id}", name="adres_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:adres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find adres entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing adres entity.
     *
     * @Route("/{id}/edit", name="adres_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:adres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find adres entity.');
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
    * Creates a form to edit a adres entity.
    *
    * @param adres $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(adres $entity)
    {
        $form = $this->createForm(new adresType(), $entity, array(
            'action' => $this->generateUrl('adres_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing adres entity.
     *
     * @Route("/{id}", name="adres_update")
     * @Method("PUT")
     * @Template("ObrazkipfBundle:adres:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:adres')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find adres entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adres_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a adres entity.
     *
     * @Route("/{id}", name="adres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkipfBundle:adres')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find adres entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adres'));
    }

    /**
     * Creates a form to delete a adres entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adres_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
