<?php

require_once './model/DBConnect.php';
require_once './model/classes/User.php';

class UserManager{

    public static function getAllUsers(){
        $dbh = dbconnect();
        $query = ("SELECT * FROM user");
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
        return $users;
    }

    public static function getUserById($id) {
        //retourne un seul utilisateur par rapport à son id
        
        $dbh = dbconnect();
        $query = ("SELECT * FROM user WHERE idUser = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getAuthorByPostId($id){
        $dbh = dbconnect();
        $query = "SELECT user.idUser, pseudo, email FROM user JOIN post ON post.idUser_fk = user.idUser WHERE post.idPost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getCommentAuthorByCommentId($id){
        $dbh = dbconnect();
        $query = "SELECT user.idUser, pseudo, email FROM user JOIN comment ON comment.idUser_fk = user.idUser WHERE comment.idComment = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    // Code Greg 

    // public static function addUser($pseudo, $email, $mdp){
    //     $dbh = dbconnect();
    //     $query = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :mdp)";
    //     $stmt = $dbh->prepare($query);
    //     $stmt->bindParam(':pseudo', $pseudo);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':mdp', $mdp);
    //     $stmt->execute();
    // }


    //   public static function getUserByEmail($email){
    //         $dbh = dbconnect();
    //         $query = "SELECT * FROM t_user WHERE t_user.email = :email";
    //         $stmt = $dbh->prepare($query);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->execute();
    //         $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
    //         $user = $stmt->fetch();
    //         return $user; 
    //   }

    public static function connectUser($user){
        session_start();
        $_SESSION['user'] = $user;
    }
   
}




    
    
    


