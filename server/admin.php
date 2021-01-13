<?php
session_start();
include_once '../client/config/init.php';
$_SESSION['tabela']= isset($_GET['admin']) ? $_GET['admin'] : null;

if(isset($_SESSION['tabela'])){
    if($_SESSION['tabela'] === 'restaurants'){
        $manager= new Restaurants();
        $_SESSION['res']=$manager->getRestaurant();
    }elseif ($_SESSION['tabela']==='products'){
        $products=new Product();
        $_SESSION['res']=$products->getAllProduct();
    }elseif($_SESSION['tabela']==='couriers') {
            $couriers = new Couriers();
            $_SESSION['res'] = $couriers->getAllCouriers();
    }

}

if(isset($_POST['rname'])){
    $manager= new Restaurants();
    $rname=filter_var($_POST['rname'], FILTER_SANITIZE_STRING);
    $rimg=filter_var($_POST['rimg'], FILTER_SANITIZE_STRING);
    $dprice=filter_var($_POST['rdprice'], FILTER_SANITIZE_STRING);
    $manager->addRestaurant($rname,$dprice,$rimg);
}
if(isset($_POST['pname'])){
    $manager=new Product();
    $pname=filter_var($_POST['pname'], FILTER_SANITIZE_STRING);
    $pimg=filter_var($_POST['pimg'], FILTER_SANITIZE_STRING);
    $price=filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $categ=filter_var($_POST['categ'], FILTER_SANITIZE_STRING);
    $restname=filter_var($_POST['restaurantname'], FILTER_SANITIZE_STRING);
    $managerrest=new Restaurants();
    $rid=$managerrest->getIdByRest($restname)->RestaurantsID;
    $manager->addProduct($pname,$price,$pimg,$categ,$rid);
}
if(isset($_POST['cname'])){
    $manager=new Couriers();
    $cname=filter_var($_POST['cname'], FILTER_SANITIZE_STRING);
    $phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $status=filter_var($_POST['status'], FILTER_SANITIZE_STRING);
    $manager->addCourier($cname,$phone,$status);
}
header("Location: ../client/admin_dash.php");


