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

<div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-4">

<div class="prod-card h-100">
    <div class="img-thumbnail">
  <img src='<?php echo $r->ImagePath ?>' alt="Denim Jeans" >
    </div>
    <div class="nume">
        <h4><?php echo $r->ProductName ?></h4>
    </div>
  <h6 class="price"><?php $r->Price ?></h6>
    <form name="shopcart" action="../server/shopping_cart.php" method="post">
  <p><button type="submit" name="shop" value="<?php echo $r->ProductID ?>">Add to Cart</button></p>
    </form>
</div>

</div>

<?php endforeach; ?>
 </div>
</div>
<?php

include 'components/Footer.php';
?>

