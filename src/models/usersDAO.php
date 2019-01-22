<?php
include_once 'connection.php';

function getAllUsers()
{
    $cnx = new ConnectionDB();
    $sql = "SELECT * FROM utilisateurs ";
    return $cnx->getResponse($sql,[]);

}

function getOneUser(){


}