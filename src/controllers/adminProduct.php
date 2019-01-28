<?php
require_once MODEL_PATH."login-test.php";
require_once MODEL_PATH."productsDAO.php";
require_once MODEL_PATH."Product.php";
require_once MODEL_PATH."CatDAO.php";

$listeProduits = null;
$params = [];


if (filter_has_var(INPUT_POST,"search")){
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = getAllProductsLike($stringToSearch);
    $params['list'] = $listeProduits;
    $params['searchTxt'] = $stringToSearch;
    $_SESSION['searchTxt'] = $stringToSearch;
    $_SESSION['listProducts'] = $listeProduits;
};
if (filter_has_var(INPUT_POST,"edit")){
    $productId = filter_input(INPUT_POST,"edit",FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY);
    $productToEdit = getOneProductById(current($productId));
    $params['selectedProduct'] = $productToEdit;


};

$cat = new CatDAO();
$params['catList'] = $cat->selectAll();



$errors = "";

echo $viewContent = getRenderedView("adminProduct",$params);

