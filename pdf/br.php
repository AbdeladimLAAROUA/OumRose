<?php 
include('../gestion/lib/util.php');
$livraison['type']="OX";
$livraison['user']="client";
$myLivraison = addLivraison($livraison);


include("mpdf/mpdf.php");
$mpdf=new mPDF('win-1252','A3','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.

$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetDisplayMode('fullpage');
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>
<?php include "content".$_SESSION['lastEligibleToBox'].".php";
 //This is your php page ?>
<?php 
$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password.


//$mpdf->Output("bonderetrait.pdf","D");
$mpdf->Output("bonderetrait.pdf","I");

/*header('Location:../bonRetrait.php');*/



exit;


?>