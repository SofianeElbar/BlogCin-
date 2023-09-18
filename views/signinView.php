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

    <form action="../signin.php" method="POST" class="col-md-6 offset-md-3 mt-5">
        <div class="mb-3">
            <label for="InputPseudo" class="form-label">Pseudo de l'utilisateur</label>
            <input type="text" class="form-control" id="InputPseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email de l'utilisateur</label>
            <input type="text" class="form-control" id="InputEmail" name="email">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Mot de passe de l'utilisateur</label>
            <input type="password" class="form-control" id="InputPassword" name="pass">
        </div>

        <?php
        $dbh = null;
        ?>
        
        <button type="submit" class="btn btn-primary">Crée un compte</button>
    </form>
    
</body>
</html>

<?php
require_once 'partials/footer.php';
?>