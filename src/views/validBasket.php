<?php
include_once MODEL_PATH . 'Product.php';
$listePannier = $data['basket'] ?? [];
$catList = $_SESSION['catList'] ?? [];
$client = unserialize($_SESSION['client']);
?>

<form method="post">
    <div class=col-6">
        <div class="form-group">
            <label for="searchTxt">Recherche produit :</label>
            <input type="text" id="searchTxt" name="searchTxt" class="form-control" value="<?= $searchText ?? "" ?>">
            <button type="submit" name="search" id="search" class="form-control">Go</button>
        </div>
    </div>
</form>

<div class="row">

    <div class="col col-10">
        <h2>Pannier</h2>
        <form method="post">
            <table class="table table-sm table-light">
                <thead class="thead-light">
                <tr>
                    <th>Designation</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Qte</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $TVA = 20;
                $livraison = 20; //TODO gérer les valeurs de livraison
                $total = 0;
                $totalLine = 0;
                foreach ($listePannier as $product) {
                    $totalLine = $product->getQte() * $product->getPrix();
                    echo "<tr>";
                    echo "<th scope='row'>" . $product->getDesignation() . "</th>";
                    echo "<th scope='row'>" . $catList[$product->getCategorie()]['libelle_categorie'] . "</th>";
                    echo "<th scope='row'>" . $product->getPrix() . "</th>";
                    echo "<th scope='row'>" . $product->getQte() . "</th>";
                    echo "<th scope='row'>" . $totalLine . "</th>";
                    echo "</tr>";
                    $total += $totalLine;
                }
                $totalTTC = $total + ($total*$TVA/100) + $livraison;
                echo "<tr><th colspan=\"3\"></th><th>Total :</th><th>$total</th></tr>";
                echo "<tr><th colspan=\"3\"></th><th>TVA : ".$TVA ." % </th><th>".($total*$TVA/100)."</th></tr>";
                echo "<tr><th colspan=\"3\"></th><th>Livraison : ".$livraison ."</th><th>".$livraison."</th></tr>";
                echo "<tr><th colspan=\"3\"></th><th>Total TTC :</th><th>".$totalTTC."</th></tr>";
                ?>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" name="modifBasket">Modifier le pannier</button>
        </form>


    </div>
</div>
<div class="row">

    <div class="col col-10">
        <h2>Livraison</h2>
        <form method="post">

            <div class="form-group">
                <label for="tnom">Nom :</label>
                <span id="tnom"><?= $client->getNom() ?? "" ?></span>
            </div>

            <div class="form-group">
                <label for="tpnom">Prénom :</label>
                <span id="tpnom"><?= $client->getPrenom() ?? "" ?></span>
            </div>


            <div class="form-group">
                <label for="tadresse">Adresse :</label>
                <span id="tadresse"><?= $client->getAdresse() ?? "" ?></span>
            </div>

            <div class="form-group">
                <label for="tcp">CP :</label>
                <span id="tcp"> <?= $client->getCp() ?? "" ?></span>
            </div>

            <div>

                <button type="submit" class="btn btn-primary" name="modifAccount">Modifier l'adresse de livraison
                </button>

            </div>
        </form>
    </div>

</div>

<div class="row">
    <div class="col col-10">
        <h2>Validation</h2>
        <form method="post">

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkCGV">
                <label class="form-check-label" for="checkCGV">\.       J'ai lu et j'accepte les CGV</label>
            </div>


        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary btn-block" name="validCommand">Valider la commande</button>
        </div>
        </form>
    </div>
</div>

<SCRIPT>
    $(document).ready(function () {

    //    var $p = $("div:odd");
//masque un paragraphe sur deux 
        // $p.hide();

    });


</SCRIPT>
