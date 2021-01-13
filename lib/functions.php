<?php
function alertPHP(string $msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function alertPHPBack(string $msg){
    echo '<script type="text/javascript">alert("' . $msg .'");window.location.href="index.php";
    </script>';
}
function alertLogin($alert_msg)
{
    if (isset($alert_msg)) {
        $msg = '';
        if ($alert_msg == USER_NOT_FOUND) {
            $msg = "User with this username doesn't exist";
        } elseif ($alert_msg == PASSWORD_WRONG) {
            $msg = "Wrong password";
        }
        alertPHP($msg);
    }

}

