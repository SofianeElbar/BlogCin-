<?php
require_once 'partials/header.php';
?>

<h1 style="text-align: center; margin-top: 1em;">
    Auteur : <?php echo $user->getPseudo(); ?>
</h1>



<section class="container mw-100 pt-5 ps-5">
    <div class="row color-overlay d-flex justify-content-center align-items-center"> 
        <?php foreach($postsByUser as $post){ ?> 
            <div class="card bg-dark me-5 mb-5 col-12 col-md-4 col-lg-2">
                <img src="<?php echo $post->getPicture() ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $post->getTitle() ?></h5> 
                    <a href="single.php?id=<?php echo $post->getIdPost()?>" class="btn btn-warning">Voir l'article</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section> 

<?php
require_once 'partials/footer.php';
?>