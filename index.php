<?php 
// session_start();
// var_dump($_SESSION['user']);
// if ($_SESSION['user'] != null){
    // echo "Salut à toi l'ami du cinéma!";
// }else{
    // echo "Hasta la vista baby !";
// }

require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';



$categories = CategoryManager::getAllCategories();
$posts = PostManager::getAllPosts(); 


require_once 'views/indexView.php';