<?php

class Product
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

//    PRODUCTS
    public function getProduct($id){
        $this->db->query('select * from products where ProductID=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getProductByRestaurant($rid){
        $this->db->query('select * from products where RestaurantsID=:rid');
        $this->db->bind('rid',$rid);
        return $this->db->resultSet();
    }

    public function getAllProduct() {
        $this->db->query('select * from products');
        return $this->db->resultSet();
    }
    public function addProduct($nume,$pret,$imagePath,$categorie,$restaurantsId){
        $this->db->query('INSERT INTO products (ProductName,Price,ImagePath,Category,RestaurantsID) value (:nume,:pret,:imagePath,:categorie,:restaurantsId)');
        $this->db->bind('nume',$nume);
        $this->db->bind('pret',$pret);
        $this->db->bind('imagePath',$imagePath);
        $this->db->bind('categorie',$categorie);
        $this->db->bind('restaurantsId',$restaurantsId);
        $this->db->execute();
    }

    public function deleteProduct($id){
        $this->db->query('delete from products where ProductID=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    }
    public function updateProduct($id,$nume,$price,$imagePath,$category,$restaurantID) {
        $this->db->query('update products set Price=:price,ProductName=:nume,ImagePath=:imagePath,Category=:category,RestaurantsID=:restId where ProductID=:id');
        $this->db->bind('id',$id);
        $this->db->bind('nume',$nume);
        $this->db->bind('imagePath',$imagePath);
        $this->db->bind('category',$category);
        $this->db->bind('restId',$restaurantID);
        $this->db->bind('price',$price);
        $this->db->execute();
    }


    public function getProductsByStr($substr)
    {
        $this->db->query('select * from products where ProductName like "%'.$substr.'%"');
        $this->db->bind('substring',$substr);
        return $this->db->resultSet();
    }
}
