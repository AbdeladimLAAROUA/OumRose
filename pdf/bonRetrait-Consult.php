<?php 
session_start();
include("mpdf/mpdf.php");
$mpdf=new mPDF('win-1252','A3','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.

$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetDisplayMode('fullpage');
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>
<?php


$dt = new DateTime("2017-07-13 19:38:39");
$date = $dt->format('Y-m-d');
$time = strtotime($date);
$validity = date('d/m/Y', strtotime('+1 months',$time));


$type=''; 

if($_POST['lastEligibleToBox']=="BOX1"){
	$type=1;
}else if($_POST['lastEligibleToBox']=="BOX2"){
	$type=2;
}else if($_POST['lastEligibleToBox']=="BOX3"){
	$type=3;
}

include "content".$type.".php";

?>
<?php 
$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password.
//$mpdf->Output("bonderetrait.pdf","D");
$mpdf->Output("bonderetrait.pdf","I");
exit;
 ?>