<?php

require_once MODEL_PATH . "connection.php";


/**
 * Class catDAO
 */
class catDAO
{
    /**
     * @var ConnectionDB|null
     */
    private $cnx;

    /**
     * catDAO constructor.
     */
    public function __construct()
    {
        $this->cnx = ConnectionDB::getInstance();
    }


    /**
     * @return array
     * @throws Exception
     */
    public function selectAll() : array
    {
        $sql = "SELECT * FROM categorie ";
        return $this->cnx->getResponse($sql,[]);
    }


    /**
     * @param $id
     */
    public function selectOne($id) {


    }
}