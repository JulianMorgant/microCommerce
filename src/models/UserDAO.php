<?php
include_once 'connection.php';
include_once 'User.php';
include_once 'interfaceUserDAO.php';


class UserDAO implements interfaceUserDAO {


    public function selectAll()
    {
        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM utilisateurs ";
        return $this->resultSet2Objects($cnx->getResponse($sql,[]));
    }

    function selectOne($pseudo){

        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM utilisateurs WHERE pseudo = ?";
        return $this->resultSet2Objects($cnx->getResponse($sql,[$pseudo]))[0];
    }

    function  update($user) {

        $cnx = new ConnectionDB();
        $sql = "UPDATE utilisateurs SET  mdp = ?, email = ?, account = ? WHERE pseudo=?";
        return $cnx->executeSql($sql,[$user->getMdp(),$user->getEmail(),$user->getAccount(),$user->getPseudo()]);

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

        $cnx = new ConnectionDB();
        $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?"; //TODO sortir le psw ???
        try{
            $rows =  $cnx->getResponse($sql,[$mLog, $mPsw]);
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