<?php session_start() ;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">QDelivery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        if(isset($_SESSION['logged'])) :

            ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <h6>HI, <?php echo $_SESSION['username']?><h6>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <button type="submit" name="log-out" class="btn btn-success">LogOut</button>
                        <?php if(isset($_POST["log-out"]))
                        {
                            session_destroy();
                            header("Refresh:0; url=index.php");
                        } ?>
                    </form>
                </li>
            </ul>
        <?php else:
            ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="signIN.php">SignIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signUP.php">SignUP</a>
                </li>
            </ul>
        <?php endif; ?>
        <div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="shop-cart.php"><i class="fa fa-shopping-cart" style="font-size:20px;color:whitesmoke"></i></a>
                </li>
            </ul>
        </div>
            <?php
                if(isset($_SESSION['role'])){
            ?>
            <div>
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="admin_dash.php">Admin Dash</a>
                </li>
                </ul>
            </div>
        <?php }else{ ?>
                    <div>
                    </div>
        <?php } ?>
        <form class="form-inline my-2 my-lg-0" action="shop-grid.php" method="POST">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
        </form>
    </div>
</nav>


