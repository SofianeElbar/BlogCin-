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
        </div>
    </nav>

    <form action="" method="POST" enctype="multipart/form-data" class="col-md-6 offset-md-3 mt-5">
        <div class="mb-3">
            <label for="InputTitle" class="form-label">Titre du film</label>
            <input type="text" class="form-control" id="InputTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="InputDate" class="form-label">Date de publication</label>
            <input type="date" class="form-control" id="InputDtae" name="date">
        </div>
        <div class="mb-3">
            <label for="InputCritique" class="form-label">Critique</label>
            <textarea rows=8  class="form-control" id="InputCritique" name="critique"></textarea>
        </div>
        <div class="mb-3">
            <label for="InputPicture" class="form-label">Image</label>
            <input type="file" class="form-control" id="InputPicture" name="picture">
        </div>
        <?php foreach($categories as $category){ ?>
            <div class="form-check">    
            <input class="form-check-input" type="checkbox" value="<?php echo $category->getIdCategory() ?>" name="categories[]" id="<?php echo $category->getCategoryName() ?>">
            <label class="form-check-label" for="<?php echo $category->getCategoryName() ?>">
                <?php echo $category->getCategoryName(); ?>
            </label>
            </div>
        <?php } ?>
        

        <?php
        $dbh = null;
        ?>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    
</body>
</html>

<?php
require_once 'partials/footer.php';
?>