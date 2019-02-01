<?php
require_once MODEL_PATH . "login_test.php";
require_once MODEL_PATH . "ProductDAO.php";
require_once MODEL_PATH . "BasketDAO.php";
require_once MODEL_PATH . "Product.php";
require_once MODEL_PATH . "CatDAO.php";

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
    //$_SESSION['searchTxt'] = $stringToSearch;
    header("location:index.php?page=basket&search=$stringToSearch");

 /*   $stringToSearch = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    $listeProduits = $productDAO->selectLike($stringToSearch);
    $_SESSION['listProducts'] = serialize($listeProduits);
    $_SESSION['searchTxt'] = $stringToSearch;
*/

};

if (filter_has_var(INPUT_POST,"remove")){
    $productId = filter_input(INPUT_POST,"remove",FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY);

    $productToRemove = $productDAO->selectOne(array_keys($productId)[0]);
    $bag->delete($productToRemove);
    $bag ->save();
    $params['basket'] = $bag->selectAll();


};

$errors = "";

echo $viewContent = getRenderedView("validBasket",$params);

