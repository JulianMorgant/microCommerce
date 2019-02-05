<?php

require_once MODEL_PATH . "connection.php";
require_once MODEL_PATH . "Commande.php";
require_once MODEL_PATH . "interfaceCommandeDAO.php";

class CommandeDAO implements interfaceCommandeDAO
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = ConnectionDB::getInstance();
    }

    public function selectAll() : array
    {
        $sql = "SELECT * FROM cdes ";
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[]));
    }


    public function selectOne(Commande $commande) {

        $sql = "SELECT * FROM cdes WHERE id_cde = ?";
        // $this->cnx->getResponse($sql,[$pseudo]);
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[$commande->getId()]));

    }

    public function selectAllByClient(int $id) {

        $sql = "SELECT * FROM cdes WHERE id_client = ?";
        // $this->cnx->getResponse($sql,[$pseudo]);
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[$id]));

    }

    function  update(Commande $commande) {

        $sql = "UPDATE cdes SET  id_client = ?, date_cde = ? WHERE (id_cde = ?) ";
        return $this->cnx->executeSql($sql,[$commande->getIdClient(),$commande->getDate(),$commande->getId()]);


    }

    function delete(Commande $commande)
    {
        $sql = "DELETE FROM cdes WHERE id_cde = ?";
        return $this->cnx->executeSql($sql,[$commande->getId()]);
    }

    function create(Commande $commande)
    {
        $sql = "INSERT INTO cdes (date_cde,id_client) VALUES (?,?)";
        return $this->cnx->executeSql($sql,[$commande->getDate(),$commande->getIdClient()]);
    }

/*    function getLastInsertId(){
        $sql = "SELECT LAST_INSERT_ID() FROM cdes";
        //return $this->cnx->getResponse($sql,[]);
        return $this->cnx->lastInsertId();

    }
*/


    private function resultSet2Objects($result) : array {
        $outArray = [];
        foreach ($result as $item) {
            $commande = new Commande();
            $commande
                -> setId($item['id_cde'])
                -> setDate($item['date_cde'])
                -> setIdClient($item['id_client']);
            array_push($outArray,$commande);
        };
        // return count($outArray)>1 ? $outArray : $outArray[0];
        return $outArray;
    }


}