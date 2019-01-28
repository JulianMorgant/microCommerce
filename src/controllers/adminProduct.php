<?php
require_once MODEL_PATH."login-test.php";
require_once MODEL_PATH."productsDAO.php";
require_once MODEL_PATH."Product.php";
require_once MODEL_PATH."CatDAO.php";

$listeProduits = null;
$params = [];
$errors = "";

$_SESSION['errors'] = "";


if (filter_has_var(INPUT_POST,"search")){
    $_SESSION['searchTxt'] = filter_input(INPUT_POST,"searchTxt",FILTER_SANITIZE_STRING);
    updateListProducts();
};

if (filter_has_var(INPUT_POST,"edit")){
    $productId = filter_input(INPUT_POST,"edit",FILTER_SANITIZE_NUMBER_INT,FILTER_REQUIRE_ARRAY);
    $productToEdit = getOneProductById(array_keys($productId)[0]);
    $_SESSION['selectedProduct'] = serialize($productToEdit);

};

if (filter_has_var(INPUT_POST,"b_delete")){
    $productId = filter_input(INPUT_POST,"idEdit",FILTER_SANITIZE_NUMBER_INT);
    $productToEdit = deleteOneProduct($productId);
    $_SESSION['selectedProduct'] = serialize(new Product());
    $_SESSION['listProducts'] = serialize([new Product()]);
    updateListProducts();
};

if (filter_has_var(INPUT_POST,"b_new")){
    $_SESSION['selectedProduct'] = serialize(new Product());
};

if (filter_has_var(INPUT_POST,"b_create")){

    $newProduct = new Product();
    $newProduct
        ->setDesignation(filter_input(INPUT_POST,"designationEdit",FILTER_SANITIZE_STRING))
        ->setPrix(filter_input(INPUT_POST,"prixEdit",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION))
        ->setQte(filter_input(INPUT_POST,"stockEdit",FILTER_SANITIZE_NUMBER_INT))
        ->setCategorie(filter_input(INPUT_POST,"categorieEdit",FILTER_SANITIZE_NUMBER_INT));

    $errors = $newProduct->getErrors();
    if (!$errors) {
        insertOneProduct($newProduct);
        updateListProducts();
        $_SESSION['selectedProduct'] = serialize(new Product());
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['selectedProduct'] = serialize($newProduct);
    }
    $_SESSION['selectedProduct'] = serialize($newProduct);
};

if (filter_has_var(INPUT_POST,"b_update")){

    $newProduct = new Product();
    $newProduct
        ->setId(filter_input(INPUT_POST,"idEdit",FILTER_SANITIZE_NUMBER_INT))
        ->setDesignation(filter_input(INPUT_POST,"designationEdit",FILTER_SANITIZE_STRING))
        ->setPrix(filter_input(INPUT_POST,"prixEdit",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION))
        ->setQte(filter_input(INPUT_POST,"stockEdit",FILTER_SANITIZE_NUMBER_INT))
        ->setCategorie(filter_input(INPUT_POST,"categorieEdit",FILTER_SANITIZE_NUMBER_INT));
    $errors = $newProduct->getErrors();

    if (!$errors) {
        updateOneProduct($newProduct);
        updateListProducts();
        $_SESSION['selectedProduct'] = serialize(new Product());
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['selectedProduct'] = serialize($newProduct);
    }
    $_SESSION['selectedProduct'] = serialize($newProduct);
};



if (!isset($_SESSION['catList'])) {
    $cat = new CatDAO();
    $_SESSION['catList'] = $cat->selectAll();
}

function updateListProducts(){
    $_SESSION['listProducts'] = serialize(getAllProductsLike($_SESSION['searchTxt']));
}



echo $viewContent = getRenderedView("adminProduct",$params);

