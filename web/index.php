<?php
session_start();
define("ROOT_PATH", dirname(__DIR__));
define("SRC_PATH", ROOT_PATH. "/src/");
define("WEB_PATH", __DIR__);
define("CTRL_PATH",SRC_PATH. "controllers/");
define("VIEW_PATH",SRC_PATH. "views/");
define("MODEL_PATH",SRC_PATH. "models/");



//Inclusion de la bibliothèque pour le routage
require ROOT_PATH."/libs/mvc.php";

//Définition du fichier dans le controller
$controllerFile = getController();
require $controllerFile;


