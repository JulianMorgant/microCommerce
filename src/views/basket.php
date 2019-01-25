<?php
include_once MODEL_PATH.'Product.php';
$listeProduits = $data['list'] ?? [];
$listePannier = $data['basket'] ?? [];
$searchText = $data['searchTxt'] ?? "";
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


        <h2>Liste des produits</h2>



    <form method="post">
        <table class="table table-sm table-light">
            <thead class="thead-light">
            <tr>
                <th>Designation</th>
                <th>Prix</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>

                <?php
                foreach ($listeProduits as $product) {
                    echo "<tr scope='col'>";
                    echo "<th scope='row'>" . $product->getDesignation() . "</th>";
                    echo "<th scope='row'>" . $product->getPrix() . "</th>";
                    echo "<th scope='row'>" . $product->getQte() . "</th>";
                    echo "<th scope='row'><input type='submit' name='add[" . $product->getId() . "]' value='add[" . $product->getId() . "]'>+</input></th>";
                    echo "</tr>";
                }?>


            </tbody>
        </table>
    </form>
    </div>
    <div class="col col-6">
        <h2>Pannier</h2>
        <form method="post">
            <table class="table table-sm table-light">
                <thead class="thead-light">
                <tr>
                    <th>Designation</th>
                    <th>Prix</th>
                    <th>Qte</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($listePannier as $product) {
                    echo "<tr scope='col'>";
                    echo "<th scope='row'>" . $product->getDesignation() . "</th>";
                    echo "<th scope='row'>" . $product->getPrix() . "</th>";
                    echo "<th scope='row'>" . $product->getQte() . "</th>";
                   // echo "<th scope='row'><input type='submit' name='add[" . $product->getId() . "]' value='add[" . $product->getId() . "]'>+</input></th>";
                    echo "</tr>";
                }?>

                </tbody>
            </table>
        </form>



    </div>
</div>
