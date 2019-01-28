<?php
include_once MODEL_PATH . 'Product.php';

$listeProduits = (isset($_SESSION['listProducts'])) ? unserialize($_SESSION['listProducts']) : [];
$selectedProduct = (isset($_SESSION['selectedProduct'])) ? unserialize($_SESSION['selectedProduct']) : new Product();
$searchText = $_SESSION['searchTxt'] ?? "";
$catList = $_SESSION['catList'] ?? [];
$errors = $_SESSION['errors'] ?? "";
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
                    echo "<th scope='row'><input class='btn btn-primary ' type='submit' name='edit[" . $product->getId() . "]' value='Modif'></th>";
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
                <label for="idEdit">Id : </label>
                <input readonly type="text" id="idEdit" name="idEdit" class="form-control"
                       value="<?= $selectedProduct->getId() ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="designation">Designation : </label>
                <input type="text" id="designationEdit" name="designationEdit" class="form-control"
                       value="<?= $selectedProduct->getDesignation() ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="prix">Prix : </label>
                <input type="text" id="prixEdit" name="prixEdit" class="form-control"
                       value="<?= $selectedProduct->getPrix() ?? "" ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock : </label>
                <input type="number" min="0" id="stockEdit" name="stockEdit" class="form-control"
                       value="<?= $selectedProduct->getQte() ?? "" ?>">
            </div>

            <div class="form-group">
                <p>Catégorie : </p>
                <div class="col-6">
                    <div class="form-group">
                        <select class="custom-select" id="categorieEdit" name = "categorieEdit" required>
                            <!--                    <select class="form-control" id="categorieEdit" name = "categorieEdit"> -->
                            <?php

                            foreach ($catList as $cat) {
                                $selString = ($selectedProduct->getCategorie() == $cat['id_categorie']) ? " selected " : "";
                                echo "<option value=" . $cat['id_categorie'] . $selString . ">" . $cat['libelle_categorie'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <!--                    </select>
                    -->
                </div>
            </div>

            <div>

                <?php if (!$selectedProduct->getId()) { ?>

                    <button type="submit" class="btn btn-primary btn-block" name="b_create">Ajouter</button>

                <?php } else { ?>

                    <button type="submit" class="btn btn-primary btn-block" name="b_update">Modifier</button>
                    <button type="submit" class="btn btn-primary btn-block" name="b_new">New</button>
                    <button type="submit" class="btn btn-primary btn-block" name="b_delete">Supprimer</button>

                <?php } ?>

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
