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


if (isset($_SESSION['validCommand'])) {
    echo "<h1> valid </h1>";
    unset($_SESSION['validCommand']); //TODO petite secu à améliorer}
} else {
    $_SESSION["errors"] = "Page de commande inaccessible depuis cet endroit";
    header("location:index.php?page=notFound");
}


if (!isset($_SESSION['client'])) {
    $clientDAO = new ClientDAO();
    $temp = unserialize($_SESSION['user']);
    $_SESSION['client'] = serialize($clientDAO->selectOne($temp->getPseudo()));
}

if (isset($_SESSION['basket_bag'])) {
    $bag -> load();
    $params['basket'] = $bag->selectAll();
}else{
    $params['basket'] = [];
}



$errors = "";

echo $viewContent = getRenderedView("validCommand",$params);

