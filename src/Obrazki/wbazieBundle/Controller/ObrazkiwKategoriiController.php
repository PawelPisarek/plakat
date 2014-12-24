<?php

namespace Obrazki\wbazieBundle\Controller;

use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/index/{grupa}",name="menuk")
     */
    public function szukajAction($grupa)
    {
        $em = $this->getDoctrine()->getManager();


        $entities = $em->getRepository('ObrazkiwbazieBundle:Przed');



        $query = $entities->createQueryBuilder('p')
            ->select('p')
            ->leftJoin('ObrazkijakoProduktyBundle:Grupa', 'g', 'WITH', 'p.grupa = g.id')
            ->where('g.nazwa=:grupa')
            ->setParameter('grupa',$grupa)
            ->getQuery();





        $result = $query->getResult();
        if(sizeof($result) == 0){

            $result = $em->getRepository('ObrazkiwbazieBundle:Przed')->findAll();
        }

//
//        exit(\Doctrine\Common\Util\Debug::dump($result));

//        $entities = $em->getRepository('ObrazkiwbazieBundle:Przed')->findBy(array('grupa_id' => $grupa));
//         var_dump($em->getRepository('ObrazkiwbazieBundle:Przed')->innerJoin('grupa_id')->where('.id = :user_id'));
////        $qb->join('u.Group', 'g', 'WITH', 'u.status = ?1')
////             $qb->join('Przed.grupa_id', 'g', 'WITH', 'grupa.id = ?1')
//
//        exit(\Doctrine\Common\Util\Debug::dump($entities));
//

        return $this->render(
            '@Obrazkiwbazie/ObrazkiwKategorii/index.html.twig',
            array(
                'entities' => $result,

            )
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
    public function plotnoAction(Request $request)
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
