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


    /**
     * @Route("/index/{grupa}",name="menuk")
     */
    public function menuAction($grupa)
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
        return $this->render(
            '@Obrazkiwbazie/ObrazkiwKategorii/index.html.twig',
            array(
                'entities' => $result,

            )
        );
    }
}
