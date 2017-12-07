<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/user/profil")
     */
    public function getProfil()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();
        $response['?']="?";

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/user/stats")
     */
    public function getStats()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();
        $response['?']="?";

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/user/{idUser}/profil", requirements={"idUser": "\d+"})
     */
    public function getUserProfil($idUser)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();
        $response['?']="?";

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/user/{idUser}/stats", requirements={"idUser": "\d+"})
     */
    public function getUserStats($idUser)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();
        $response['?']="?";

        return $APIResp->returnResponse($response);
    }
}
