<?php

class User {

    private $pseudo;
    private $mdp;
    private $email;
    private $account;

    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     * @return User
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     * @return User
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    public function getErrors(){
        return false;  //TODO
    }

}