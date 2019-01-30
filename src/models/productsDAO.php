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

function deleteOneProduct($id) {
    $cnx = new ConnectionDB();
    $sql = "DELETE FROM produits WHERE id_produit = ? ";
    return $cnx->executeSql($sql,[$id]);
}

function insertOneProduct($product) {
    $cnx = new ConnectionDB();
    $sql = "INSERT INTO produits (designation,prix,qte_stockee,id_categorie) VALUES (?,?,?,?)";
    return $cnx->executeSql($sql,[$product->getDesignation(),$product->getPrix(),$product->getQte(),$product->getCategorie()]);
}

function updateOneProduct($product) {
    $cnx = new ConnectionDB();
    $sql = "UPDATE produits SET designation = ? ,prix = ? , qte_stockee = ?, id_categorie = ? WHERE id_produit = ?";
    return $cnx->executeSql($sql,[$product->getDesignation(),$product->getPrix(),$product->getQte(),$product->getCategorie(),$product->getId()]);
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






