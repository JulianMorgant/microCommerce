<?php
require_once MODEL_PATH."login-test.php";
require_once MODEL_PATH."productsDAO.php";
require_once MODEL_PATH."basketDAO.php";
require_once MODEL_PATH."Product.php";

$listeProduits = null;
$params = [];


if (filter_has_var(INPUT_POST,"search")){
    require_once MODEL_PATH."productsDAO.php";
    $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = getAllProductsLike($stringToSearch);
    $params['list'] = $listeProduits;
};

$bag = new basketDAO('bag');
if (isset($_SESSION['basket_bag'])) {
    $bag -> load();
    $params['basket'] = $bag->selectAll();
}else{
    $params['basket'] = [];

}

if (filter_has_var(INPUT_POST,"add")){
    require_once MODEL_PATH."productsDAO.php";
    $productId = filter_input(INPUT_POST,"add",FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY);

    $productToAdd = getOneProductById(current($productId));
    $productToAdd -> setQte(1);
    $bag->add($productToAdd);
    $bag ->save();
    $params['basket'] = $bag->selectAll();


};





$errors = "";

echo $viewContent = getRenderedView("basket",$params);

