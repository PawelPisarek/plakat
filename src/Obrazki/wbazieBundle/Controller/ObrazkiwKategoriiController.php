<?php

namespace Obrazki\wbazieBundle\Controller;

use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\koszulka;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Form\atrybutyType;
use Obrazki\jakoProduktyBundle\Form\koszulkaType;
use Obrazki\jakoProduktyBundle\Form\typyType;
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
    public function showAction($id, Request $request, $typr)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }

        if (!in_array($typr, array('wizyt', 'canvas', 'koszul'))) {
            throw $this->createNotFoundException('Nie ma takiego produktu');
        }


        //   $zamowienie=new zamowienie();
        $produkt = new Produkt();


        $produkt->setZdjecia($entity);

        $produkt->setNetto(100);
        $produkt->setProcVat(22);
        $produkt->setBrutto($produkt->getNetto() * $produkt->getProcVat() / 100 + $produkt->getNetto());
        $produkt->setRabat(0);
        $typ = new typy();

        if ($typr == 'canvas') {
            $typ->setNazwa('płótno');
        }
        if ($typr == 'wizyt') {
            $typ->setNazwa('wizytówka');
        }


        if ($typr == 'koszul') {
            $typ->setNazwa('koszulka');
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

//            var_dump($typ);
//            exit;
//

            $produkt->setTypu($typ);

//            exit(\Doctrine\Common\Util\Debug::dump($produkt));

            $em->persist($produkt);
            $em->flush();


            return $this->redirect($this->generateUrl('plotno_new', array('id' => $produkt->getId())));

        }


        return array(
            'typ'=>$typ->getNazwa(),
            'entity' => $entity,
            'form' => $form->createView(),

        );
    }


    public function dodajCiasteczko($idProduktu)
    {
        $cookieGuest = array(
            'name' => 'produkt',
            'value' => $idProduktu
        );

        $request = $this->get('request');
        $cookies = $request->cookies;


        if ($cookies->has('produkt')) {
//                var_dump($cookies->get('produkt'));
            $cookieGuest = array(
                'name' => 'produkt',
                'value' => $cookies->get('produkt') . ',' . $idProduktu
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
    }


    /**
     * @Route("typp/new/{id}", name="plotno_new")
     * @Template()
     */
    public function plotnoAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $produkt = $em->getRepository('ObrazkipfBundle:Produkt')->find($id);

        $typ = $produkt->getTypu();

        if ($typ->getNazwa() == "płótno") {
            $atrybuty = new atrybuty();

            $form = $this->createForm(new atrybutyType(), $atrybuty);
            $form->add('submit', 'submit', array('label' => 'Create'));
        } else {

            if ($typ->getNazwa() == "koszulka") {


                $form = $this->createForm(new typyType(), $typ);
                $form->add('submit', 'submit', array('label' => 'Create'));


            } else {
                $em->persist($produkt);
                $em->flush();
                $this->dodajCiasteczko($produkt->getId());

                return $this->redirect($this->generateUrl('produkt_show', array('id' => $produkt->getId())));


            }

        }


        $form->handleRequest($request);

        if ($form->isValid()) {

            if (isset($atrybuty)) {
                $typ->setAtrybut($atrybuty);

            } else {
//                if (isset($koszulka)) {
//                    $typ->setKoszulki($koszulka);
//                }
            }
//


            $produkt->setTypu($typ);

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

            $this->dodajCiasteczko($produkt->getId());

            return $this->redirect($this->generateUrl('produkt_show', array('id' => $produkt->getId())));

        }

        return array(
            'entity' => $produkt->getZdjecia(),
            'form' => $form->createView(),
            'typ'=>$typ->getNazwa()

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
            if ($produkt != null) {
                $zamowienie->addProdukty($produkt);
            }

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
    public function  stworzKlientaAction(Request $request, $id) {
        $klient = new klient();
        $klient->setLogin('Klient bez rejestracji');


        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkipfBundle:zamowienie')->find($id);


        $klient->addZamowienium($entity);


        $form = $this->createForm(new klientType(), $klient);
        $form->add('submit', 'submit', array('label' => 'create'));
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($klient);
            $em->flush();

            return $this->redirect($this->generateUrl('klient_show', array('id' => $klient->getId())));
        }

        return array(
            'entity' => $klient,
            'form' => $form->createView(),
        );


    }
}
