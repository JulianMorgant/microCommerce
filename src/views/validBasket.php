<?php
include_once MODEL_PATH.'Product.php';
$listePannier = $data['basket'] ?? [];
$catList = $_SESSION['catList'] ?? [];
?>

<form method="post">
    <div class=col-6">
        <div class="form-group">
            <label for="login">Recherche produit :</label>
            <input type="text" id="searchTxt" name="searchTxt" class="form-control" value="<?=$searchText??""?>">
            <button type="submit" name="search" id="search" class="form-control">Go</button>
        </div>
    </div>
</form>

<div class="row">

    <div class="col col-6">
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
                $total = 0;
                $totalLine = 0;
                foreach ($listePannier as $product) {
                    $totalLine = $product->getQte() *  $product->getPrix();
                    echo "<tr scope='col'>";
                    echo "<th scope='row'>" . $product->getDesignation() . "</th>";
                    echo "<th scope='row'>" . $catList[$product->getCategorie()]['libelle_categorie'] . "</th>";
                    echo "<th scope='row'>" . $product->getPrix() . "</th>";
                    echo "<th scope='row'>" . $product->getQte() . "</th>";
                    echo "<th scope='row'>" . $totalLine  . "</th>";
                    echo "<th scope='row'><input class='btn btn-primary btn-block' type='submit' name='remove[" . $product->getId() . "]' value='X'></input></th>";
                    echo "</tr>";
                    $total += $totalLine;
                }
                echo "<tr><th> Total : ".$total."</th></tr>" ;

                ?>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary btn-block" name="valid">Valider</button>
        </form>



    </div>
</div>

<SCRIPT>
    $(document).ready(function () {

        var $p = $("div:odd");
//masque un paragraphe sur deux 
       // $p.hide();

    });


</SCRIPT>
