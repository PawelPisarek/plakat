<?php

namespace Obrazki\jakoProduktyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class menuController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $entities=$em->getRepository('ObrazkijakoProduktyBundle:Grupa')->findAll();
        return array('entities' => $entities);
    }
}
