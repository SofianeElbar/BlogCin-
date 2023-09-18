<?php

class User{

    private $idUser;
    private $pseudo;
    private $email;
    private $password;

    
    public function getIdUser()
    {
        return $this->idUser;
    }

    
    public function getPseudo()
    {
        return $this->pseudo;
    }

    
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    
    public function getEmail()
    {
        return $this->email;
    }

   
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

    
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}