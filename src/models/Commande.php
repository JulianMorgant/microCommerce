<?php

class Commande
{
    private $id;
    private $idClient;
    private $date;

    /**
     * Commande constructor.
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
     * @return Commande
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     * @return Commande
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


}