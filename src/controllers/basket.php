<?php
require_once MODEL_PATH."login-test.php";
require_once MODEL_PATH."Product.php";


$listeProduits = null;


if (filter_has_var(INPUT_POST,"search")){
    require_once MODEL_PATH."productsDAO.php";
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = getAllProductsLike($stringToSearch);
};

if (filter_has_var(INPUT_POST,"add")){
    require_once MODEL_PATH."productsDAO.php";
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = getAllProductsLike($stringToSearch);
};

$errors = "";

echo $viewContent = getRenderedView("basket",['list' =>$listeProduits]);

