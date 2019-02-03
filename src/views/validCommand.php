<?php
include_once MODEL_PATH . 'Product.php';
$listePannier = $data['basket'] ?? [];
$catList = $_SESSION['catList'] ?? [];
$client = unserialize($_SESSION['client']);
?>

<div class="row">

    <div class="col col-6">
        <h2>Commande validée n° </h2>
        <form method="post">
            <table class="table table-sm table-light">
                <thead class="thead-light">
                <tr>
                    <th>Designation</th>
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
                    echo "<th scope='row'>" . $product->getPrix() . "</th>";
                    echo "<th scope='row'>" . $product->getQte() . "</th>";
                    echo "<th scope='row'>" . $totalLine . "</th>";
                    echo "</tr>";
                    $total += $totalLine;
                }
                $totalTTC = $total + ($total*$TVA/100) + $livraison;
                echo "<tr><th colspan=\"2\"></th><th>Total :</th><th>$total</th></tr>";
                echo "<tr><th colspan=\"2\"></th><th>TVA : ".$TVA ." % </th><th>".($total*$TVA/100)."</th></tr>";
                echo "<tr><th colspan=\"2\"></th><th>Livraison : ".$livraison ."</th><th>".$livraison."</th></tr>";
                echo "<tr><th colspan=\"2\"></th><th>Total TTC :</th><th>".$totalTTC."</th></tr>";
                ?>

                </tbody>
            </table>
        </form>


    </div>
    <div class="col col-2">

    </div>
    <div class="col col-4">
        <h2>Livraison</h2>
        <form method="post">

            <div class="form-group">
                <label for="tnom">Nom :</label>
                <span id="tnom"><?= $client->getNom() ?? "" ?></span>
                <br>
                <label for="tpnom">Prénom :</label>
                <span id="tpnom"><?= $client->getPrenom() ?? "" ?></span>
                <br>
                <label for="tadresse">Adresse :</label>
                <span id="tadresse"><?= $client->getAdresse() ?? "" ?></span>
                <br>
                <label for="tcp">CP :</label>
                <span id="tcp"> <?= $client->getCp() ?? "" ?></span>
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
