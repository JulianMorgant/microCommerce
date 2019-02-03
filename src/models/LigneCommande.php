<?php

class LigneCommande {

    private $idCommande;
    private $idProduit;
    private $qte;

    /**
     * LigneCommande constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param mixed $idCommande
     * @return LigneCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     * @return LigneCommande
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param mixed $qte
     * @return LigneCommande
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
        return $this;
    }




}