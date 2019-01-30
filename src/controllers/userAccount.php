<?php
require_once ROOT_PATH . "/src/models/login_test.php";
require_once MODEL_PATH."ClientDAO.php";
require_once MODEL_PATH."User.php";
require_once MODEL_PATH."UserDAO.php";
require_once MODEL_PATH."Client.php";

$myClient = new ClientDAO();

if (filter_has_var(INPUT_POST,"submitUser")){ //UPDATE USER EN FAIT

    $newUser = new User();
    $newUser
        ->setPseudo(filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_STRING))
        ->setMdp(filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING))
        ->setEmail(filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING))
        ->setAccount(filter_input(INPUT_POST,"account",FILTER_SANITIZE_STRING));
    $errors = $newUser->getErrors();

    if (!$errors) {
        $userDAO = new UserDAO();
        $userDAO->update($newUser);
        $_SESSION['user'] = serialize($newUser);
    } else {
        $_SESSION['errors'] = $errors;
//        $_SESSION['selectedProduct'] = serialize($newProduct);
    }

};

if (filter_has_var(INPUT_POST,"submitClient")){ //UPDATE CLIENT

    $newClient = new Client();
    $newClient
        ->setId(filter_input(INPUT_POST,"tid",FILTER_SANITIZE_NUMBER_INT))
        ->setNom (filter_input(INPUT_POST,"tnom",FILTER_SANITIZE_STRING))
        ->setPrenom(filter_input(INPUT_POST,"tpnom",FILTER_SANITIZE_STRING))
        ->setAdresse(filter_input(INPUT_POST,"tadresse",FILTER_SANITIZE_STRING))
        ->setDatedenaissance(filter_input(INPUT_POST,"tdate",FILTER_SANITIZE_STRING))
        ->setCp(filter_input(INPUT_POST,"tcp",FILTER_SANITIZE_NUMBER_INT));
    $errors = $newClient->getErrors();

    if (!$errors) {
        $clientDAO = new ClientDAO();
        $clientDAO->update($newClient);
        $_SESSION['client'] = serialize($newClient);
    } else {
        $_SESSION['errors'] = $errors;
//        $_SESSION['selectedProduct'] = serialize($newProduct);
    }
};


if (!isset($_SESSION['client'])) {
    $clientDAO = new ClientDAO();
    $temp = unserialize($_SESSION['user']);
    $_SESSION['client'] = serialize($clientDAO->selectOne($temp->getPseudo()));
}

echo $viewContent = getRenderedView("userAccount",[]);

