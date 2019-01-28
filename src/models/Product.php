<?php

/**
 * Class Product
 */
class Product {
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $designation;
    /**
     * @var
     */
    protected $prix;
    /**
     * @var
     */
    protected $qte;
    /**
     * @var
     */
    protected $categorie;


    /**
     * Product constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     * @return Product
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     * @return Product
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
     * @return Product
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     * @return Product
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getErrors() {
        $returnString = "";
        if (!$this->categorie) {$returnString .= "Erreur catégorie <br>";};
        if (!$this->designation) {$returnString .= "Erreur désignation <br>";};
        if (!$this->prix) {$returnString .= "Erreur prix <br>";};
        if (!$this->qte) {$returnString .= "Erreur quantité <br>";};

        return $returnString;
    }


}

