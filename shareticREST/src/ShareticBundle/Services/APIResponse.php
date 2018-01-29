<?php



namespace ShareticBundle\Services;

use Symfony\Component\HttpFoundation\Response;
class APIResponse
{
    private function jsonResponse($array){
        $response = new Response();

        $response->setContent(json_encode($array));

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;

    }
    public function returnResponse($array){
        $return = array();
        $return['success']=true;
        $return['res']=$array;


        return $this->jsonResponse($return);
    }
    public function returnError($code){
        $return = array();
        $return['success']=false;
        $return['code']=$code;

        return $this->jsonResponse($return);
    }
}