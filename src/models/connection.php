<?php


class ConnectionDB{

    static private $connection;
    private $dsn = 'mysql:host=mysql-julian.alwaysdata.net;dbname=julian_cours;charset=utf8;port=3306';
    private $user = 'julian_root';
    private $pass = 'toor';
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    /**
     * ConnectionDB constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }

    /**
     * @param string $dsn
     */
    public function setDsn(string $dsn): void
    {
        $this->dsn = $dsn;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }


    private function getConnection() {
        if(!self::$connection = new PDO($this->dsn, $this->user,$this->pass, $this->options)){
            throw new Exception("Connexion Impossible");
        }return
            self::$connection;
    }

    private function closeConnection(){
        self::$connection = null;
    }

    public function getResponse ($sql,$param) {
        $this->getConnection();
        $statement =  self::$connection->prepare($sql);
        $statement->execute($param);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->closeConnection();
        return  $rows;

    }



}



