<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use ShareticBundle\Entity\Pole;
use ShareticBundle\Entity\Formation;

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
        $em = $this->get('doctrine.orm.entity_manager');

        $repo_pole = $em->getRepository('ShareticBundle:Formation');

        $records = $repo_pole->findBy(array('pole_id'=>$id));

        $response = array();
        $c=0;
        foreach($records as $formation){
            $formation_arr = array(
                "id" => $formation->getId(),
                "name" => $formation->getName(),
                "description" => $formation->getDescription()
            );

            $response[$c]=$formation_arr;
            $c++;

        }

        $APIResp = $this->container->get('sharetic.APIResponse');

        return $APIResp->returnResponse($response);
    }
}
