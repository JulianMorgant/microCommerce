<?php
include_once MODEL_PATH . 'Product.php';
$listeProduits = $data['list'] ?? [];
$selectedProduct = $data['selectedProduct'] ?? new Product();
$searchText = $data['searchTxt'] ?? "";
$catList = $data['catList'] ?? [];
$errors = "";
?>
<form method="post">
    <div class=col-6">
        <div class="form-group">
            <label for="login">Recherche produit :</label>
            <input type="text" id="searchTxt" name="searchTxt" class="form-control" value="<?= $searchText ?? "" ?>">
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
                    echo "<th scope='row'><input type='submit' name='edit[" . $product->getId() . "]' value='edit[" . $product->getId() . "]'>+</input></th>";
                    echo "</tr>";
                } ?>


                </tbody>
            </table>
        </form>
    </div>
    <div class="col col-6">


        <h2>Edition du produit</h2>


        <form method="post">

            <div class="alert alert-danger" style="display:<?= $errors ? 'block' : 'none' ?>">
                <?= $errors ?>
            </div>

            <div class="form-group">
                <label for="designation">Designation : </label>
                <input type="text" id="designation" name="designation" class="form-control" value="<?= $selectedProduct->getDesignation() ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="prix">Prix : </label>
                <input type="text" id="prix" name="prix" class="form-control" value="<?= $selectedProduct->getPrix() ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock : </label>
                <input type="text" id="stock" name="stock" class="form-control" value="<?= $selectedProduct->getQte() ?? "" ?>">
            </div>

            <div class="form-group">
                <p>Catégorie : </p>
                <div class="col-6">
                    <select class="form-control" id="categorie" name = "categorie">
                        <?php

                        foreach ($catList as $cat) {
                            $selString = ($selectedProduct->getCategorie() == $cat['id_categorie'])?" selected ":"";
                            echo "<option value=".$cat['id_categorie'].$selString.">".$cat['libelle_categorie']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div>

                <button type="submit" class="btn btn-primary btn-block" name="submit">Connexion</button>

            </div>
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
