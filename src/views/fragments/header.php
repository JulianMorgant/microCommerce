<h1> Mon Header 6</h1>
<?php
if (isset($_SESSION["user"])){echo  '<h2>'.$_SESSION["user"].'</h2>';};
if (isset($_SESSION["logtype"])){echo  '<h2>'.$_SESSION["logtype"].'</h2>';};

var_dump($_SESSION);


    ?>




