<?php
function alertPHP(string $msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function alertPHPBack(string $msg){
    echo '<script type="text/javascript">alert("' . $msg .'");window.location.href="index.php";
    </script>';
}

function isAdmin(){
    if (isset($_COOKIE['isAdmin']) && $_COOKIE['isAdmin']==IS_ADMIN) {
        return true;
    }
    return false;
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

function alertChangedPass($alert_msg){
    if (isset($alert_msg)) {
        if ($alert_msg == USER_NOT_FOUND) {
            $msg = "User with this username doesn't exist";
        } elseif ($alert_msg == PASSWORD_WRONG) {
            $msg = "Wrong password";
        }
        elseif ($alert_msg == PASSWORD_NOT_MATCH){
            $msg = "passwords doesn't match.";
        }
        else $msg ="Password was successfully changed";
        alertPHP($msg);
    }
}

