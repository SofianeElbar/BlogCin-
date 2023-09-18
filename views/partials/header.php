<?php
require_once './model/DBConnect.php';
require_once './model/managers/PostManager.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="./views/partials/custom.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-danger" href="./">Le blog des cinéphiles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ ?>
                    <li class="nav-item">
                    <a class="nav-link active text-warning" aria-current="" href="logout.php">Se déconnecter</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-warning" href="create.php">Rédiger un article</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Supprimer un article
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($posts as $post){ ?>
                                <li><a class="dropdown-item" href="delete.php?id=<?php echo $post->getIdPost() ?>"><?php echo $post->getTitle() ?></a></li>
                            <?php } ?>                  
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Editer un article
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($posts as $post){ ?>
                                <li><a class="dropdown-item" href="update.php?id=<?php echo $post->getIdPost() ?>"><?php echo $post->getTitle() ?></a></li>
                            <?php } ?>                  
                        </ul>
                    </li>
                    <?php } else { ?> 
                    <li class="nav-item">
                    <a class="nav-link active text-warning" aria-current="" href="views/loginView.php">S'identifier</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-warning" href="views/signinView.php">Créer un compte</a>
                    </li>
                    <?php } ?>  
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($categories as $category){ ?>
                                <li><a class="dropdown-item" href="category.php?id=<?php echo $category->getIdCategory() ?>"><?php echo $category->getCategoryName() ?></a></li>
                            <?php } ?>                  
                        </ul>
                    </li>
                </ul>
               
                <form class="d-flex align-items-center" role="search" action="single.php">
                <label for="InputUser" class="form-label"></label>
                <?php
                    $dbh = dbconnect();   
                    $postfilter = $dbh->query('SELECT * from post');     
                ?>
                        <select class="form-select me-2" name="user" aria-label="user" style=>
                            <option></option>
                            <?php
                                foreach($postfilter as $postItem) {
                                echo '<option value='.$postItem['idPost'].'>'.$postItem['title'].'</option>';
                                }
                            ?>
                        </select>   
                    <button class="btn btn-outline-success" type="submit">Rechercher par film</button>
                    
                </form>
            </div>
        </div>
    </nav>
    <section>
        <?php
            if(isset($_GET['message']) && !empty($_GET['message'])){ 
        ?>
                <div class="alert alert-<?php echo $_GET['status'] ?>" role="alert">
                    <?php echo $_GET['message'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
                </div>
        <?php 
        }
        ?>
    </section>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>    
</body>
</html>