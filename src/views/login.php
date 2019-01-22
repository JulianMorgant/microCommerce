<?php
require_once MODEL_PATH.'connection.php';

$isPosted = filter_has_var(INPUT_POST,"submit"); // données postés ?
$errors = "";

function loginValid($mLog,$mPsw) {

    $sql = "SELECT * FROM utilisateurs WHERE pseudo=? AND mdp=?";
    $cnx = new ConnectionDB();
    $rows =  $cnx->getResponse($sql,[$mLog, $mPsw]);
    var_dump($rows);
    return count($rows)>0?$rows[0]:null;
}

if ($isPosted) {
    $psw = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
    $login = filter_input(INPUT_POST,"login",FILTER_SANITIZE_STRING);

    // validation de données

    if(empty($login)){$errors .= "Login requis<br>";};
    if(empty($psw)){$errors .= "Mot de passe requis<br>";};

    if(empty($errors)) {
            $loginOK = loginValid($login,$psw);
        if($loginOK) { header("location:".$_SESSION['origin']??"home.php"."?name=$login");
            $_SESSION["user"] = $loginOK;
            } else {
            $errors = "Informations de connexion incorrectes";
        }
    }

}

?>


<div class="row">
    <div class="col col-6">

        <form method="post">

            <h1> -Login- </h1>

            <div class="alert alert-danger" style="display:<?= $errors?'block':'none' ?>">
                <?=$errors?>
            </div>

            <div class="form-group">
                <label for="login">Identifiant :</label>
                <input type="text" id="login" name="login" class="form-control" value="<?=$login??""?>">
            </div>

            <div class="form-group">
                <label for="psw">Mot de passe :</label>
                <input type="password" id="psw" name="psw" class="form-control">
            </div>

            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submit">Connexion</button>

            </div>
        </form>
    </div>
</div>
