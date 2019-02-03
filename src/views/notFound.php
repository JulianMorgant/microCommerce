<?php

if ((isset($_SESSION['errors'])) && ($_SESSION['errors'] != "")) {
    $errors = $_SESSION['errors'];
}else{
    $errors = "Page not Found";

};

?>

<h2>Erreur</h2>

<div class="row">
    <div class="col col-6">
            <div class="alert alert-danger" style="display:<?= $errors ? 'block' : 'none' ?>">
                <?= $errors ?>
            </div>
    </div>
</div>

