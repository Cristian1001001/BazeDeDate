<?php
require "components/Header.php";
include_once '../client/config/init.php';
$managerrest=new Restaurants();
if(isset($_SESSION['role'])):
?>
<div>
    <ul class="list-group" style="text-decoration-color: black">
        <li class="list-group-item"><a href=<?php echo "../server/admin.php?admin=restaurants" ?>
            class="list-group-item list-group-item-action">Restaurants</a></li>
        <li class="list-group-item"><a href=<?php echo "../server/admin.php?admin=products" ?>
            class="list-group-item list-group-item-action">Products</a></li>
        <li class="list-group-item"><a href=<?php echo "../server/admin.php?admin=couriers" ?>
            class="list-group-item list-group-item-action">Couriers</a></li>
    </ul>
</div>
<?php
if(isset($_SESSION['tabela'])):
if($_SESSION['tabela']==='restaurants'):  ?>
<div class="container" style="margin-top: 20px; padding-bottom: 30px" >
<table class="table table-dark">
<thead>
<tr>
    <th scope="col">ID</th>
    <th scope="col">Image</th>
    <th scope="col">Restaurant Name</th>
    <th scope="col">Delivery Price</th>
</tr>
</thead>
<tbody>
<?php
foreach ($_SESSION['res'] as $r):
?>
<tr>
    <th scope="row"><?php echo $r->RestaurantsID ?></th>
    <td><img src='<?php echo $r->RestaurantImage ?>' style="width: 100px"></td>
    <td>
        <?php echo $r->RestaurantsName ?>
    </td>
    <td>
        <?php echo $r->DeliveryPrice ?>
    </td>
<!--    change/delete buttons-->
    <td><button onclick="openForm2(<?php echo $r->RestaurantsID ?>)" class="btn btn-success"
                style="margin: auto;
                           text-align: center;
                           position: relative;"
        >Change</button></td>
    <form action="../server/delete-updatefromdb.php" name="rest" method="post">
    <td>
        <input type="hidden" name="rest_id" value="<?php echo $r->RestaurantsID ?>" >
        <button type="submit" name="delete[]" class="btn btn-success"
                style="margin: auto;
                           text-align: center;
                           position: relative;
                           background-color: darkred;
                       "
        >Delete</button>
    </td>
    </form>
<!--    final change/delete buttons-->
<!-- schimbarea inceput-->
    <script>
        function openForm2(id) {
            document.getElementById(id).style.display = "block";
        }
        function closeForm2(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
    <td>
    <div class="form" id="<?php echo $r->RestaurantsID ?>" style="display: none">
        <form action="../server/delete-updatefromdb.php" method="post" class="form-container">
            <input type="hidden" name="rest_id" value="<?php echo $r->RestaurantsID ?>">
            <label for="name"><p style="color: black">New Name</p></label>
            <input type="text" placeholder="Restaurant name" name="restname" >

            <label for="ImagePath"><p style="color: black">New Image Path</p></label>
            <input type="text" placeholder="Enter Image Path" name="restimg" >

            <label for="DelivPrice"><p style="color: black">New Delivery Price</p></label>
            <input type="text" placeholder="Enter Delivery Price" name="restdprice" >

            <button type="submit" class="btn">Add</button>
            <button type="submit" class="btn cancel" onclick="closeForm2(<?php echo $r->RestaurantsID ?>)">Close</button>
        </form>
        </td>
    </div>

<!--schimbare sfarsit-->
</tr>
<?php endforeach; ?>
</tbody>
</table>
    <div class="container">
        <div class="row">
            <button type="submit" name="add" class="btn btn-success"
                    style="margin: auto;
                           text-align: center;
                           position: relative;"
                    onclick="openForm()"
            >Add Restaurant</button>
        </div>
    </div>
    <div class="container">
        <div class="row">
    <div class="form-popup" id="myForm">
        <form action="../server/admin.php" method="post" class="form-container">

            <label for="name"><b>Restaurant Name</b></label>
            <input type="text" placeholder="Restaurant name" name="rname" required>

            <label for="ImagePath"><b>Image Path</b></label>
            <input type="text" placeholder="Enter Image Path" name="rimg" required>

            <label for="DelivPrice"><b>Delivery Price</b></label>
            <input type="text" placeholder="Enter Delivery Price" name="rdprice" required>

            <button type="submit" class="btn">Add</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
        </div>
    </div>
</div>
<?php
elseif($_SESSION['tabela']==='products'):?>
    <div class="container" style="margin-top: 20px; padding-bottom: 30px" >
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">P Name</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
<?php
foreach ($_SESSION['res'] as $r):
?>
<tr>
    <th scope="row"><?php echo $r->ProductID ?></th>
    <td><img src='<?php echo $r->ImagePath ?>' style="width: 100px"></td>
    <td>
        <?php echo $r->ProductName ?>
    </td>
    <td>
        <?php echo $r->Price ?>
    </td>
    <td>
        <?php echo $r->Category ?>
    </td>
    <td>
        <?php echo $managerrest->getRestById($r->RestaurantsID)->RestaurantsName;
        ?>
    </td>
    <!--    change/delete buttons produs-->
    <td><button onclick="openForm2(<?php echo $r->ProductID ?>)" class="btn btn-success"
                style="margin: auto;
                           text-align: center;
                           position: relative;"
        >Change</button></td>
    <form action="../server/delete-updatefromdb.php" name="product" method="post">
        <td>
            <input type="hidden" name="product_id" value="<?php echo $r->ProductID ?>" >
            <button type="submit" name="deleteProduct" class="btn btn-success"
                    style="margin: auto;
                           text-align: center;
                           position: relative;
                           background-color: darkred;
                       "
            >Delete</button>
        </td>
    </form>
    <!--    final change/delete buttons produs-->
    <!-- schimbarea inceput produs-->
    <script>
        function openForm2(id) {
            document.getElementById(id).style.display = "block";
        }
        function closeForm2(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
    <td>
        <div class="form" id="<?php echo $r->ProductID ?>" style="display: none">
            <form action="../server/delete-updatefromdb.php" method="post" class="form-container">
                <input type="hidden" name="product_id" value="<?php echo $r->ProductID ?>">
                <label for="name"><p style="color: black">New Name</p></label>
                <input type="text" placeholder="Product name" name="prname" >

                <label for="ImagePath"><p style="color: black">New Image Path</p></label>
                <input type="text" placeholder="Enter Image Path" name="pimg" >

                <label for="DelivPrice"><p style="color: black">New Price</p></label>
                <input type="text" placeholder="Enter Price" name="pprice" >

                <label for="DelivPrice"><p style="color: black">New Category</p></label>
                <input type="text" placeholder="Enter category" name="category" >

                <label for="DelivPrice"><p style="color: black">New restaurant</p></label>
                <input type="text" placeholder="Enter restaurant" name="restname">

                <button type="submit" class="btn">Add</button>
                <button type="submit" class="btn cancel" onclick="closeForm2(<?php echo $r->ProductID ?>)">Close</button>
            </form>
    </td>
    </div>

    <!--schimbare sfarsit-->
<?php endforeach; ?>
    </tbody>
    </table>
    <div class="container">
        <div class="row">
            <button type="submit" name="add" class="btn btn-success"
                    style="margin: auto;
                           text-align: center;
                           position: relative;"
                    onclick="openForm()"
            >Add Product</button>
        </div>
    </div>
    <div class="container">
        <div class="row">
    <div class="form-popup" id="myForm" style="display: none">
        <form action="../server/admin.php" method="post" class="form-container">

            <label for="name"><b>Product Name</b></label>
            <input type="text" placeholder="Product name" name="pname" required>

            <label for="ImagePath"><b>Image Path</b></label>
            <input type="text" placeholder="Enter Image Path" name="pimg" required>

            <label for="DelivPrice"><b>Price</b></label>
            <input type="text" placeholder="Enter Price" name="price" required>

            <label for="Category"><b>Category</b></label>
            <input type="text" placeholder="Enter Category" name="categ" required>

            <label for="RID"><b>Restaurant ID</b></label>
            <input type="text" placeholder="Enter Restaurant ID" name="restaurantname" required>

            <button type="submit" class="btn">Add</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
        </div>
    </div>
<?php
elseif($_SESSION['tabela']==='couriers'):
    ?>
    <div class="container" style="margin-top: 20px; padding-bottom: 30px" >
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Courier Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_SESSION['res'] as $r):
                ?>
                <tr>
                    <th scope="row"><?php echo $r->CourierID ?></th>
                    <td><?php echo $r->CourierName ?></td>
                    <td>
                        <?php echo $r->Phone ?>
                    </td>
                    <td>
                        <?php echo $r->CourierStatus ?>
                    </td>
                    <!--    change/delete buttons produs-->
                    <td><button onclick="openForm2(<?php echo $r->CourierID ?>)" class="btn btn-success"
                                style="margin: auto;
                           text-align: center;
                           position: relative;"
                        >Change</button></td>
                    <form action="../server/delete-updatefromdb.php" name="courier" method="post">
                        <td>
                            <input type="hidden" name="courier_id" value="<?php echo $r->CourierID ?>" >
                            <button type="submit" name="deleteCourier" class="btn btn-success"
                                    style="margin: auto;
                           text-align: center;
                           position: relative;
                           background-color: darkred;
                       "
                            >Delete</button>
                        </td>
                    </form>
                    <!--    final change/delete buttons curier-->
                    <!-- schimbarea inceput curier-->
                    <script>
                        function openForm2(id) {
                            document.getElementById(id).style.display = "block";
                        }
                        function closeForm2(id) {
                            document.getElementById(id).style.display = "none";
                        }
                    </script>
                    <td>
                        <div class="form" id="<?php echo $r->CourierID ?>" style="display: none">
                            <form action="../server/delete-updatefromdb.php" method="post" class="form-container">
                                <input type="hidden" name="courier_id" value="<?php echo $r->CourierID ?>">
                                <label for="name"><p style="color: black">New Name</p></label>
                                <input type="text" placeholder="Courier name" name="couriername" >

                                <label for="ImagePath"><p style="color: black">New Phone</p></label>
                                <input type="text" placeholder="Enter phone" name="cphone" >

                                <label for="DelivPrice"><p style="color: black">New Status</p></label>
                                <input type="text" placeholder="Enter status" name="cstatus" >

                                <button type="submit" class="btn">Add</button>
                                <button type="submit" class="btn cancel" onclick="closeForm2(<?php echo $r->CourierID ?>)">Close</button>
                            </form>
                    </td>
                </div>
                <!--schimbare sfarsit-->
            <?php endforeach; ?>
    </tbody>
    </table>
<!--adaugare curier-->
        <div class="container">
            <div class="row">
                <button type="submit" name="add" class="btn btn-success"
                        style="margin: auto;
                           text-align: center;
                           position: relative;"
                        onclick="openForm()"
                >Add Product</button>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="form-popup" id="myForm">
                    <form action="../server/admin.php" method="post" class="form-container">

                        <label for="name"><b>Courier Name</b></label>
                        <input type="text" placeholder="Courier name" name="cname" required>

                        <label for="DelivPrice"><b>Phone</b></label>
                        <input type="text" placeholder="Enter phone" name="phone" required>

                        <label for="Category"><b>Satus</b></label>
                        <input type="text" placeholder="Enter Status" name="status" required>

                        <button type="submit" class="btn">Add</button>
                        <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
            </div>
        </div>
<!--sfarsit adaugare curier-->
<?php endif; else:  ?>
<div class="container">
    <p>Alegeti tabela</p>
</div>
<?php endif; else: ?>
<div>Admin right are not available</div>
<?php
endif;
require "components/Footer.php";
?>
