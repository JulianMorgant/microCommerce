<?php
include_once 'connection.php';
include_once 'Product.php';

class ProductDAO
{
    private $cnx;

    /**
     * UserDAO constructor.
     */
    public function __construct()

    {
        $this->cnx = ConnectionDB::getInstance();
    }


    function selectAll()
    {
        $sql = "SELECT * FROM produits ";
        return $this->resultSet2Objects($this->cnx->getResponse($sql, []));
    }

    function selectLike($term)
    {
        $sql = "SELECT * FROM produits WHERE designation LIKE ?";
        return $this->resultSet2Objects($this->cnx->getResponse($sql, ["%$term%"]));
    }

    function selectOne($id)
    {
        $sql = "SELECT * FROM produits WHERE id_produit = ? ";
        return $this->resultSet2Objects($this->cnx->getResponse($sql, [$id]))[0];
    }

    function delete($id)
   {
        $sql = "DELETE FROM produits WHERE id_produit = ? ";
        return $this->cnx->executeSql($sql, [$id]);
    }

    function insert($product)
    {
        $sql = "INSERT INTO produits (designation,prix,qte_stockee,id_categorie) VALUES (?,?,?,?)";
        return $this->cnx->executeSql($sql, [$product->getDesignation(), $product->getPrix(), $product->getQte(), $product->getCategorie()]);
    }

    function update($product)
    {
        $sql = "UPDATE produits SET designation = ? ,prix = ? , qte_stockee = ?, id_categorie = ? WHERE id_produit = ?";
        return $this->cnx->executeSql($sql, [$product->getDesignation(), $product->getPrix(), $product->getQte(), $product->getCategorie(), $product->getId()]);
    }

    /**
     * @param $result
     * @return array
     */
    function resultSet2Objects($result): array
    {
        $outArray = [];
        foreach ($result as $item) {
            $product = new Product();
            $product
                ->setPrix($item['prix'])
                ->setId($item['id_produit'])
                ->setDesignation($item['designation'])
                ->setQte($item['qte_stockee'])
                ->setCategorie($item['id_categorie']);
            array_push($outArray, $product);
        };
        // return count($outArray)>1 ? $outArray : $outArray[0];
        return $outArray;
    }

}




