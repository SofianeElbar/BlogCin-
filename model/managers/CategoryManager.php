<?php 

require_once './model/DBConnect.php';
require_once './model/classes/Category.php';

class CategoryManager {

    public static function getAllCategories(){
        $dbh = dbconnect();
        $query = "SELECT * FROM category";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;
    }

    public static function getCategoryInfos($id){
        $dbh = dbconnect();
        $query= "SELECT * FROM category WHERE idCategory = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $category = $stmt->fetch();
        return $category;
    } 

    public static function getCategoriesByPostId($id){
        $dbh = dbconnect();
        $query = "SELECT category.idCategory, categoryName FROM category JOIN post_category ON category.idCategory = post_category.idCategory_fk JOIN post ON post_category.idPost_fk= post.idPost WHERE post.idPost = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories; 
    }

}