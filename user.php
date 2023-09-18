<?php
session_start();
require_once 'model/managers/UserManager.php';
require_once 'model/managers/PostManager.php';

// require_once 'views/partials/header.php';

if(isset($_GET['id']) &&!empty ($_GET['id'])){
    $id = $_GET['id'];
    $user = UserManager::getUserById($id);
    $postsByUser = PostManager::getPostsByUserId($id);
    $author = UserManager::getAuthorByPostId($id);


}



require_once 'views/userView.php';
