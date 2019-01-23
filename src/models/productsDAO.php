<?php
include_once 'connection.php';

function getAllProducts()
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits ";
    return $cnx->getResponse($sql,[]);

}

function getAllProductsLike($term)
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits WHERE designation  LIKE ?";
    return $cnx->getResponse($sql,["%$term%"]);
}





