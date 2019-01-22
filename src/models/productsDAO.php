<?php
include_once 'connection.php';

function getAllProducts()
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits ";
    return $cnx->getResponse($sql,[]);

}
/*
function getAllProductsLike($term)
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM produits WHERE ? LIKE ?";
    $term = "%".$term."%";
    var_dump($term);
    return $cnx->getResponse($sql,['designation',$term]);


}
*/
function getAllProductsLike($term)
{
    $cnx = new ConnectionDB();
    $term = "%".$term."%";
    $sql = "SELECT * FROM produits WHERE designation LIKE".$term;
    return $cnx->getResponse($sql,[]);

}
