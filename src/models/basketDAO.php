<?php

require_once MODEL_PATH . "connection.php";
require_once MODEL_PATH . "productsDAO.php";

class basketDAO
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

    public function selectAll(): array
    {

    }

    public function exist($product)
    {
        $idToSearch = $product->getId();
        foreach ($this->productList as $item) {
            if ($item->getId() == $idToSearch ) {return true;};
        }
        return false;

    }

    public function clear()
    {
        $this->productList = [];

    }

    public function add($product)
    {
        $productInStock = getOneProductById($product->getId());
        if ($this->exist($product) ) {




        }

    }

    public function remove($product)
    {

    }

    public function deleteOne($product)
    {

    }

    public function save($name)
    {


    }

    public function load($name)
    {

        $this->name = $name;


    }
}