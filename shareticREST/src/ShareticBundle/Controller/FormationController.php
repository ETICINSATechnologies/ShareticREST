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
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('ShareticBundle:Formation')->find($id);
        $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation));

        if($formation === null){
            return $APIResp->returnError("F_001");
        }

        $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation));
        $chaptersRes = array();

        foreach ($chapters as $chap) {
            $position=$chap->getPosition();
            $chaptersRes[$position]=array();
            $chaptersRes[$position]['id']=$chap->getId();
            $chaptersRes[$position]['position']=$position;
            $chaptersRes[$position]['name']=$chap->getName();
            $chaptersRes[$position]['description']=$chap->getDescription();
            $chaptersRes[$position]['draft']=$chap->getIsDraft();
            $chaptersRes[$position]['icon']=$entityFormatter->formatIcon($chap->getImage());

        }


        //Just an example of a possible structure of the response
        $response = array();
        $response['id']=$formation->getId();
        $response['name']=$formation->getName();
        $response['description']=$formation->getDescription();
        $response['draft']=$formation->getIsDraft();
        $response['icon']=$entityFormatter->formatIcon($formation->getImage());
        $response['pole']=$entityFormatter->formatPole($formation->getPole());
        $response['author']=$entityFormatter->formatUser($formation->getAuthor());
        $response['chapters']=$chaptersRes;


        return $APIResp->returnResponse($response);
    }

    /**
     * @Route("/formations", name="formations")
     */
    public function getFormations()
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $formations = $em->getRepository('ShareticBundle:Formation')->findBy(array("isDraft"=>false));

        $response = array();
        foreach ($formations as $formation) {
            $formRes = array();
            $formRes['id']=$formation->getId();
            $formRes['name']=$formation->getName();
            $formRes['description']=$formation->getDescription();
            $formRes['icon']=$entityFormatter->formatIcon($formation->getImage());
            $formRes['pole']=$entityFormatter->formatPole($formation->getPole());
            $formRes['author']=$entityFormatter->formatUser($formation->getAuthor());
            array_push($response,$formRes);
        }

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
