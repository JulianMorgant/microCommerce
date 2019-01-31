<?php




class ConnectionDB{

    static private $connection;
    static private $dsn = 'mysql:host=mysql-julian.alwaysdata.net;dbname=julian_cours;charset=utf8;port=3306';
    static private $user = 'julian_root';
    static private $pass = 'toor';
    static private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    private static $_instance = null;

    /**
     * ConnectionDB constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return string
     */
    public function getDsn(): string
    {
        return  self::$dsn;
    }

    /**
     * @param string $dsn
     */
    public function setDsn(string $dsn): void
    {
        self::$dsn = $dsn;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return self::$user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        self::$user = $user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return  self::$pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        self::$pass = $pass;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return  self::$options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        self::$connection = $options;
    }


    private function getConnection() {
        if(!self::$connection = new PDO(self::$dsn, self::$user,self::$pass, self::$options)){
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

    public function executeSql ($sql,$param) {
        $this->getConnection();
        $statement =  self::$connection->prepare($sql);
        $statement->execute($param);
        $this->closeConnection();

    }

    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new ConnectionDB();
        }
        return self::$_instance;
    }
}



