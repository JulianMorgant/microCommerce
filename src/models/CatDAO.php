<?php

require_once MODEL_PATH . "connection.php";


class catDAO
{
    private $cnx;

    /**
     * catDAO constructor.
     */
    public function __construct()
    {
        $this->cnx = ConnectionDB::getInstance();
    }


    public function selectAll() : array
    {
        $sql = "SELECT * FROM categorie ";
        return $this->cnx->getResponse($sql,[]);
    }


    public function selectOne($id) {


    }
}