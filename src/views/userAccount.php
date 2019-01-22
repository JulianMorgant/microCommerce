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

                <button type="submit" class="btn btn-primary btn-block" name="submit">Modifier</button>

            </div>
        </form>
    </div>
</div>