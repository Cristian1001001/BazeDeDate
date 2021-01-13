<?php
require "components/Header.php";
include_once 'config/init.php';
//$_SESSION['cart']=array();
//print_r($_SESSION['cart']);
if(isset($_SESSION['cart'])):
?>
<div class="container" style="margin-top: 100px" >
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col" >Total</th>
            <th scope="col">Quantity</th>


        </tr>
        </thead>
        <tbody>
        <?php
//        print_r($_SESSION['cart']);
     foreach ($_SESSION['cart'] as $r):
            ?>
            <tr>
                <td>
                    <img src='<?php echo $r->ImagePath;
                    ?>' style="width: 100px">
                </td>
                <td>
                    <?php echo $r->ProductName; ?>
                </td>
                <td><?php echo $r->Price?></td>
                <td><?php
                    echo
                    $r->total;

                    ?></td>
                <td>
                    <form method='post' name='item' action='../server/shopping_cart.php'>
                        <div class="row">
                        <button type="submit" name="dec[]" ><i class="far fa-minus-square"></i></button>

                        <p><?php echo $r->cant; ?></p>
                            <input type="hidden" name="name_id" value="<?php echo $r->ProductID ?>">
                            <input type="hidden" name="price" value="<?php echo $r->Price?>">
                            <button type="submit" name='inc[]'  ><i class="far fa-plus-square"></i></button>
                            <button type="submit" name="deleteProduct" class="btn btn-success"
                                    style="margin: auto;
                           text-align: center;
                           position: relative;
                           background-color: darkred;
                       "
                            >Delete</button>
                        </div>
                    </form>
                </td>

            </tr>
<?php
endforeach;
?>
        </tbody>
    </table>
    <?php
    $totalf=0;
    foreach($_SESSION['cart'] as $r){
        $totalf+=$r->total;
    }
    ?>
    <div class="container" style="position: relative;width:100%;">
        <div class="row" style="overflow:auto;">
            <div class="totalf">
                <p>Total</p>
                <p><?php echo $totalf?></p>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div
    style="background-image: url('../assets/empty-cart.svg');
    height: 80%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;"
>
</div>
<?php endif; ?>
