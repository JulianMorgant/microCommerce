<?php
include_once 'connection.php';
include_once 'User.php';
include_once 'interfaceUserDAO.php';


class UserDAO implements interfaceUserDAO {


    private $cnx;

    /**
     * UserDAO constructor.
     */
    public function __construct()
    {
           $this->cnx = ConnectionDB::getInstance();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM utilisateurs ";
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[]));
    }

    function selectOne($pseudo){

        $sql = "SELECT * FROM utilisateurs WHERE pseudo = ?";
        return $this->resultSet2Objects($this->cnx->getResponse($sql,[$pseudo]))[0];
    }

    function  update($user) {

        $sql = "UPDATE utilisateurs SET  mdp = ?, email = ?, account = ? WHERE pseudo=?";
        return $this->cnx->executeSql($sql,[$user->getMdp(),$user->getEmail(),$user->getAccount(),$user->getPseudo()]);

    }

    function delete($user)
    {
        // TODO: Implement delete() method.
    }

    function create($user)
    {
        // TODO: Implement create() method.
    }

    public function loginValid($mLog,$mPsw) {

        $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?"; //TODO sortir le psw ???
        try{
            $rows =  $this->cnx->getResponse($sql,[$mLog, $mPsw]);
        }catch (Exception $ex){

            echo "Accès à la base de données impossible : <br>";
            echo $ex->getMessage();
            return null;
        }
        return count($rows)>0?$this->resultSet2Objects($rows)[0]:null;

    }


    private function resultSet2Objects($result) : array {
        $outArray = [];
        foreach ($result as $item) {
            $product = new User();
            $product
                -> setPseudo($item['pseudo'])
                -> setAccount($item['account'])
                -> setEmail($item['email'])
                -> setMdp($item['mdp']);
            array_push($outArray,$product);
        };
        // return count($outArray)>1 ? $outArray : $outArray[0];
        return $outArray;
    }


}