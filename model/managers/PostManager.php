<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';


class PostManager{

    public static function getAllPosts(){
        $dbh = dbconnect();
        $query = ("SELECT * FROM post");
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostById($id) {
        //retourne un seul article par rapport à son id
        
        $dbh = dbconnect();
        $query = ("SELECT * FROM post WHERE idPost = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $post = $stmt->Fetch();
        return $post;
    }

    public static function getPostsByCategoryId($id) {
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN post_category ON post_category.idPost_fk = post.idPost WHERE post_category.idCategory_fk = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostsByUserId($id){
        $dbh = dbconnect();
        //Je selectionne dans la table post jointe à la table user toutes les lignes où la clé étrangère idUser_fk correspond à la clé (id) que j'ai fournie
        $query = "SELECT * FROM post JOIN user ON user.idUser = post.idUser_fk WHERE post.idUser_fk = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $postsByUser = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $postsByUser; 
    }

    // public static function deletePost($id, $userId){
    // $dbh = dbconnect();
    // //Je selectionne dans la table post jointe à la table user toutes les lignes où la clé étrangère idUser_fk correspond à la clé (id) que j'ai fournie
    // $query = "DELETE post, post_category FROM post LEFT JOIN post_category ON post.idPost = post_category.idPost_fk 
    // WHERE post.idPost = :id AND post.idUser_fk = :userId";
    // $stmt = $dbh->prepare($query);
    // $stmt->bindParam(':id', $id);
    // $stmt->bindParam(':userId', $userId);
    // $stmt->execute();
    // }
        
    public static function deletePostCategoriesByPostId($id){
        $dbh  = dbconnect();
        $query = "DELETE FROM post_category WHERE post_category.idPost_fk = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
        
    public static function deletePost($id) {
        $dbh  = dbconnect();
        $query = "DELETE FROM post WHERE post.idPost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public static function create($title, $picture, $content, $userId) {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        var_dump($date);
        $query = "INSERT INTO post (title, date, picture, content, idUser_fk) VALUES (:title, '$date', :picture, :content, :idUser)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':idUser', $userId);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function addPostCategories($idPost, $idCategory){
        $dbh  = dbconnect();
        $query = "INSERT INTO post_category (idPost_fk, idCategory_fk) VALUES (:post, :cat)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':post', $idPost);
        $stmt->bindParam(':cat', $idCategory);
        $stmt->execute();
    }

    public static function update($id, $title, $picture, $content, $userId) {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "UPDATE post SET title = :title, date = :date, picture = :picture, content = :content,  idUser_fk = :idUser WHERE idPost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':idUser', $userId);
        $stmt->execute();
    }



}