<?php

namespace glowna\PlakatyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StronaGlownaController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/wizytowka")
     * @Template()
     */
    public function wizytowkaAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/plakat")
     * @Template()
     */
    public function plakatAction()
    {
        return array(
                // ...
            );    }

}
