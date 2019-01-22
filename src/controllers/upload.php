<?php



var_dump($_POST);
var_dump($_FILES);

$hasUploadedContent = isset($_FILES["userfile"]);

$isUploadOk = $hasUploadedContent && ($_FILES["userfile"]["error"] == 0);
$errMsg = "";

if ($hasUploadedContent && $isUploadOk){

    $fileExtension = "";
    $allowedExtensions = [
        "image/png" => ".png",
        "image/jpeg" => ".jpg",
        "image/gif" => ".gif" ];

    if(array_key_exists($_FILES["userfile"]["type"],$allowedExtensions)) {
        $fileExtension = $allowedExtensions[$_FILES["userfile"]["type"]];
        $destinationFilePath = ROOT_PATH."/web/img/".uniqid("photo_").$fileExtension;
        $moveOk = move_uploaded_file($_FILES["userfile"]["tmp_name"],$destinationFilePath);
        if (!$moveOk) {$errMsg .= "erreur de transfert <br>";};

    }else{
        $errMsg .= "fichier non image <br>";
    }

    if($errMsg = ""){
        $errMsg =  "All good";
    }

}

echo $viewContent = getRenderedView("upload",["_msg" => $errMsg]);

