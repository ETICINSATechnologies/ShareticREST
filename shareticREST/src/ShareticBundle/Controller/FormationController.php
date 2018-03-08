<?php

namespace ShareticBundle\Controller;

use ShareticBundle\Entity\Chapter;
use ShareticBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

        if($formation === null){
            return $APIResp->returnError("F_NF");
        }

        $author = $formation->getAuthor();
        $isDraft = $formation->getIsDraft();
        // TODO: implements authentication
        if($isDraft && $author->getId()!=1){
            // Formation permission denied
            return $APIResp->returnError("F_PD");
        }

        $chapters=null;
        if($author->getId()==1){
            $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation), array('position' => 'ASC'));
        }
        else {
            $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation,"isDraft"=>false), array('position' => 'ASC'));
        }

        $chaptersRes = array();

        $position = 0;
        foreach ($chapters as $chap) {
            $chaptersRes[$position]=$entityFormatter->formatChapter($chap);
            $chaptersRes[$position]['draft']=$chap->getIsDraft();
            $position++;
        }

        $response = $entityFormatter->formatFormation($formation);
        $response['draft']=$formation->getIsDraft();
        $response['pole']=$entityFormatter->formatPole($formation->getPole());
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
            $formRes = $entityFormatter->formatFormation($formation);
            $formRes['pole']=$entityFormatter->formatPole($formation->getPole());
            array_push($response,$formRes);
        }

        return $APIResp->returnResponse($response);
    }

    // POST REQUEST:
    /**
     * @Route("/formation/{id}/addChapter", name="formation_addChapter", requirements={"id": "\d+"})
     */
    public function addChapter(Request $request, $id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $chapterName = $request->request->get('name');
        $chapterDesc = $request->request->get('description');

        if($chapterName === null || $chapterDesc === null){
            // Formation invalid request
            return $APIResp->returnError("F_IR");
        }

        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('ShareticBundle:Formation')->find($id);

        if($formation === null){
            // Formation not found
            return $APIResp->returnError("F_NF");
        }
        $author = $formation->getAuthor();

        // TODO: implements authentication
        if($author->getId()!=1){
            // Formation permission denied
            return $APIResp->returnError("F_PD");
        }

        $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation),array('position' => 'ASC'));
        $position = 0;
        foreach ($chapters as $chap) {
            if($position!=$chap->getPosition()){
                // Update position
                $chap->setPosition($position);
            }
            $position++;
        }

        $newChapter = new Chapter();
        $newChapter->setName($chapterName);
        $newChapter->setDescription($chapterDesc);
        $newChapter->setContent("");
        $newChapter->setPosition($position);
        $newChapter->setIsDraft(1);
        $newChapter->setFormation($formation);


        $em->persist($newChapter);
        $em->flush();

        $response = array($entityFormatter->formatChapter($newChapter));

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/{id}/edit", name="formation_edit", requirements={"id": "\d+"})
     */
    public function editFormation(Request $request,$id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $formationPoleId = $request->request->get('pole');
        $formationName = $request->request->get('name');
        $formationDesc = $request->request->get('description');
        $formationDraft = $request->request->get('draft');

        if($formationPoleId === null || $formationName === null || $formationDesc === null || $formationDraft === null || ($formationDraft!=1 && $formationDraft!=0)){
            // Invalid request
            return $APIResp->returnError("F_IR");
        }

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('ShareticBundle:Formation')->find($id);

        if($formation === null){
            // Formation not found
            return $APIResp->returnError("F_NF");
        }
        $author = $formation->getAuthor();

        // TODO: implements authentication
        if($author->getId()!=1){
            // Formation permission denied
            return $APIResp->returnError("F_PD");
        }

        if($formation->getPole()->getId()!=$formationPoleId){
            $formationPole = $em->getRepository('ShareticBundle:Pole')->find($formationPoleId);

            if($formationPole === null){
                // Pole not found
                return $APIResp->returnError("P_NF");
            }

            $formation->setPole($formationPole);
        }

        $formation->setName($formationName);
        $formation->setDescription($formationDesc);
        $formation->setIsDraft($formationDraft);

        $em->persist($formation);
        $em->flush();

        $response = array($entityFormatter->formatFormation($formation));

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/add", name="formation_add", requirements={"id": "\d+"})
     */
    public function addFormation(Request $request)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $formationPoleId = $request->request->get('pole');
        $formationName = $request->request->get('name');
        $formationDesc = $request->request->get('description');

        if($formationPoleId === null || $formationName === null || $formationDesc === null){
            // Invalid request
            return $APIResp->returnError("F_IR");
        }

        $em = $this->getDoctrine()->getManager();
        $formationPole = $em->getRepository('ShareticBundle:Pole')->find($formationPoleId);

        if($formationPole === null){
            // Pole not found
            return $APIResp->returnError("P_NF");
        }

        // TODO: implements authentication
        $author = $em->getRepository('ShareticBundle:User')->find(1);


        $newFormation = new Formation();
        $newFormation->setName($formationName);
        $newFormation->setDescription($formationDesc);
        $newFormation->setAuthor($author);
        $newFormation->setIsDraft(1);
        $newFormation->setPole($formationPole);


        $em->persist($newFormation);
        $em->flush();

        $response = array($entityFormatter->formatFormation($newFormation));

        return $APIResp->returnResponse($response);
    }
    /**
     * @Route("/formation/{id}/delete", name="formation_delete", requirements={"id": "\d+"})
     */
    public function deleteFormation($id=-1)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('ShareticBundle:Formation')->find($id);

        if($formation === null){
            // Formation not found
            return $APIResp->returnError("F_NF");
        }

        $author = $formation->getAuthor();

        // TODO: implements authentication
        if($author->getId()!=1){
            // Formation permission denied
            return $APIResp->returnError("F_PD");
        }

        $chapters = $em->getRepository('ShareticBundle:Chapter')->findBy(array("formation"=>$formation));
        foreach ($chapters as $chap) {
            $em->remove($chap);
        }

        $em->remove($formation);
        $em->flush();

        $response = array();

        return $APIResp->returnResponse($response);
    }
}
