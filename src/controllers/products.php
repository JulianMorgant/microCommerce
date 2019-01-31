<?php
require ROOT_PATH . "/src/models/ProductDAO.php";
$productList = getAllProducts();
echo $viewContent = getRenderedView("products",$productList);

