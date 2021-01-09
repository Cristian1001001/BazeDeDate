<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f2ea4398fc.js" crossorigin="anonymous"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <title>New User</title>
</head>

<body>
<?php
include_once 'config/init.php';
$alert_msg = isset($_GET['new_user_message']) ? $_GET['new_user_message'] : null;
$user = isset($_GET['username']) ? $_GET['username'] : null;
if(isset($alert_msg)){
    if($alert_msg==USER_NOT_FOUND){
        $msg = "User with this username already exists";
        alertPHP($msg);
    }
    elseif($alert_msg==PASSWORD_NOT_MATCH){
        $msg = "Password doesn't match!";
        alertPHP($msg);
    }
    elseif($alert_msg==NEW_USER_OK){
        $msg = "User create with success";
        alertPHPBack($msg);
    }
}
?>
<div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
        <div class="modal-content">

            <div class="col-12 user-img">
                <img src="../assets/icon.svg">
            </div>
            <div class="col-12 form-input">
                <form action="../server/lala.php" method="post">
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter E-mail" required>
                    </div>
                    <div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_repeat" class="form-control" placeholder="Repeat Password" required>
                    </div>
                    <button type="submit" name="btn_submit" class="btn btn-success">Create</button>
                </form>
            </div>

        </div> <!-- End of the Modal Content-->
    </div>
</div>
</body>
</html>
