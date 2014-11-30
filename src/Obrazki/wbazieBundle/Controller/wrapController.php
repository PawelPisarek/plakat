<?php

namespace Obrazki\wbazieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class wrapController extends Controller
{
    /**
     * @Route("/Blank/{id}")
     * @Template()
     */
    public function BlankAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/Stretch/{id}")
     * @Template()
     */
    public function StretchAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/Mirror/{id}")
     * @Template()
     */
    public function MirrorAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/Custom/{id}")
     * @Template()
     */
    public function CustomAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/Mirror2/{id}")
     * @Template()
     */
    public function Mirror2Action($id)
    {
        return array(
                // ...
            );    }

}
