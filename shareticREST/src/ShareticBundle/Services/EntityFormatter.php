<?php



namespace ShareticBundle\Services;

use Symfony\Component\HttpFoundation\Response;
class EntityFormatter
{
    public function formatIcon($icon){
        $return = array();
        if($icon === null){
            $return['path']="default";
            $return['format']="png";
        }
        else {
            $return['path']=$icon->getPath();
            $return['format']=$icon->getFormat();
        }


        return $return;
    }
    public function formatUser($user){
        $return = array();
        $return['id']=$user->getId();
        $return['fistname']=$user->getFirstname();
        $return['lastname']=$user->getLastname();
        $return['icon']=$this->formatIcon($user->getImage());

        return $return;
    }
    public function formatPole($pole){
        $return = array();
        $return['id']=$pole->getId();
        $return['name']=$pole->getName();

        return $return;
    }
}