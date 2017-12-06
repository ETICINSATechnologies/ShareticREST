<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();
        $response['version']="?";

        return $APIResp->returnResponse($response);
    }
}
