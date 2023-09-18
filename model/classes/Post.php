<?php

class Post {

    private $idPost;
    private $title;
    private $date;
    private $content;
    private $picture;
    private $idUser_fk;

    public function getIdPost(){
        return $this->idPost;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content =$content;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }

    public function getIdUser_fk(){
        return $this->idUser_fk;
    }

    public function setIdUser_fk($idUser_fk){
        $this->idUser_fk = $idUser_fk;
    }
}