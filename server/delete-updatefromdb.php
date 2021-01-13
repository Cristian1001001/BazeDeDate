<?php
session_start();
include_once '../client/config/init.php';
$changerest=isset($_POST['rest'])? $_POST['rest'] : null;
$changeproduct=isset($_POST['product'])? $_POST['product'] : null;
$changecourier=isset($_POST['courier'])? $_POST['courier'] : null;

if(isset($_POST['delete'])){
    $restaurant= new Restaurants();
    $restaurant->deleteRestaurant($_POST['rest_id']);
}
if(isset($_POST['deleteProduct'])){
    $product= new Product();
    $product->deleteProduct($_POST['product_id']);
}
if(isset($_POST['deleteCourier'])){
    $product= new Couriers();
    $product->deleteCourier($_POST['courier_id']);
}
if(isset($_POST['rest_id'])){
    $restname=filter_var($_POST['restname'], FILTER_SANITIZE_STRING);
    $restimg=filter_var($_POST['restimg'], FILTER_SANITIZE_STRING);
    $restdprice=filter_var($_POST['restdprice'], FILTER_SANITIZE_STRING);
    $restaurant= new Restaurants();
    $restaurant->changeRestaurantData($_POST['rest_id'],$restname,$restdprice,$restimg);
}
if(isset($_POST['product_id'])){
    $prname=filter_var($_POST['prname'], FILTER_SANITIZE_STRING);
    $pimg=filter_var($_POST['pimg'], FILTER_SANITIZE_STRING);
    $pprice=filter_var($_POST['pprice'], FILTER_SANITIZE_STRING);
    $restname=filter_var($_POST['restname'], FILTER_SANITIZE_STRING);
    $category=filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $produs= new Product();
    $managerrest=new Restaurants();
    $rid=$managerrest->getIdByRest($restname)->RestaurantsID;

    $produs->updateProduct($_POST['product_id'],$prname,$pprice,$pimg,$category,$rid);

}
if(isset($_POST['courier_id'])){
    $couriername=filter_var($_POST['couriername'], FILTER_SANITIZE_STRING);
    $cphone=filter_var($_POST['cphone'], FILTER_SANITIZE_STRING);
    $cstatus=filter_var($_POST['cstatus'], FILTER_SANITIZE_STRING);
    $couriers= new Couriers();
    $couriers->changeCourierData($_POST['courier_id'],$couriername,$cphone,$cstatus);
}

header('Location: ../client/admin_dash.php');
