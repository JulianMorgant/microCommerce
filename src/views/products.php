<?php

ob_start();
$keyArray = array_keys($data[0]);

echo "<tr>";
foreach ($keyArray as $_key) {
    echo "<th>". $_key."</th>";
}
echo "</tr>";

foreach ($data as $product) {

    echo "<tr>";
    foreach ($product as $val) {

        echo "<th>" . $val . " </th>";
    }
    echo "<th><input type='checkbox'>ajouter</input></th>";
    echo"</tr>";
}

$html=ob_get_clean();
?>



<h2>Liste des produits</h2>

<table class="table-striped">
    <?= $html?>
</table>


