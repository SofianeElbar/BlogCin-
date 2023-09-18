<?php
require_once 'partials/header.php';
// var_dump($posts);
?>
<section class="container mw-100 pt-5 ps-5" style="background-image: url('./projecteur.jpg');  
    background-size: cover;  
    background-repeat: no-repeat;">
    <div class="row color-overlay d-flex justify-content-center align-items-center">
        <?php foreach($categoryPosts as $post){ ?>
            <div class="card bg-dark me-5 mb-5 col-12 col-md-4 col-lg-2">
                <img src="<?php echo $post->getPicture() ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $post->getTitle() ?></h5> 
                    <h5 class="card-title text-danger"><?php echo $categoryInfos->getCategoryName()?></h5> 
                    <a href="single.php?id=<?php echo $post->getIdPost()?>" class="btn btn-warning">Voir l'article</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<?php
require_once 'partials/footer.php';
?>