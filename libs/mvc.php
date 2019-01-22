<?php

/**
 * @return string
 */
function getController()
{
//Récupération du nom de la page
    $page = filter_input(
            INPUT_GET, "page",
            FILTER_SANITIZE_STRING
        ) ?? "home";

//Définition du fichier
    $controllerFile = CTRL_PATH . $page.".php";

//Gestion d'un contrôleur inexistant
    if (!file_exists($controllerFile)) {
        $controllerFile = CTRL_PATH . "notFound.php";
    }
    return $controllerFile;
}

/**
 * Retourne le résultat de l'interprétation php d'une vue
 * @param string $view
 * @param array $data
 * @return string
 */
function getViewContent(string $view = "home", array $data = []) : string
{
//Mise en tampon du résultat de l'interpréteur PHP
    ob_start();
//Exportation des variables
    extract($data);
//inclusion de la vue
    require VIEW_PATH.$view.".php";

//Récupération du contenu du tampon dans une variable
    $viewContent = ob_get_clean();
    return $viewContent;
}

/**
 * retourne une vue décorée d'un layout
 * @param string $view
 * @param array $data
 * @param string $layout
 * @return string
 */
function getRenderedView(string $view, array $data = [], string $layout = "layout1") {

    $viewContent = getViewContent($view,$data);

    $data["viewContent"] = $viewContent;

    return getViewContent($layout,$data);


}

function getPath($page, $params){
    $url = "/index.php?page={$page}";
    foreach($params as $key=>$val){
        $url .= "&$key=$val";
    }
    return $url;
}