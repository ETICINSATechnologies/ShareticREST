<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PoleController extends Controller
{
    /**
     * @Route("/poles/")
     */
    public function getListPoles()
    {
        $response = array();
        $response[0]=array("id"=>0,"name"=>"Test0");
        $response[1]=array("id"=>1,"name"=>"Test1");
        $response[2]=array("id"=>2,"name"=>"Test2");
        return new JsonResponse($response);
    }
}
