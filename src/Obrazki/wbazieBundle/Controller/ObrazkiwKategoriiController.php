<?php

namespace Obrazki\wbazieBundle\Controller;

use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ObrazkiwKategoriiController extends Controller
{
    /**
     * @Route("/index", name="kategoirie" )
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ObrazkiwbazieBundle:Przed')->findAll();

        return array(
            'entities' => $entities
        );
    }

    /**
     * @Route("/{id}.html", name="show_produkt")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }

        return array(
            'entity' => $entity        // ...
        );
    }

//
//    /**
//     * Creates a form to create a typy entity.
//     *
//     * @param typy $entity The entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createCreateForm(typy $entity)
//    {
//        $form = $this->createForm(new typyType(), $entity, array(
//                'action' => $this->generateUrl('typy_create'),
//                'method' => 'POST',
//            ));
//
//        $form->add('submit', 'submit', array('label' => 'Create'));
//
//        return $form;
//    }


//jutro pomyśle


    

    /**
     * @Route("plotno/new", name="plotno_new")
     * @Template()
     */
    public function plotnoAction( Request $request)
    {
        $atrybuty = new atrybuty();
        $entity = new typy();
        $entity->setNazwa('płótno');

        $form = $this->createForm(new atrybutyType(), $atrybuty);


        $form->add('submit', 'submit', array('label' => 'Create'));
//        var_dump($form);
//        exit();

        $form->handleRequest($request);


        if ($form->isValid()) {


//
            $entity->setAtrybut($atrybuty);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            exit(\Doctrine\Common\Util\Debug::dump($form->getData()));

           return $this->render(
                '@ObrazkijakoProdukty/typy/show.html.twig',
                array(
                    'entity' => $entity,
                    'typy_edit' => $entity->getId(),
                    'typy_delete' => $entity->getId(),
                )
            );


        }


        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );


    }


}
