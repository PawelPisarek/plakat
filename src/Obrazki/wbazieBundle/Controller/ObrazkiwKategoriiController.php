<?php

namespace Obrazki\wbazieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ObrazkiwKategoriiController extends Controller
{
    /**
     * @Route("/index")
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
     * @Route("/{id}.html")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }
        return array(
            'entity' => $entity        // ...
        );
    }

}
