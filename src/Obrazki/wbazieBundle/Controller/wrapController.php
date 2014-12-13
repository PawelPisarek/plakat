<?php


namespace Obrazki\wbazieBundle\Controller;

use Obrazki\wbazieBundle\Entity\Przed;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class wrapController extends Controller
{

    /**
     * @Route("/Blank/{id}", name="ramki")
     * @Template()
     */
    public function BlankAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        $size=$entity->getSize();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Przed entity.');
        }


        return array(
            'entity'=>$entity,
            'id'=>$id,
            'size'=>$size,
            );    }

    /**
     * @Template()
     */
    public function StretchAction($id)
    {
        $em=$this->getDoctrine()->getManager();

        $entity=$em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException('Nie znaleziono obrazka');
        }
        return array(
                'entity'=>$entity,
            );    }

    /**
     * @Template()
     */
    public function MirrorAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $entity=$em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException('nie znaleziono obrazka');
        }
        return array(
                'entity'=>$entity,
            );    }

    /**
     * @Template()
     */
    public function CustomAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $entity=$em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);


        if(!$entity)
        {
            throw $this->createNotFoundException('nie zanleziono obrazka');
        }


        return array(
                'entity'=>$entity,
            );    }

    /**
     * @Template()
     */
    public function Mirror2Action($id)
    {
        $em=$this->getDoctrine()->getManager();
        $entity=$em->getRepository('ObrazkiwbazieBundle:Przed')->find($id);
        if(!$entity)
        {
            throw $this->createNotFoundException('nie zanleziono obrazka');
        }
        return array(
                'entity'=>$entity,
            );    }

}
