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
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();

        // TODO: implements authentication
        $id = 1;
        $user = $em->getRepository('ShareticBundle:User')->find($id);

        if($user === null){
            // Formation not found
            return $APIResp->returnError("U_NF");
        }

        $response=$entityFormatter->formatUser($user);

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
        $response['id']="1";
        $response['badges']=array();
        $response['badges'][0]['id']="1";
        $response['badges'][0]['name']="Badge 1";
        $response['badges'][0]['icon']="badge1.png";
        $response['badges'][1]['id']="2";
        $response['badges'][1]['name']="Badge 2";
        $response['badges'][1]['icon']="badge2.png";

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/user/{idUser}/profil", requirements={"idUser": "\d+"})
     */
    public function getUserProfil($idUser)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ShareticBundle:User')->find($idUser);

        if($user === null){
            // Formation not found
            return $APIResp->returnError("U_NF");
        }

        $response=$entityFormatter->formatUser($user);

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
        $response['id']=$idUser;
        $response['badges']=array();
        $response['badges'][0]['id']="1";
        $response['badges'][0]['name']="Badge 1";
        $response['badges'][0]['icon']="badge1.png";
        $response['badges'][1]['id']="2";
        $response['badges'][1]['name']="Badge 2";
        $response['badges'][1]['icon']="badge2.png";

        return $APIResp->returnResponse($response);
    }

    /**
     * @Route("/user/{idUser}/badge/give", requirements={"idUser": "\d+"})
     */
    public function giveUserBadge($idUser)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        $response = array();

        return $APIResp->returnResponse($response);
    }
}
