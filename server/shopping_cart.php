<?php
session_start();
include_once '../client/config/init.php';
$id= isset($_POST['shop']) ?$_POST['shop'] : null;
$qt= isset($_POST['item']) ?$_POST['item'] : 1;
//$ditem=isset($_POST['ditem'])?$_POST['ditem'] : null;
//$_SESSION['cart']=array();
if(empty($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

//array_push($_SESSION['cart'], $_GET['pid'] );
$manager = new Product();
//$managerrest=new Restaurants();

//$_SESSION['cart']=$manager->getProduct($id);
if(isset($id)) {
  $res=$manager->getProduct($id);
   $key=array_search($res->ProductID, array_column($_SESSION['cart'], 'ProductID'));
    if($key===false) {
        $res->{'cant'} = 1;
        $res->{'total'}=$res->Price;
        array_push($_SESSION['cart'], $res);
    }else{
        $_SESSION['cart'][$key]->cant=$_SESSION['cart'][$key]->cant+1;
        $_SESSION['cart'][$key]->total=$_SESSION['cart'][$key]->cant*$res->Price;
        echo 'total';
        print_r($_SESSION['cart'][$key]->total);
        echo 'pret';
//        print_r($res->Price);
    }
}

if (isset($_POST['inc'])) {
//        $_SESSION['cart'][$key]= $_SESSION['cart'][$key]->cant + 1;
    $key=array_search($_POST['name_id'], array_column($_SESSION['cart'], 'ProductID'));
    $_SESSION['cart'][$key]->cant= $_SESSION['cart'][$key]->cant + 1;
    $_SESSION['cart'][$key]->total=$_SESSION['cart'][$key]->cant*$_SESSION['cart'][$key]->Price;
}
//print_r($key);
if (isset($_POST['dec'])) {
    $key=array_search($_POST['name_id'], array_column($_SESSION['cart'], 'ProductID'));
    $_SESSION['cart'][$key]->cant = $_SESSION['cart'][$key]->cant - 1;
    $_SESSION['cart'][$key]->total=$_SESSION['cart'][$key]->cant*$_POST['price'];
  if($_SESSION['cart'][$key]->cant<1){
      $_SESSION['cart'][$key]->cant=1;
  }
}
if(isset($_POST['deleteProduct'])){
    print_r($_POST['name_id']);
    $key=array_search($_POST['name_id'], array_column($_SESSION['cart'], 'ProductID'));
    print_r($key);
    echo 'before delete';
    print_r($_SESSION['cart']);
    unset($_SESSION['cart'][$key]);
    echo 'after delete';
    print_r($_SESSION['cart']);
    echo 'before index reset';
    print_r($_SESSION['cart']);
    $_SESSION['cart']=array_values($_SESSION['cart']);
    echo 'after index reset';
    print_r($_SESSION['cart']);
//  print_r($_SESSION['cart'][$key]);

}


header('Location: ../client/shop-cart.php');


