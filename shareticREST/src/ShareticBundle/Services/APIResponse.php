<?php



namespace ShareticBundle\Services;

use Symfony\Component\HttpFoundation\JsonResponse;
class APIResponse
{
    public function returnResponse($array){
        $return = array();
        $return['success']=true;
        $return['res']=$array;
        return new JsonResponse($return);
    }
    public function returnError($code){
        $return = array();
        $return['success']=false;
        $return['code']=$code;
        return new JsonResponse($return);
    }
}