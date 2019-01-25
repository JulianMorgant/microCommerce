<?php
include_once MODEL_PATH.'Product.php';
$listeProduits = $data['list'] ?? [];
?>
<div class="row">
    <div class="col col-6">


        <h2>Liste des produits</h2>

        <form class="nav-item" method="post">
            <input type="text" name="searchTxt" id="searchTxt" class="nav-link">
            <button type="submit" name="search" id="search" class="nav-link">Go</button>

        </form>

    <form method="post">
        <table class="table table-sm table-dark">
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
    </div>
</div>
