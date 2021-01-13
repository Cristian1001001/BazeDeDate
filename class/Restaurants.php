<?php

class Restaurants
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function getRestaurant()
    {
        $this->db->query('select * from restaurants');
        return $this->db->resultSet();
    }
    public function addRestaurant($restname,$delivprice,$imgpath){
        $this->db->query('INSERT INTO restaurants (RestaurantsName,DeliveryPrice,RestaurantImage) value (:restname,:delivprice,:imgpath)');
        $this->db->bind('restname',$restname);
        $this->db->bind('delivprice',$delivprice);
        $this->db->bind('imgpath',$imgpath);
        $this->db->execute();
    }
    public function getRestById($id){
        $this->db->query('SELECT * from restaurants where RestaurantsID = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function deleteRestaurant($rid){
        $this->db->query('DELETE FROM restaurants where RestaurantsID = :rid');
        $this->db->bind('rid', $rid);
        $this->db->execute();
    }
    public function changeRestaurantData($rid,$restname,$delivprice,$imgpath){
        $this->db->query('UPDATE restaurants set RestaurantsName=:restname,DeliveryPrice=:devprice,RestaurantImage=:imgpath where RestaurantsID=:rid');
        $this->db->bind('rid', $rid);
        $this->db->bind('restname', $restname);
        $this->db->bind('devprice', $delivprice);
        $this->db->bind('imgpath',$imgpath);
        $this->db->execute();
    }
    public function getIdByRest($restname){
        $this->db->query('SELECT * from restaurants where RestaurantsName = :restname');
        $this->db->bind('restname', $restname);
        return $this->db->single();
}

}
