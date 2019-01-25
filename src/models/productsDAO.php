<?php
include_once 'connection.php';
include_once 'Product.php';

function getAllProducts()
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits ";
    return resultSet2Objects($cnx->getResponse($sql,[]));
}

function getAllProductsLike($term)
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits WHERE designation LIKE ?";
    return resultSet2Objects($cnx->getResponse($sql, ["%$term%"]));
}

function getOneProductById($id) {
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits WHERE id_produit = ? ";
    return resultSet2Objects($cnx->getResponse($sql,[$id]))[0];

}


/**
 * @param $result
 * @return array
 */
function resultSet2Objects($result) : array {
    $outArray = [];
    foreach ($result as $item) {
        $product = new Product();
        $product
            -> setPrix($item['prix'])
            -> setId($item['id_produit'])
            -> setDesignation($item['designation'])
            -> setQte($item['qte_stockee'])
            -> setCategorie($item['id_categorie']);
        array_push($outArray,$product);
    };
  // return count($outArray)>1 ? $outArray : $outArray[0];
    return $outArray;
}






