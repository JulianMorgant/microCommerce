<?php
require_once ROOT_PATH."/src/models/login-test.php";
var_dump($_POST);
$listeProduits = null;

if (filter_has_var(INPUT_POST,"search")){
    require_once MODEL_PATH."productsDAO.php";
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = getAllProductsLike($stringToSearch);
    var_dump($listeProduits);
};

$errors = "";

//$productList = getAllProducts();
echo $viewContent = getRenderedView("basket",['list' =>$listeProduits]);

