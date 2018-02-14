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
        $APIResp = $this->container->get('sharetic.APIResponse');

        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $poles = $em->getRepository('ShareticBundle:Pole')->findAll();

        $response = array();
        foreach ($poles as $pole) {
            $polesRes = formatPole($pole);
            array_push($response,$polesRes);
        }

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/pole/{id}/formations/", name="pole_formations_list", requirements={"id": "\d+"})
     */
    public function getListFormations($id=-1)
    {
        $APIResp = $this->container->get('sharetic.APIResponse');

        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $pole = $em->getRepository('ShareticBundle:Pole')->find($id);

        if($pole === null){
            return $APIResp->returnError("P_NF");
        }

        $response = array();
        $response['pole']=$entityFormatter->formatPole($pole);

        $formations = $em->getRepository('ShareticBundle:Formation')->findBy(array('pole'=>$pole));

        $formationList = array();

        foreach ($formations as $formation) {
            $formationRes = $entityFormatter->formatFormation($formation);
            unset($formationRes['pole']);
            array_push($formationList,$formationRes);
        }

        $response = array();
        $response['pole']=$entityFormatter->formatPole($pole);
        $response['formations']=$formationList;

        return $APIResp->returnResponse($response);
    }
}
