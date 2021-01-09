<?php

class Product
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

//    PRODUCTS
    public function getProduct($id){
        $this->db->query('select * from produs where idProdus=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getProductByRestaurant($rid){
        $this->db->query('select * from products where RestaurantsID=:rid');
        $this->db->bind('rid',$rid);
        return $this->db->resultSet();
    }

    public function getProductIds($ids) {
        $this->db->query("select * from produs where idProdus in ($ids)");
//        $this->db->bind('ids',$ids);
        return $this->db->resultSet();
    }
    public function addProduct($nume,$pret,$imagePath,$categorie,$restaurantsId){
        $this->db->query('INSERT INTO products(ProductName,Price, ImagePath, Category, RestaurantID) value(:nume,:pret,:imagePath,:categorie, :restaurantsId)');
        $this->db->bind('nume',$nume);
        $this->db->bind('pret',$pret);
        $this->db->bind('imagePath',$imagePath);
        $this->db->bind('categorie',$categorie);
        $this->db->bind('restaurant',$restaurantsId);
        $this->db->execute();
    }

    public function deleteProduct($id){
        $this->db->query('delete from produs where ProductID=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    }
    public function getProductbyCategory($category) {
        if($category) {
            $this->db->query('select * from produs where categorie =:categorie');
            $this->db->bind('categorie', $category);
            return $this->db->resultSet();
        }
        return null;
    }
    public function updateProduct($id,$nume,$numeRu,$price,$imagePath,$category) {
        $this->db->query('update produs set pret=:price,numeProdus=:nume,numeProdusRu=:numeRu,imagePath=:imagePath,categorie=:category where idProdus=:id');
        $this->db->bind('id',$id);
        $this->db->bind('nume',$nume);
        $this->db->bind('numeRu',$numeRu);
        $this->db->bind('imagePath',$imagePath);
        $this->db->bind('category',$category);
        $this->db->bind('price',$price);
        $this->db->execute();
    }


//    USERS

    public function addUser($login,$mdp,$role){
        $this->db->query('insert into users(login, password,role) value(:username, :password, :role)');
        $this->db->bind('username',$login);
        $this->db->bind('password',$mdp);
        $this->db->bind('role',$role);
        $this->db->execute();
    }
    public function updateUser($login,$mdp,$role,$uid){
        $this->db->query('update users set login=:login, password=:mdp, role=:role where idUtilizator =:uid ;');
        $this->db->bind('login',$login);
        $this->db->bind('mdp',$mdp);
        $this->db->bind('role',$role);
        $this->db->bind('uid',$uid);
        $this->db->execute();
    }
    public function getAllUsers(){
        $this->db->query('select * from users');
        return $this->db->resultSet();
    }
    public function getUser($uid){
        $this->db->query('select * from users where idUtilizator=:uid');
        $this->db->bind('uid',$uid);
        return $this->db->single();
    }
    public function deleteUser($uid){
        $this->db->query('delete from users where idUtilizator=:uid');
        $this->db->bind('uid',$uid);
        $this->db->execute();
    }

    public function getProductsByStr($substr)
    {
        $this->db->query('select * from products where ProductName like "%'.$substr.'%"');
        $this->db->bind('substring',$substr);
        return $this->db->resultSet();
    }
    public function getRandomProducts($nr)
    {
        $this->db->query('select * from produs ORDER BY RAND() LIMIT :N;');
        $this->db->bind('N', $nr);
        return $this->db->resultSet();
    }
}
