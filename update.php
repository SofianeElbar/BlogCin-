<?php

session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';

//vérifier qu'on recoit bien un id
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $author = UserManager::getAuthorByPostId($id);
    //var_dump($author->getIdUser());
    //on vérifie que l'utilisateur en cours est bien l'auteur de l'article
    if($author->getIdUser()!==$_SESSION['user']['id']){
        header("location:index.php?status=danger&message=Vous n'avez pas l'autorisation de faire cette action");
        die; //si ce n'est pas le cas on quitte le script immédiatement après avoir redirigé le coquin 
    } 
    //récupérer les données du post pour les envoyer dans la vue
    $post = PostManager::getPostById($id);
    $postCategories = CategoryManager::getCategoriesByPostId($id);
}

//si on a des données en POST 
if(isset($_POST)&&!empty($_POST)){
    // var_dump($_POST);
    $id = $_POST['idPost'];
    $post = PostManager::getPostById($id);
    $title = $_POST['title'];
    ///!\ pour l'image qui ne sera pas envoyé si elle est pas modifiée /!\
    //si on reçoit une nouvelle image, on s'en occupe
    if(isset($_FILES['picture']['name'])&&!empty($_FILES['picture']['name'])){
        // var_dump($_FILES);
        $uploads_dir = 'images';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid(); //ici je génère une chaine de caractère aléatoire basée sur l'heure car le serveur écrase les fichiers qui ont le même nom
        $picture = $random_string.'-'.$_FILES['picture']['name'];//on génère un nouveau nom en concaténant les chaines aléatoires et le nom de l'image
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");// on déplace de l'emplacement temporaire vers le dossier de destination sur le serveur
    } else { 
        //sinon, on va redonner à $picture la valeur qu'elle a déjà en bdd
        $picture = $post->getPicture();
        var_dump($post->getPicture());
    }
    $content = $_POST['critique'];
    $userId = $_SESSION['user']['id'];
    //faire appel à une fonction pour UPDATE les infos de l'article
    PostManager::update($id, $title, $picture, $content, $userId);
    //supprimer les catégories déjà en bdd pour l'article
    PostManager::deletePostCategoriesByPostId($id);
    //enregistrer les nouvelles
    $postCategories = $_POST['categories'];
    foreach($postCategories as $cat){
        PostManager::addPostCategories($id, $cat);
    }
    header("location:single.php?id=$id&status=success&message=L'article a bien été mis à jour");
}  

//toutes nos catégories pour le menu de navigation
$categories = CategoryManager::getAllCategories();

require_once 'views/updateView.php';