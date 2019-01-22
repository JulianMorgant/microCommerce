<?php
$listeProduits = $data['list'] ?? [];

ob_start();
if(count($listeProduits) < 0) {
    $keyArray = array_keys($listeProduits[0]);

    echo "<tr>";
    foreach ($keyArray as $_key) {
        echo "<th>" . $_key . "</th>";
    }
    echo "</tr>";

    foreach ($listeProduits as $product) {

        echo "<tr>";
        foreach ($product as $val) {

            echo "<th>" . $val . " </th>";
        }
        echo "<th><input type='checkbox'>ajouter</input></th>";
        echo "</tr>";
    }

}else{
    echo "pas de produits";};



$html=ob_get_clean();
?>



<h2>Liste des produits</h2>

<form class="nav-item" method="post">
    <input type="text" name="searchTxt" id="searchTxt" class="nav-link">
    <button type="submit" name="search" id="search" class="nav-link">Go</button>

</form>


<table class="table-striped">
    <?= $html?>
</table>
