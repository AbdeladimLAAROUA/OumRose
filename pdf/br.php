<?php 
include('../gestion/lib/util.php');
$livraison['type']="OX";
$livraison['user']="client";
$myLivraison = addLivraison($livraison);

header('Location:bonRetrait.php');
?>