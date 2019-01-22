<?php
include_once 'connection.php';

function getAllProducts()
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM clients ";
    return $cnx->getResponse($sql,[]);

}