<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChapterController extends Controller
{
    /**
     * @Route("/chapter/{idChapter}", name="chapters_list", requirements={"idChapter": "\d+"})
     */

    public function getChapter($idChapter)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();
        $response[0]="titre du chapitre";
        $response[1]="texte du chapitre";


        return $APIResp->returnResponse($response);
    }

    // POST REQUEST:
    /**
     * @Route("/chapter/{idChapter}/add", name="chapter_add_document", requirements={"idChapter": "\d+"})
     */
    public function addDocument($idChapter)
    {

        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();


        return $APIResp->returnResponse($response);
    }

    // POST REQUEST:
    /**
     * @Route("/chapter/{idChapter}/edit", name="chapter_edit", requirements={"idChapter": "\d+"})
     */
    public function editChapter($idChapter)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');

        //Just an example of a possible structure of the response
        $response = array();


        return $APIResp->returnResponse($response);
    }

}
