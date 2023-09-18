<?php
require_once 'partials/header.php';
// var_dump($post);
?>
    <section class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php
                echo '<h1>'.$post->getTitle().'</h1>';
            ?>
            <div id="categories">
                <?php foreach($post_categories as $post_category){ ?>
                    <a href="category.php?id=<?php echo $post_category->getIdCategory() ?>" class="badge rounded-pill text-bg-primary"><?php echo $post_category->getCategoryName() ?></a>
                <?php } ?>
            </div>
            <img src="<?php echo $post->getPicture() ?>">
            <a href="user.php?id=<?php echo $author->getIdUser()?>" class="btn btn-warning"><?php echo $author->getPseudo()?></a>
            <?php    
                echo '<p>'.$post->getDate().'</p>';
                echo '<p>'.$post->getContent().'</p>';

            ?>
        </div> 
        
        <div class="badge bg-primary mb-3">
        Commentaires <span class="badge text-bg-secondary"><?php echo count($comments) ?></span>
        </div>
        <?php foreach($comments as $comment) { 
        $commentAuthor = UserManager::getCommentAuthorByCommentId($comment->getIdComment());?>
            <div>
                <h3><?php echo $commentAuthor->getPseudo() ?></h3>
                <span><?php echo $comment->getDate() ?></span>
                <p><?php echo $comment->getContent() ?></p>
            </div>
        <?php } ?>

        <?php if($_SESSION['user']){ ?>
        <div id="addcomment">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="InputContent" class="form-label">Commenter</label>
                    <textarea class="form-control" id="InputContent" name="content"></textarea>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Soumettre le commentaire</button>
            </form>
        </div>
        <?php } ?>

  
   
    </div>
    </section>



<?php
require_once 'partials/footer.php';
?>