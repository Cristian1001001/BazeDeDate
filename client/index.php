<?php
require "components/Header.php";
include_once 'config/init.php';
?>
<div class="bkgImage"></div>
    <div class="restaurants container-fluid">
    <div class="row no-gutters">
<?php
$manager = new Restaurants();
$rs = $manager->getRestaurant();
foreach($rs as $r):
?>
        <div class="card-group">
    <div class="RestCard">
        <div class="card" style="width: 16rem;">
            <a href=<?php echo "shop-grid.php?cat=".$r->RestaurantsID?>>
            <img class="card-img-top" src='<?php echo $r->RestaurantImage ?>' alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <?php
                    echo $r->RestaurantsName
                    ?>
                </h5>
            </div>
        </div>
    </div>
</a>
<?php endforeach; ?>
    </div>
    </div>
    </div>
<?php
require "components/Footer.php";
?>
