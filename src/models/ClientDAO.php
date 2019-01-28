<?php

require_once MODEL_PATH . "connection.php";


class ClientDAO
{


    public function __construct()
    {
    }


    public function selectAll() : array
    {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM clients ";
        return $cnx->getResponse($sql,[]);
    }


    public function selectOne($pseudo) {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM clients WHERE id_client = (SELECT id_client FROM user_client WHERE pseudo = ? ) ";
        $cnx->getResponse($sql,[$pseudo]);
        return $cnx->getResponse($sql,[$pseudo]);

    }
}