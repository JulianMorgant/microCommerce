<?php
require_once MODEL_PATH . "login_test.php";

require_once MODEL_PATH . "ProductDAO.php";
require_once MODEL_PATH . "BasketDAO.php";
require_once MODEL_PATH . "Product.php";
require_once MODEL_PATH . "CatDAO.php";
require_once MODEL_PATH . "ClientDAO.php";
require_once MODEL_PATH . "Client.php";
require_once MODEL_PATH . "User.php";
require_once MODEL_PATH . "CommandeDAO.php";
require_once MODEL_PATH . "LigneCommandeDAO.php";

$params = [];
$productDAO = new ProductDAO();
$bag = new BasketDAO('bag');

if (isset($_SESSION['basket_bag'])) {
    $bag -> load();
    $params['basket'] = $bag->selectAll();
}else{
    $params['basket'] = [];
};




if (isset($_SESSION['validCommand'])) {
    echo "<h1> valid </h1>";
    unset($_SESSION['validCommand']); //TODO petite secu à améliorer}
    recordCommand($bag);

} else {
    $_SESSION["errors"] = "Page de commande inaccessible depuis cet endroit";
    header("location:index.php?page=notFound");
}


if (!isset($_SESSION['client'])) {
    $clientDAO = new ClientDAO();
    $temp = unserialize($_SESSION['user']);
    $_SESSION['client'] = serialize($clientDAO->selectOne($temp->getPseudo()));
}


function recordCommand(BasketDAO $bag){
    $commandeDAO = new CommandeDAO();
    $newCommand = new Commande();
    $newCommand
        ->setDate(date("Y-m-d"))
        ->setIdClient((unserialize($_SESSION['client']))->getId());
    $lastId = $commandeDAO->create($newCommand);
    $newCommand ->setId($lastId);
    recordLignesCommande($bag,$lastId);
    $_SESSION['command'] = serialize($newCommand);
}

function recordLignesCommande($bag,$commandId){
    $listePannier = $bag->getProductList();
    $ligneCommandeDAO = new LigneCommandeDAO();
    foreach ($listePannier as $item) {
        $ligne = new LigneCommande();
        $ligne
            ->setQte($item->getQte())
            ->setIdCommande($commandId)
            ->setIdProduit($item->getId());
        $ligneCommandeDAO->create($ligne);
    }
}

$errors = "";

echo $viewContent = getRenderedView("validCommand",$params);

