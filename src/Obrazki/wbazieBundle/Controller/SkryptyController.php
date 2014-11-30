<?php

namespace Obrazki\wbazieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SkryptyController extends Controller
{
    /**
     * @Route("/odwroc/{id}")
     * @Template()
     */
    public function odwrocAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        $entity->obroc();

        $entity->uploadMinaturka();




        if (!$entity) {
            throw $this->createNotFoundException('Unable to find cos entity.');
        }


        return array(
            'entity'=>$entity,
            'id'=>$id,
        );
    }

    /**
     * @Route("/crop/{id}")
     * @Template()
     */
    public function cropAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        return array(
                // ...
            );    }

}
