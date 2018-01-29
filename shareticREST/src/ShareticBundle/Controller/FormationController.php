<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FormationController extends Controller
{
    // GET REQUEST:
    /**
     * @Route("/formation/{id}", name="formation", requirements={"id": "\d+"})
     */
    public function getFormation($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response['id']="1";
        $response['name']="PHP";
        $response['description']="Apprenez PHP.";
        $response['icon']="php.png";

        return $APIResp->returnResponse($response);
    }

    // POST REQUEST:
    /**
     * @Route("/formation/{id}/addChapter", name="formation_addChapter", requirements={"id": "\d+"})
     */
    public function addChapter($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/{id}/edit", name="formation_edit", requirements={"id": "\d+"})
     */
    public function editFormation($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/{id}/rate", name="formation_rate", requirements={"id": "\d+"})
     */
    public function rateFormation($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/create", name="formation_create", requirements={"id": "\d+"})
     */
    public function createFormation()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();

        return $APIResp->returnResponse($response);
    }
}
