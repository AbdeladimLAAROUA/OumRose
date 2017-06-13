<?php 
include('../gestion/lib/util.php');
$livraison['type']="OX";
$myLivraison = addLivraison($livraison);

header('Location:bonRetrait.php');
?>