<?php

$isPosted = filter_has_var(INPUT_POST,"submit"); // données postés ?
$errors = "";

?>


<div class="row">
    <div class="col col-6">

        <form method="post">

            <h1> -Mon Compte- </h1>

            <div class="alert alert-danger" style="display:<?= $errors?'block':'none' ?>">
                <?=$errors?>
            </div>

            <div class="form-group" contenteditable="false">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?=$_SESSION['user']['pseudo']??""?>">
            </div>

            <div class="form-group">
                <label for="psw">Mot de passe :</label>
                <input type="text" id="psw" name="psw" class="form-control" value="<?=$_SESSION['user']['mdp']??""?>">
            </div>


            <div class="form-group">
                <label for="email">Mail :</label>
                <input type="text" id="email" name="email" class="form-control" value="<?=$_SESSION['user']['email']??""?>">
            </div>

            <div class="form-group">
                <label for="admin">Admin :</label>
                <input type="checkbox" id="admin" name="admin" class="form-control" value="<?=$_SESSION['user']['account']??""?>">
            </div>



            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submitUser">Modifier</button>

            </div>
        </form>
    </div>
    <div class="col col-6">

        <form method="post">

            <h1> -Mes Données- </h1>

            <div class="alert alert-danger" style="display:<?= $errors?'block':'none' ?>">
                <?=$errors?>
            </div>

            <div class="form-group">
                <label for="pseudo">Nom :</label>
                <input type="text" id="tnom" name="tnom" class="form-control" value="<?=$_SESSION['client']['nom']??""?>">
            </div>

            <div class="form-group">
                <label for="psw">Prénom :</label>
                <input type="text" id="tpnom" name="tpnom" class="form-control" value="<?=$_SESSION['client']['prenom']??""?>">
            </div>


            <div class="form-group">
                <label for="email">Adresse :</label>
                <input type="text" id="tadresse" name="tadresse" class="form-control" value="<?=$_SESSION['client']['adresse']??""?>">
            </div>

            <div class="form-group">
                <label for="admin">CP :</label>
                <input type="text" id="tcp" name="tcp" class="form-control" value="<?=$_SESSION['client']['CP']??""?>">
            </div>

            <div class="form-group">
                <label for="admin">Date de Naissance</label>
                <input type="date" id="tdate" name="tdate" class="form-control" value="<?=$_SESSION['client']['date_naissance']??""?>">
            </div>

            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submitClient">Modifier</button>

            </div>
        </form>
    </div>
</div>