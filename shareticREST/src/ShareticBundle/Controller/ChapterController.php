<?php

namespace ShareticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ChapterController extends Controller
{
    /**
     * @Route("/chapter/{idChapter}", name="chapters_list", requirements={"idChapter": "\d+"})
     */

    public function getChapter($idChapter)
    {
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $em = $this->getDoctrine()->getManager();
        $chapter = $em->getRepository('ShareticBundle:Chapter')->find($idChapter);

        if($chapter === null){
            return $APIResp->returnError("C_NF");
        }

        $files = $em->getRepository('ShareticBundle:File')->findBy(array("chapter"=>$chapter));
        $fileList = array();

        foreach ($files as $file) {
            $filesRes=$entityFormatter->formatFile($file);
            $filesRes['draft']=$file->getIsDraft();
            array_push($fileList,$filesRes);
        }
        //Just an example of a possible structure of the response
        $response = $entityFormatter->formatChapter($chapter);
        $response['draft']=$chapter->getIsDraft();
        $response['content']=$chapter->getContent();
        $response['files']=$fileList;
        $response['formation']=$entityFormatter->formatFormation($chapter->getFormation());

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
    public function editChapter(Request $request,$idChapter)
    {
        //Initializing the service
        $APIResp = $this->container->get('sharetic.APIResponse');
        $entityFormatter = $this->container->get('sharetic.EntityFormatter');

        $chapterName = $request->request->get('name');
        $chapterDesc = $request->request->get('description');
        $chapterContent = $request->request->get('content');
        $chapterDraft = $request->request->get('draft');

        if($chapterName === null || $chapterDesc === null || $chapterContent === null || $chapterDraft === null || ($chapterDraft!=1 && $chapterDraft!=0)){
            // Invalid request
            return $APIResp->returnError("C_IR");
        }

        $em = $this->getDoctrine()->getManager();
        $chapter = $em->getRepository('ShareticBundle:Chapter')->find($idChapter);

        if($chapter === null){
            // Chapter not found
            return $APIResp->returnError("C_NF");
        }
        $author = $chapter->getFormation()->getAuthor();

        // TODO: implements authentication
        if($author->getId()!=1){
            // Formation permission denied
            return $APIResp->returnError("C_PD");
        }

        $chapter->setName($chapterName);
        $chapter->setDescription($chapterDesc);
        $chapter->setContent($chapterContent);
        $chapter->setIsDraft($chapterDraft);

        $em->merge($chapter);
        $em->flush();

        $response = $entityFormatter->formatChapter($chapter);
        $response['content'] = $chapter->getContent();

        return $APIResp->returnResponse($response);
    }

}
