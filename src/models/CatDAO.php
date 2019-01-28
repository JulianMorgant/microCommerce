<?php

require_once MODEL_PATH . "connection.php";


class catDAO
{


    /**
     * catDAO constructor.
     */
    public function __construct()
    {
    }


    public function selectAll() : array
    {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM categorie ";
        return $cnx->getResponse($sql,[]);
    }


    public function selectOne($id) {


    }
}