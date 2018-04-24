<?php

$q = $_REQUEST["do"];

if ($q == "p") {
    echo"this id =". $_GET['id']." liked";
}
else if ($q == "-")
{
     echo "this id =". $_GET['id']." unliked";
}
?>