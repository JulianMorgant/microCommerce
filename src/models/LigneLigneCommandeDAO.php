<?php

require_once MODEL_PATH . "connection.php";
require_once MODEL_PATH . "LigneCommande.php";
require_once MODEL_PATH . "interfaceLigneCommandeDAO.php";

class LigneCommandeDAO implements interfaceLigneCommandeDAO
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = ConnectionDB::getInstance();
    }

    public function selectAll() : array
    {
        $sql = "SELECT * FROM ligcdes";
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[]));
    }


    public function selectOne(LigneCommande $ligneCommande) {

        $sql = "SELECT * FROM ligcdes WHERE id_cde = ?";
       // $this->cnx->getResponse($sql,[$pseudo]);
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[$ligneCommande->getIdCommande()]));

    }

    function  update(LigneCommande $ligneCommande) {

        $sql = "UPDATE ligcdes SET  qte = ? WHERE (id_cde = ? AND id_produit = ?) ";
        return $this->cnx->executeSql($sql,[$ligneCommande->getQte(),$ligneCommande->getIdCommande(),$ligneCommande->getIdProduit()]);

    }

    function delete(LigneCommande $ligneCommande)
    {
        $sql = "DELETE FROM ligcdes WHERE (id_cde = ? AND id_produit = ?) ";
        return $this->cnx->executeSql($sql,[$ligneCommande->getIdCommande(),$ligneCommande->getIdProduit()]);
    }

    function create(LigneCommande $ligneCommande)
    {
        $sql = "INSERT INTO ligcdes (id_cde,id_produit,qte) VALUES (?,?,?)";
        return $this->cnx->executeSql($sql,[$ligneCommande->getIdCommande(),$ligneCommande->getIdProduit(),$ligneCommande->getQte()]);
    }


    private function resultSet2Objects($result) : array {
        $outArray = [];
        foreach ($result as $item) {
            $ligneCommande = new LigneCommande();
            $ligneCommande
                -> setIdCommande($item['id_cde'])
                -> setIdProduit($item['id_produit'])
                -> setQte($item['qte']);
            array_push($outArray,$ligneCommande);
        };
        // return count($outArray)>1 ? $outArray : $outArray[0];
        return $outArray;
    }


}