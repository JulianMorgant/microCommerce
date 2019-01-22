<?php
require ROOT_PATH."/src/models/productsDAO.php";
$productList = getAllProducts();
echo $viewContent = getRenderedView("products",$productList);

