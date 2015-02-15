<?php

namespace glowna\PlakatyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class panelController extends Controller
{
    /**
     * @Route("wszystkieZamowienia")
     * @Template()
     */
    public function wszystkieZamowieniaAction()
    {
        $em=$this->getDoctrine()->getManager();
        $klienci=$em->getRepository('ObrazkipfBundle:klient')->findAll();

        

        return array('klienci'=>$klienci);

    }

}
