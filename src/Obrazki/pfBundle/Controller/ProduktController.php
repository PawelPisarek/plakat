<?php

namespace Obrazki\pfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Obrazki\pfBundle\Entity\Produkt;
use Obrazki\pfBundle\Form\ProduktType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Produkt controller.
 *
 * @Route("/produkt")
 */
class ProduktController extends Controller
{

    /**
     * Lists all Produkt entities.
     *
     * @Route("/", name="produkt")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ObrazkipfBundle:Produkt')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Produkt entity.
     *
     * @Route("/", name="produkt_create")
     * @Method("POST")
     * @Template("ObrazkipfBundle:Produkt:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Produkt();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produkt_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Produkt entity.
     *
     * @param Produkt $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Produkt $entity)
    {
        $form = $this->createForm(new ProduktType(), $entity, array(
            'action' => $this->generateUrl('produkt_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Produkt entity.
     *
     * @Route("/new", name="produkt_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Produkt();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Produkt entity.
     *
     * @Route("/{id}", name="produkt_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produkt entity.');
        }
//        $request = $this->get('request');
//        $cookies = $request->cookies;



//        var_dump($cookies->get('produkt'));
//        $produkty=explode(',',$cookies->get('produkt'));
//        var_dump($produkty);


        $deleteForm = $this->createDeleteForm($id);

//        $obrazek=$em->getRepository('ObrazkiwbazieBundle:Przed')->find($entity->getIdZdjecia()->getId());
//        $typ=$em->getRepository('ObrazkijakoProduktyBundle:typy')->find($entity->getIdTypu()->getId());


        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
//            'obrazek'=>$obrazek,
//            'typ'=>$typ,
        );
    }

    /**
     * Displays a form to edit an existing Produkt entity.
     *
     * @Route("/{id}/edit", name="produkt_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produkt entity.');
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
    * Creates a form to edit a Produkt entity.
    *
    * @param Produkt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Produkt $entity)
    {
        $form = $this->createForm(new ProduktType(), $entity, array(
            'action' => $this->generateUrl('produkt_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Produkt entity.
     *
     * @Route("/{id}", name="produkt_update")
     * @Method("PUT")
     * @Template("ObrazkipfBundle:Produkt:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Produkt entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('produkt_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Produkt entity.
     *
     * @Route("/{id}", name="produkt_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Produkt entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('produkt'));
    }

    /**
     * Creates a form to delete a Produkt entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produkt_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
