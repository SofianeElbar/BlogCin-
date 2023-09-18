<?php
require_once './model/DBConnect.php';

if(isset($_POST) && !empty($_POST)){
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $mdp = $_POST['pass'];
    $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

// Code Greg
//  UserManager::adduser($pseudo,$email,$hashed_password)
    $createUser ="INSERT INTO user (pseudo, email, mdp) VALUES (:pseudo, :email, :hashed_password)";
    $dbh = dbconnect();
    $stmt = $dbh->prepare($createUser);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':hashed_password', $hashed_password, PDO::PARAM_STR);
    $stmt->execute();
    
} 

header('Location: ./');








