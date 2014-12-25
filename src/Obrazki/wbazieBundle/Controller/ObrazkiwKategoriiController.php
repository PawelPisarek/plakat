<?php

namespace Obrazki\wbazieBundle\Controller;

use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;
use Obrazki\pfBundle\Entity\Produkt;
use Obrazki\pfBundle\Entity\zamowienie;
use Obrazki\pfBundle\Form\ProduktType;
use Obrazki\pfBundle\Form\zamowienieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ObrazkiwKategoriiController extends Controller
{
    /**
     * @Route("/index/", name="kategoirie" )
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
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }

     //   $zamowienie=new zamowienie();
        $produkt=new Produkt();

       $produkt->setIdZdjecia($entity);

        $produkt->setNetto(100);
        $produkt->setProcVat(22);
        $produkt->setBrutto($produkt->getNetto()*$produkt->getProcVat()/100+$produkt->getNetto());
        $produkt->setRabat(0);
       // $zamowienie->setZaplacono(false);

       // $zamowienie->setDataWysylki(new \DateTime());

      //  $zamowienie->addProdukty($produkt);

        $form = $this->createForm(new ProduktType(), $produkt);
        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produkt);
            $em->flush();


            return $this->redirect($this->generateUrl('plotno_new',array('id'=> $produkt->getId())));

        }


        return array(
           'entity' => $entity,
            'form' => $form->createView(), // ...
        );
    }

    /**
     * @Route("plotno/new/{id}", name="plotno_new")
     * @Template()
     */
    public function plotnoAction(Request $request,$id)
    {


        $atrybuty = new atrybuty();
        $entity = new typy();
        $entity->setNazwa('płótno');
        $form = $this->createForm(new atrybutyType(), $atrybuty);
        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);
        if ($form->isValid()) {
            $entity->setAtrybut($atrybuty);


            $em = $this->getDoctrine()->getManager();
            $produkt=$em->getRepository('ObrazkipfBundle:Produkt')->find($id);
            $produkt->setIdTypu($entity);

            $em->persist($entity);
            $em->flush();
//            return $this->render(
//                '@ObrazkijakoProdukty/produkt/show.html.twig',
//                array(
//                    'entity' => $entity,
//                    'typy_edit' => $entity->getId(),
//                    'typy_delete' => $entity->getId(),
//                )
//            );
            return $this->redirect($this->generateUrl('produkt_show',array('id'=>$produkt->getId())));
        }
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }


}
