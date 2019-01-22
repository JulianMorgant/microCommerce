<?php
unset( $_SESSION["user"]);
unset($_SESSION["logtype"]);
echo $viewContent = getRenderedView("deconnection",[]);


