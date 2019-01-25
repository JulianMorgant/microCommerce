<?php
//require ROOT_PATH."/src/models/login.php";
if(isset($_SESSION['user'])) {

    if ($_SESSION['origin'] == '/index.php?page=login') {
        $_SESSION['origin'] = '/index.php?page=home';
    }
    header("location:".$_SESSION['origin']??"home.php");
}
echo $viewContent = getRenderedView("login",[]);

