<?php
if(!isset($_SESSION["user"])) {
    goToLoginPage();
}else{
    include_once MODEL_PATH."User.php";
    if ( (unserialize($_SESSION["user"]))->getAccount() != 'admin') {
        goToLoginPage();
    }
}

function goToLoginPage(){

    header("location:index.php?page=login");
    $_SESSION["origin"] = $_SERVER["REQUEST_URI"];

}
