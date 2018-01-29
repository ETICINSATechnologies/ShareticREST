<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MCQController extends Controller
{
    /**
     * @Route("/mcq/{id}/", name="MCQ_by_id", requirements={"idMCQ": "\d+"})
     */
    public function getMCQ($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]=array("id"=>0,"name"=>"Test0");
        $response[1]=array("id"=>1,"name"=>"Test1");
        $response[2]=array("id"=>2,"name"=>"Test2");


        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/mcq/{id}/validate/", name="MCQ_Validation", requirements={"idMCQ": "\d+"})
     */
    public function validateMCQ($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]=array("id"=>0,"name"=>"Test0");
        $response[1]=array("id"=>1,"name"=>"Test1");
        $response[2]=array("id"=>2,"name"=>"Test2");


        return $APIResp->returnResponse($response);
    }

    /**
     * @Route("/mcq/create/", name="MCQ_Creation")
     */
    public function addMCQ()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]=array("id"=>0,"name"=>"formation0");
        $response[1]=array("id"=>1,"name"=>"formation1");
        $response[2]=array("id"=>2,"name"=>"formation2");


        return $APIResp->returnResponse($response);
    }
}
