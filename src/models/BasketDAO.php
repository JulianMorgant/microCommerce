<?php

require_once MODEL_PATH . "connection.php";
require_once MODEL_PATH . "ProductDAO.php";

class BasketDAO
{
    private $name = "bag";
    private $productList = [];

    /**
     * basketDAO constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getProductList(): array
    {
        return $this->productList;
    }

    /**
     * @param array $productList
     */
    public function setProductList(array $productList): void
    {
        $this->productList = $productList;
    }

    public function selectAll(): array
    {
        return $this->productList;
    }



    /**
     * @param $product
     * @return bool
     *  DEPRECATED
     */


    public function exist($product)
    {
        $idToSearch = $product->getId();
        foreach ($this->productList as $item) {
            if ($item->getId() == $idToSearch ) {return true;};
        }
        return false;

    }

    public function getOneProductById($id)
    {
        foreach ($this->productList as $item) {
            if ($item->getId() == $id) {return $item;};
        }
        return false;
    }


    public function clear()
    {
        $this->productList = [];

    }

    public function add($product)
    {
        $productDAO = new ProductDAO();
        $actualProduct = $this->getOneProductById($product->getId());
        $productInStock = $productDAO->selectOne($product->getId()) -> getQte();

        if ($actualProduct)  { // le produit existe déjà

            if (($actualProduct->getQte() + $product->getQte()) > $productInStock ) {  // plus d'ajout que de qte dispo
                echo "trop de qte";

            }   else {

                $actualProduct->setQte($actualProduct->getQte() + $product->getQte());
                $this->update( $actualProduct);
            }

        }
        else {  //le produit n'existe pas encore

            if($product->getQte() > $productInStock) {
                echo "trop de qte";

            }else{
                $this->insert($product);

            }


        }
    }

    public function update($product) {
        $productId = $product->getId();
        for ($i = 0;$i < count($this->productList);$i++){
            if ($this->productList[$i]->getId() == $productId) {
                $this->productList[$i] = $product;
                return $product;
            }
        }
        return false;
    }

    public function insert($product) {
        return array_push($this->productList,$product);
    }

    public function delete($product)
    {
        $productId = $product->getId();
        for ($i = 0;$i < count($this->productList);$i++){
            if ($this->productList[$i]->getId() == $productId) {
                return array_splice($this->productList,$i,1);

            }
        }
        return false;

    }

    public function save()
    {
        $_SESSION['basket_'.$this->name] = serialize($this->productList);

    }

    public function load()
    {
        if (isset($_SESSION['basket_'.$this->name])) {
            $this->productList = unserialize($_SESSION['basket_' . $this -> name]);
            return true;
        } else {
            if(isset($_SESSION['basket_bag'])) {
                $this->name = "bag";
                $this->load();
            }
        }
        return false;

    }
}