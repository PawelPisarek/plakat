<?php

namespace Obrazki\wbazieBundle\Controller;

use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;
use Obrazki\pfBundle\Entity\klient;
use Obrazki\pfBundle\Entity\Produkt;
use Obrazki\pfBundle\Entity\zamowienie;
use Obrazki\pfBundle\Form\klientType;
use Obrazki\pfBundle\Form\ProduktType;
use Obrazki\pfBundle\Form\zamowienieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ObrazkiwKategoriiController extends Controller
{
    /**
     * @Route("/index/{typr}", name="kategoirie" )
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ObrazkiwbazieBundle:Przed')->findAll();

//            $typr2=$typr;

        return array(
            'entities' => $entities,
            'typr',
        );
    }

    /**
     * @Route("{typr}/{id}.html", name="show_produkt")
     * @Template()
     */
    public function showAction($id, Request $request,$typr)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }

        //   $zamowienie=new zamowienie();
        $produkt = new Produkt();

        $produkt->setIdZdjecia($entity);

        $produkt->setNetto(100);
        $produkt->setProcVat(22);
        $produkt->setBrutto($produkt->getNetto() * $produkt->getProcVat() / 100 + $produkt->getNetto());
        $produkt->setRabat(0);
        $typ = new typy();

        if($typr=='canvas')
        {
            $typ->setNazwa('płótno');
        }
        if($typr=='wizyt')
        {
            $typ->setNazwa('wizytówka');
        }
        // $zamowienie->setZaplacono(false);

        // $zamowienie->setDataWysylki(new \DateTime());

        //  $zamowienie->addProdukty($produkt);



        $form = $this->createForm(new ProduktType(), $produkt);
        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($typ);
            $produkt->setIdTypu($typ);

            $em->persist($produkt);
            $em->flush();


            return $this->redirect($this->generateUrl('plotno_new', array('id' => $produkt->getId())));

        }


        return array(
            'entity' => $entity,
            'form' => $form->createView(),

        );
    }

    /**
     * @Route("typp/new/{id}", name="plotno_new")
     * @Template()
     */
    public function plotnoAction(Request $request, $id)
    {


        $atrybuty = new atrybuty();


//        echo dump($typp);
//        exit();

//        if($typp=='canvas')
//        {
//            $typ->setNazwa('płótno');
//        }


        $form = $this->createForm(new atrybutyType(), $atrybuty);
        $form->add('submit', 'submit', array('label' => 'Create'));


        $em = $this->getDoctrine()->getManager();
        $produkt = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);


//        $typ = $this->getDoctrine()->getManager()->getRepository('ObrazkijakoProduktyBundle:typy')->findOneBy(array('id'=>$produkt->getIdTypu()->getId()));


        $typ1 = $produkt->getIdTypu();

        dump($produkt->getIdTypu()->getId());
        dump($typ1);
//        dump($typ);
        exit();
        if($typp=='canvas')
//        {
//            $typ->setNazwa('płótno');
//        }

        $form->handleRequest($request);

        if ($form->isValid()) {

            $typ->setAtrybut($atrybuty);



            $produkt->setIdTypu($typ);

            $em->persist($produkt);
            $em->flush();
//            return $this->render(
//                '@ObrazkijakoProdukty/produkt/show.html.twig',
//                array(
//                    'entity' => $entity,
//                    'typy_edit' => $entity->getId(),
//                    'typy_delete' => $entity->getId(),
//                )
//            );
//-------------------------------------------------------------
            $cookieGuest = array(
                'name' => 'produkt',
                'value' => $produkt->getId()
            );

            $request = $this->get('request');
            $cookies = $request->cookies;


            if ($cookies->has('produkt')) {
//                var_dump($cookies->get('produkt'));
                $cookieGuest = array(
                    'name' => 'produkt',
                    'value' => $cookies->get('produkt') . ',' . $produkt->getId()
                );

                $cookie = new Cookie(
                    $cookieGuest['name'], $cookieGuest['value']
                );

//                var_dump($cookie);
//                exit();
            } else {
                $cookie = new Cookie(
                    $cookieGuest['name'], $cookieGuest['value']
                );
            }


            $response = new Response();
            $response->headers->setCookie($cookie);
            $response->send();

//----------------------------------------------------------------------------------
            return $this->redirect($this->generateUrl('produkt_show', array('id' => $produkt->getId())));
        }

        return array(
            'entity' => $produkt->getIdZdjecia(),
            'form' => $form->createView(),

        );
    }

    /**
     * @Route("/zamowien", name="nowezam")
     * @Template()
     */
    public function stworzzamAction(Request $request)
    {
        $zamowienie = new zamowienie();

        $request = $this->get('request');
        $cookies = $request->cookies;

        $produkty = explode(',', $cookies->get('produkt'));

        $em = $this->getDoctrine()->getManager();
        foreach ($produkty as $id) {
            $produkt = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);
           if($produkt!=null)
               $zamowienie->addProdukty($produkt);

        }

        $zamowienie->setDataWysylki(new  \DateTime('2000-01-01')); //set data wysyłki nie poprawnie

        $form = $this->createForm(new zamowienieType(), $zamowienie);
        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zamowienie);
            $em->flush();

            $response = new Response();
            $response->headers->clearCookie('produkt');
            $response->send();

            return $this->redirect($this->generateUrl('nowyklie', array('id' => $zamowienie->getId())));
        }

        return array(
            'entity' => $zamowienie,
            'form' => $form->createView(),

        );
    }


    /**
     * @Route("/adre/{id}",name="nowyklie")
     * @Template()
     */
    public function  stworzKlientaAction(Request $request,$id)
    {
        $klient=new klient();
        $klient->setLogin('1');
        $klient->setHaslo('1');

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);


        $klient->addZamowienium($entity);


        $form=$this->createForm(new klientType(),$klient);
        $form->add('submit','submit',array('label'=>'create'));
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($klient);
            $em->flush();

            return $this->redirect($this->generateUrl('klient_show',array('id'=>$klient->getId())));
        }
        return array(
          'entity'=>$klient,
            'form'=>$form->createView(),
        );


    }
}
