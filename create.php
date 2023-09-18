<?php

session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if(isset($_SESSION['user'])){
    if(isset($_POST)&&!empty($_POST)){
        // var_dump($_FILES);
        $title = $_POST['title'];
        // $picture = $_POST['picture'];
        $uploads_dir = 'images';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid();
        $picture = $random_string.'-'.$_FILES['picture']['name'];        
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");

        $content = $_POST['critique'];
        $userId = $_SESSION['user']['id'];
        $newPost = PostManager::create($title, "$uploads_dir/$picture", $content, $userId);
        $postCategories = $_POST['categories'];
        foreach($postCategories as $cat){
            PostManager::addPostCategories($newPost, $cat);
        }
        header('Location: ./');
   
    }


    require_once 'views/createView.php';

}else{
    echo 'Vous ne passerez pas !!!';
}


// if(isset($_POST) && !empty($_POST)){
//     $title = $_POST['title'];
//     $date = $_POST['date'];
//     $critique = $_POST['critique'];
//     $image = $_POST['picture'];

//     $createPost ="INSERT INTO post (title, date, content, picture, idUser_fk) VALUES (:title, :date, :content, :picture, :idUser_fk)";
//     $dbh = dbconnect();
//     $stmt = $dbh->prepare($createPost);
//     $stmt->bindParam(':title', $title, PDO::PARAM_STR);
//     $stmt->bindParam(':date', $date, PDO::PARAM_STR);
//     $stmt->bindParam(':content', $critique, PDO::PARAM_STR);
//     $stmt->bindParam(':picture', $image, PDO::PARAM_STR);
//     $stmt->bindParam(':idUser_fk', $user, PDO::PARAM_INT);
//     $stmt->execute();
    
// } 

