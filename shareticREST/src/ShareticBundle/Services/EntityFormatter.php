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
        $return['description']=$pole->getDescription();
        $return['icon']=$this->formatIcon($pole->getImage());

        return $return;
    }
    public function formatFormation($formation){
        $return = array();
        $return['id']=$formation->getId();
        $return['name']=$formation->getName();
        $return['description']=$formation->getDescription();
        $return['icon']=$this->formatIcon($formation->getImage());
        $return['pole']=$this->formatPole($formation->getPole());
        $return['author']=$this->formatUser($formation->getAuthor());

        return $return;
    }
    public function formatChapter($chapter){
        $return = array();
        $return['id']=$chapter->getId();
        $return['position']=$chapter->getPosition();
        $return['name']=$chapter->getName();
        $return['description']=$chapter->getDescription();
        $return['draft']=$chapter->getIsDraft();
        $return['icon']=$this->formatIcon($chapter->getImage());

        return $return;
    }
}