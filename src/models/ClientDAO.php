<?php

require_once MODEL_PATH . "connection.php";
require_once MODEL_PATH . "Client.php";
require_once MODEL_PATH . "interfaceClientDAO.php";

class ClientDAO implements interfaceClientDAO
{


    public function __construct()
    {

    }


    public function selectAll() : array
    {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM clients ";
        return $this->resultSet2Objects($cnx->getResponse($sql,[]));
    }


    public function selectOne($pseudo) {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM clients WHERE id_client = (SELECT id_client FROM user_client WHERE pseudo = ? ) ";
        $cnx->getResponse($sql,[$pseudo]);
        return $this->resultSet2Objects($cnx->getResponse($sql,[$pseudo]))[0];

    }

    function  update($client) {

        $cnx = new ConnectionDB();
        $sql = "UPDATE clients SET  nom = ?, prenom = ?, adresse = ?,date_naissance = ?, cp = ? WHERE id_client=?";
        return $cnx->executeSql($sql,[$client->getNom(),$client->getPrenom(),$client->getAdresse(),$client->getDatedenaissance(),$client->getCp(),$client->getId()]);

    }

    function delete($client)
    {
        // TODO: Implement delete() method.
    }

    function create($client)
    {
        // TODO: Implement create() method.
    }


    private function resultSet2Objects($result) : array {
        $outArray = [];
        foreach ($result as $item) {
            $client = new Client();
            $client
                -> setId($item['id_client'])
                -> setNom($item['nom'])
                -> setPrenom($item['prenom'])
                -> setAdresse($item['adresse'])
                -> setDatedenaissance($item['date_naissance'])
                -> setCp($item['cp']);
            array_push($outArray,$client);
        };
        // return count($outArray)>1 ? $outArray : $outArray[0];
        return $outArray;
    }


}