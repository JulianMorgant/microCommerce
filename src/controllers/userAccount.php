<?php
require_once ROOT_PATH."/src/models/login-test.php";
require_once MODEL_PATH."ClientDAO.php";

$myClient = new ClientDAO();

if ((!isset($_SESSION['client'])) || count($_SESSION['client'])< 1) {
    $_SESSION['client'] = ($myClient->selectOne($_SESSION['user']['pseudo']))[0];
}

echo $viewContent = getRenderedView("userAccount",[]);

