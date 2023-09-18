<?php
//session_start();

require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';


if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    $categoryPosts = PostManager::getPostsByCategoryId($id);

    //var_dump($categoryPosts);
    // var_dump($categoryInfos);
}

$categories = CategoryManager::getAllCategories();


require_once 'views/categoryView.php';
