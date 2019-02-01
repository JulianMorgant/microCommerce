<?php

$errors = $_SESSION['errors'] ?? "";

if(isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}else{$user = new User();}

if(isset($_SESSION['client'])) {
    $client = unserialize($_SESSION['client']);
}else{$client = new Client();}
?>

<div class="alert alert-danger" style="display:<?= $errors?'block':'none' ?>">
    <?=$errors?>
</div>

<div class="row">

    <div class="col col-6">

        <form method="post">

            <h1> Mon Compte </h1>



            <div class="form-group" contenteditable="false">
                <label for="pseudo">Pseudo :</label>
                <input readonly type="text" id="pseudo" name="pseudo" class="form-control" value="<?=$user->getPseudo() ??""?>">
            </div>

            <div class="form-group">
                <label for="psw">Mot de passe :</label>
                <input type="text" id="psw" name="psw" class="form-control" value="<?=$user->getMdp() ??""?>">
            </div>


            <div class="form-group">
                <label for="email">Mail :</label>
                <input type="text" id="email" name="email" class="form-control" value="<?=$user->getEmail()??""?>">
            </div>

            <div class="form-group">
                <label for="account">Admin :</label>
                <input type="text" id="account" name="account" class="form-control" value="<?=$user->getAccount()??""?>">
            </div>



            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submitUser">Modifier</button>

            </div>
        </form>
    </div>
    <div class="col col-6">

        <form method="post">

            <h1> Mes Données </h1>


            <div class="form-group">
                <label for="tid">Id :</label>
                <input readonly type="text" id="tid" name="tid" class="form-control" value="<?=$client->getId()?? ""?>">
            </div>

            <div class="form-group">
                <label for="tnom">Nom :</label>
                <input type="text" id="tnom" name="tnom" class="form-control" value="<?=$client->getNom()?? ""?>">
            </div>

            <div class="form-group">
                <label for="tpnom">Prénom :</label>
                <input type="text" id="tpnom" name="tpnom" class="form-control" value="<?=$client->getPrenom()??""?>">
            </div>


            <div class="form-group">
                <label for="tadresse">Adresse :</label>
                <input type="text" id="tadresse" name="tadresse" class="form-control" value="<?=$client->getAdresse()??""?>">
            </div>

            <div class="form-group">
                <label for="tcp">CP :</label>
                <input type="text" id="tcp" name="tcp" class="form-control" value="<?=$client->getCp()??""?>">
            </div>

            <div class="form-group">
                <label for="tdate">Date de Naissance</label>
                <input type="date" id="tdate" name="tdate" class="form-control" value="<?=$client->getDatedenaissance()??""?>">
            </div>

            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submitClient">Modifier</button>

            </div>
        </form>
    </div>
</div>