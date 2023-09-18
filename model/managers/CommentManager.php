<?php 

require_once 'model/DBConnect.php';
require_once 'model/classes/Comment.php';

class CommentManager{
    
    public static function getCommentsByPostId($id) {
        $dbh = dbconnect();
        $query = "SELECT * FROM comment WHERE comment.idPost_fk = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function addComment($idPost_fk, $idUser_fk, $content) {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');//ajouter la date car nécessaire à l'enregistrement du commentaire
        $query = "INSERT INTO comment (idPost_fk, idUser_fk, date, content) VALUES (:idPost_fk, :idUser_fk, '$date', :content)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idPost_fk', $idPost_fk);
        $stmt->bindParam(':idUser_fk', $idUser_fk);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    public static function deleteCommentsByPostId($id){
        $dbh  = dbconnect();
        $query = "DELETE FROM comment WHERE comment.idPost_fk = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
