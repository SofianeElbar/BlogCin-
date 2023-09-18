<?php

class Comment {

    private $idComment;
    private $idPost_fk;
    private $idUser_fk;
    private $date;
    private $content;

    /**
     * Get the value of idComment
     */ 
    public function getIdComment()
    {
        return $this->idComment;
    }
    
  
    /**
     * Get the value of idPost_fk
     */ 
    public function getIdPost_fk()
    {
        return $this->idPost_fk;
    }

    /**
     * Set the value of idPost_fk
     *
     * @return  self
     */ 
    public function setIdPost_fk($idPost_fk)
    {
        $this->idPost_fk = $idPost_fk;

        return $this;
    }
    

    /**
     * Get the value of idUser_fk
     */ 
    public function getIdUser_fk()
    {
        return $this->idUser_fk;
    }

    /**
     * Set the value of idUser_fk
     *
     * @return  self
     */ 
    public function setIdUser_fk($idUser_fk)
    {
        $this->idUser_fk = $idUser_fk;

        return $this;
    }


    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}