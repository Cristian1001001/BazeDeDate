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
}
