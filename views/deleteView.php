<?php
require_once 'partials/header.php';
?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $post->getIdPost(); ?>">
        <input type="hidden" name="userId" value="<?php echo $author->getIdUser(); ?>">
        <p>Etes-vous sûr de vouloir supprimer le post "<?php echo $post->getTitle(); ?>"?</p>
        <input type="submit" name="submit" value="Delete">
        <a href="./">Cancel</a>
    </form>
  
   
    
<?php
require_once 'partials/footer.php';
?>
