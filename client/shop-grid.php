<?php
 include 'components/Header.php';
include_once 'config/init.php';
$id = isset($_GET['cat']) ? $_GET['cat'] : null;
$search = isset($_POST['search']) ? strtolower($_POST['search']) : null;
$manager = new Product();
isset($id) ? $rs = $manager->getProductByRestaurant($id) : $rs = $manager->getProductsByStr($search);
?>
<div class="container-fluid">
 <div class="row">
<?php
foreach ($rs as $r):?>
<div class="col-2">
<div class="prod-card">
  <img src='<?php echo $r->ImagePath ?>' alt="Denim Jeans" style="width:100%">
  <h1><?php echo $r->ProductName ?></h1>
  <p class="price"><?php $r->Price ?></p>
  <p><button>Add to Cart</button></p>
</div>
</div>
<?php endforeach; ?>
 </div>
</div>
<?php

include 'components/Footer.php';
?>

