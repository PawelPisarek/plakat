<?php

namespace Obrazki\pfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\pfBundle\Entity\zamowienie;
use Obrazki\pfBundle\Form\zamowienieType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * zamowienie controller.
 *
 * @Route("/zamowienie")
 */
class zamowienieController extends Controller
{

    /**
     * Lists all zamowienie entities.
     *
     * @Route("/", name="zamowienie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkipfBundle:zamowienie')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new zamowienie entity.
     *
     * @Route("/", name="zamowienie_create")
     * @Method("POST")
     * @Template("ObrazkipfBundle:zamowienie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new zamowienie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zamowienie_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a zamowienie entity.
     *
     * @param zamowienie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(zamowienie $entity)
    {
        $form = $this->createForm(new zamowienieType(), $entity, array(
            'action' => $this->generateUrl('zamowienie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new zamowienie entity.
     *
     * @Route("/new", name="zamowienie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new zamowienie();
        $dzis=new \DateTime();
        $dzis->modify('+1 day');
        $entity->setDataWysylki($dzis);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find zamowienie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing zamowienie entity.
     *
     * @Route("/{id}/edit", name="zamowienie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find zamowienie entity.');
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
    * Creates a form to edit a zamowienie entity.
    *
    * @param zamowienie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(zamowienie $entity)
    {
        $form = $this->createForm(new zamowienieType(), $entity, array(
            'action' => $this->generateUrl('zamowienie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_update")
     * @Method("PUT")
     * @Template("ObrazkipfBundle:zamowienie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find zamowienie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('zamowienie_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a zamowienie entity.
     *
     * @Route("/{id}", name="zamowienie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find zamowienie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('zamowienie'));
    }

    /**
     * Creates a form to delete a zamowienie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zamowienie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
