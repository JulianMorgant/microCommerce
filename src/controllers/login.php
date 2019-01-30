<?php

if(isset($_SESSION['user'])) {

    if ($_SERVER['REQUEST_URI'] == '/index.php?page=login') {
        $_SESSION['origin'] = '/index.php?page=home';
    } else {
        $_SESSION['origin'] = $_SERVER['REQUEST_URI'];
    }
    header("location:".$_SESSION['origin']??"home.php");
}
echo $viewContent = getRenderedView("login",[]);

