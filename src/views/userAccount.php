<?php

$errors = $_SESSION['errors'] ?? "";

if(isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
}else{$user = new User();}

if(isset($_SESSION['client'])) {
    $client = unserialize($_SESSION['client']);
}else{$client = new Client();}

if(isset($_SESSION['listCommand'])) {
    $listCommand = unserialize($_SESSION['listCommand']);
}else{$listCommand = [];}

if(isset($_SESSION['selectedCommand'])) {
    $selectedCommand = unserialize($_SESSION['selectedCommand']);
}else{$selectedCommand = null;}

if(isset($_SESSION['listProducts'])) {
    $listProducts = unserialize($_SESSION['listProducts']);
}else{$listProducts = [];}
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
<br>
<div class="row">
    <div class="col col-6">
        <form method="post">
            <h1>Mes Commandes</h1>
            <table class="table table-sm table-light">
                <thead class="thead-light">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($listCommand as $command) {
                    echo "<th scope='row'>" . $command->getId() ."</th>";
                    echo "<th scope='row'>" . $command->getDate() . "</th>";
                    echo "<th scope='row'><input class='btn btn-primary ' type='submit' name='edit[" . $command->getId() . "]' value='Voir'></th>";
                    echo "</tr>";
                } ?>


                </tbody>
            </table>
        </form>


    </div>

    <div class="col col-6" style="display:<?= $selectedCommand?'block':'none' ?>">
        <h1>Visualisation de la commandes</h1>
        <h2>Numéro de commande : <?= $selectedCommand->getId() ?></h2>
        <h2>Date : <?= $selectedCommand->getDate() ?></h2>
        <table class="table table-sm table-light">
            <thead class="thead-light">
            <tr>
                <th>Designation</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Prix Total</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($listProducts as $product) {
                echo "<th scope='row'>" . $product->getDesignation() ."</th>";
                echo "<th scope='row'>" . $product->getQte() . "</th>";
                echo "<th scope='row'>" . $product->getPrix() . "</th>";
                echo "<th scope='row'>" . ($product->getQte() * $product->getPrix()) . "</th>";
                echo "</tr>";
            } ?>


            </tbody>
        </table>
    </div>


</div>