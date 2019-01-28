<?php
unset( $_SESSION["user"]);
unset( $_SESSION["client"]);
echo $viewContent = getRenderedView("deconnection",[]);


