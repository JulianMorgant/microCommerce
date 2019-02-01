<?php
require_once MODEL_PATH . "login_test.php";

require_once MODEL_PATH . "ProductDAO.php";
require_once MODEL_PATH . "BasketDAO.php";
require_once MODEL_PATH . "Product.php";
require_once MODEL_PATH . "CatDAO.php";
require_once MODEL_PATH . "ClientDAO.php";
require_once MODEL_PATH . "Client.php";
require_once MODEL_PATH . "User.php";

$params = [];
$productDAO = new ProductDAO();


$bag = new BasketDAO('bag');
if (isset($_SESSION['basket_bag'])) {
    $bag -> load();
    $params['basket'] = $bag->selectAll();
}else{
    $params['basket'] = [];
}

if (!isset($_SESSION['catList'])) {
    $cat = new CatDAO();
    $_SESSION['catList'] = $cat->selectAll();
}

if (filter_has_var(INPUT_POST,"search")){
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    header("location:index.php?page=basket&search=$stringToSearch");
};

if (filter_has_var(INPUT_POST,"modifBasket")){
    header("location:index.php?page=basket&search=$stringToSearch");
};

if (filter_has_var(INPUT_POST,"modifAccount")){
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    header("location:index.php?page=userAccount");
};

if (!isset($_SESSION['client'])) {
    $clientDAO = new ClientDAO();
    $temp = unserialize($_SESSION['user']);
    $_SESSION['client'] = serialize($clientDAO->selectOne($temp->getPseudo()));
}



$errors = "";

echo $viewContent = getRenderedView("validBasket",$params);

