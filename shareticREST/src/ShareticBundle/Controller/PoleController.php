<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use ShareticBundle\Entity\Pole;

class PoleController extends Controller
{
    /**
     * @Route("/poles/", name="poles_list")
     */
    public function getListPoles()
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $repo_pole = $em->getRepository('ShareticBundle:Pole');

        $records = $repo_pole->findAll();

        $response = array();
        $c=0;
        foreach($records as $pole){
            $pole_arr = array("id"=>$pole->getId(), "name"=>$pole->getName(),"description"=>$pole->getDescription());
            $response[$c]=$pole_arr;
            $c++;

        }
        
        $APIResp = $this->container->get('sharetic.APIResponse');

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/pole/{id}/formations/", name="pole_formations_list", requirements={"id": "\d+"})
     */
    public function getListFormations($id=-1)
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
