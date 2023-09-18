<?php

require_once 'model/DBConnect.php';

if(isset($_POST) && !empty($_POST)){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['pass'];

// Code Greg
// $user = UserManager::getUserByEmail($email);
// var_dump($user);
// //récupération des données de l'utilisateur via une valeur unique telle que le mail
// $user = UserManager::getUserByEmail($email);
// //vérification de la correspondance du mdp en bdd avec celui saisi par l'utilisateur
// $verified_password = password_verify($mdp, $user->getPassword());
// if($verified_user){ //
//     UserManager::connectUser($user);
// }   

    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user){
        // var_dump($user);
        $hashed = $user['mdp'];
        $isAUser = password_verify($mdp, $hashed);
        if ($isAUser){
            var_dump($user);
            session_start();
            $_SESSION['user'] = [
                'id'=>$user['idUser'],
                'pseudo'=>$user['pseudo']
            ];           
        }
        header('Location: ./');
    }else{
?>
    <h2><?php echo "Cet utilisateur n'existe pas";?></h2>
<?php    
    }
}



//*OR 1=1; se loguer en tant qu'admin