<?php
$listeProduits = $data['list'] ?? [];
?>
<div class="row">
    <div class="col col-6">


        <h2>Liste des produits</h2>

        <form class="nav-item" method="post">
            <input type="text" name="searchTxt" id="searchTxt" class="nav-link">
            <button type="submit" name="search" id="search" class="nav-link">Go</button>

        </form>


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
                    echo "<th scope=\"row\">" . $product['designation'] . "</th>";
                    echo "<th scope=\"row\">" . $product['prix'] . "</th>";
                    echo "<th scope=\"row\">" . $product['qte_stockee'] . "</th>";
                    echo "<th scope=\"row\"><input type='submit' name='add[" . $product['id_produit'] . "]' value='add[" . $product['id_produit'] . "]'>+</input></th>";
                    echo "</tr>";

                }?>


            </tbody>
        </table>
    </div>
    <div class="col col-6">
        <h2>Pannier</h2>
    </div>
</div>
