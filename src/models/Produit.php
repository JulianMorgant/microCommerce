<?php

class Produit {

    private $id_produit;
    private $designation;
    private $prix;
    private $qte_stockee;
    private $photo;

    /**
     * Produit constructor.
     * @param Produit $produit
     */
    public function __construct(array $produit)
    {
        foreach ($produit as $key => $val) {
            echo $key." ".$val;
        };
    }



}