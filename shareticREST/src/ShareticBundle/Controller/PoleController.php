<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\JsonResponse;

class PoleController extends Controller
{
    /**
     * @Route("/poles/", name="poles_list")
     */
    public function getListPoles()
    {
        //Initialising the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]=array("id"=>0,"name"=>"Test0");
        $response[1]=array("id"=>1,"name"=>"Test1");
        $response[2]=array("id"=>2,"name"=>"Test2");


        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/pole/{id}/formations/", name="pole_formations_list", requirements={"id": "\d+"})
     */
    public function getListFormations($id=-1)
    {
        //Initialising the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]=array("id"=>0,"name"=>"formation0");
        $response[1]=array("id"=>1,"name"=>"formation1");
        $response[2]=array("id"=>2,"name"=>"formation2");


        return $APIResp->returnResponse($response);
    }
}
