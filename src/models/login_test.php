<?php
if(!isset($_SESSION["user"])) {
    header("location:index.php?page=login");
    $_SESSION["origin"] = $_SERVER["REQUEST_URI"];
}else{

}
