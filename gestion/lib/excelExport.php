<?php
/** Set default timezone (will throw a notice otherwise) */
date_default_timezone_set('Africa/Casablanca');

// include PHPExcel
require('PHPExcel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_REQUEST['methode'])){
		if($_REQUEST['methode'] == 'exportPere'){
			echo exportPere($_REQUEST['data']);
		}else if($_REQUEST['methode'] == 'exportClient'){
			echo exportClient($_REQUEST['data']);
		}else if($_REQUEST['methode'] == 'exportLDcmd'){
			echo exportLDcmd($_REQUEST['data']);
		}else{
			echo json_encode(array('result'=>'method_not_exist'));
		}
	}else{
		echo json_encode(array('result'=>'no_method_selected'));
	}
}

function exportPere($data){
	// create new PHPExcel object
	$objPHPExcel = new PHPExcel;

	// set default font
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');

	// set default font size
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

	// create the writer
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

	// currency format, € with < 0 being in red color
	$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';

	// number format, with thousands separator and two decimal points.
	$numberFormat = '#,#0.##;[Red]-#,#0.##';

	$name = 'liste_produits_pere_'.date("Y-m-d_His");
	// writer already created the first sheet for us, let's get it
	$objSheet = $objPHPExcel->getActiveSheet();

	// rename the sheet
	$objSheet->setTitle('Liste Produits Pères');

	// let's bold and size the header font and write the header
	// as you can see, we can specify a range of cells, like here: cells from A1 to A4
	$objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(12);

	// write header
	$objSheet->getCell('A1')->setValue('Nom');
	$objSheet->getCell('B1')->setValue('Description');
	$objSheet->getCell('C1')->setValue('Debut');
	$objSheet->getCell('D1')->setValue('Fin');

	// we could get this data from database, but here we are writing for simplicity
	foreach ($data as $key => $product) {
		$i = $key+2;
		$objSheet->getCell('A'.$i)->setValue($product[1]);
		$objSheet->getCell('B'.$i)->setValue($product[2]);
		$objSheet->getCell('C'.$i)->setValue($product[3]);
		$objSheet->getCell('D'.$i)->setValue($product[4]);
	}

	// autosize the columns
	$objSheet->getColumnDimension('A')->setAutoSize(true);
	$objSheet->getColumnDimension('B')->setAutoSize(true);
	$objSheet->getColumnDimension('C')->setAutoSize(true);
	$objSheet->getColumnDimension('D')->setAutoSize(true);

	$objWriter->save('../downloads/'.$name.'.xlsx');
	$objPHPExcel->disconnectWorksheets();
	unset($objWriter, $objPHPExcel);

	return  json_encode($name);
}

function exportClient($data){
	$objPHPExcel = new PHPExcel;
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
	$numberFormat = '#,#0.##;[Red]-#,#0.##';
	$name = 'liste_clients_'.date("Y-m-d_His");
	$objSheet = $objPHPExcel->getActiveSheet();
	$objSheet->setTitle('Liste Produits Pères');

	$objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(12);

	$objSheet->getCell('A1')->setValue('ID');
	$objSheet->getCell('B1')->setValue('Nom');
	$objSheet->getCell('C1')->setValue('Prenom');
	$objSheet->getCell('D1')->setValue('E-mail');
	$objSheet->getCell('E1')->setValue('GSM');
	$objSheet->getCell('F1')->setValue('Age');
	$objSheet->getCell('G1')->setValue('Adresse');
	$objSheet->getCell('H1')->setValue('Ville');

	foreach ($data as $key => $client) {
		$i = $key+2;
		$objSheet->getCell('A'.$i)->setValue($client[0]);
		$objSheet->getCell('B'.$i)->setValue($client[1]);
		$objSheet->getCell('C'.$i)->setValue($client[2]);
		$objSheet->getCell('D'.$i)->setValue($client[3]);
		$objSheet->getCell('E'.$i)->setValue($client[4]);
		$objSheet->getCell('F'.$i)->setValue($client[5]);
		$objSheet->getCell('G'.$i)->setValue($client[6]);
		$objSheet->getCell('H'.$i)->setValue($client[7]);
	}

	$objSheet->getColumnDimension('A')->setAutoSize(true);
	$objSheet->getColumnDimension('B')->setAutoSize(true);
	$objSheet->getColumnDimension('C')->setAutoSize(true);
	$objSheet->getColumnDimension('D')->setAutoSize(true);
	$objSheet->getColumnDimension('E')->setAutoSize(true);
	$objSheet->getColumnDimension('F')->setAutoSize(true);
	$objSheet->getColumnDimension('G')->setAutoSize(true);
	$objSheet->getColumnDimension('H')->setAutoSize(true);

	$objWriter->save('../downloads/'.$name.'.xlsx');
	$objPHPExcel->disconnectWorksheets();
	unset($objWriter, $objPHPExcel);

	return  json_encode($name);
}

function exportLDcmd($data){
	$objPHPExcel = new PHPExcel;
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
	$numberFormat = '#,#0.##;[Red]-#,#0.##';
	$name = 'liste_clients_'.date("Y-m-d_His");
	$objSheet = $objPHPExcel->getActiveSheet();
	$objSheet->setTitle('Liste Produits Pères');

	$objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(12);

	$objSheet->getCell('A1')->setValue('Id Maman');
	$objSheet->getCell('B1')->setValue('Nom');
	$objSheet->getCell('C1')->setValue('Box');
	$objSheet->getCell('D1')->setValue('GSM 1');
	$objSheet->getCell('E1')->setValue('GSM 2');
	$objSheet->getCell('F1')->setValue('Naissance Bébé');
	$objSheet->getCell('G1')->setValue('Adresse');
	$objSheet->getCell('H1')->setValue('Quartier');
	$objSheet->getCell('I1')->setValue('Date');
	$objSheet->getCell('J1')->setValue('Status');

	foreach ($data as $key => $commande) {
		$i = $key+2;
		$objSheet->getCell('A'.$i)->setValue($commande[0]);
		$objSheet->getCell('B'.$i)->setValue($commande[1]);
		$objSheet->getCell('C'.$i)->setValue($commande[2]);
		$objSheet->getCell('D'.$i)->setValue($commande[3]);
		$objSheet->getCell('E'.$i)->setValue($commande[4]);
		$objSheet->getCell('F'.$i)->setValue($commande[5]);
		$objSheet->getCell('G'.$i)->setValue($commande[6]);
		$objSheet->getCell('H'.$i)->setValue($commande[7]);
		$objSheet->getCell('I'.$i)->setValue($commande[8]);
		$objSheet->getCell('J'.$i)->setValue($commande[9]);
	}

	$objSheet->getColumnDimension('A')->setAutoSize(true);
	$objSheet->getColumnDimension('B')->setAutoSize(true);
	$objSheet->getColumnDimension('C')->setAutoSize(true);
	$objSheet->getColumnDimension('D')->setAutoSize(true);
	$objSheet->getColumnDimension('E')->setAutoSize(true);
	$objSheet->getColumnDimension('F')->setAutoSize(true);
	$objSheet->getColumnDimension('G')->setAutoSize(true);
	$objSheet->getColumnDimension('H')->setAutoSize(true);
	$objSheet->getColumnDimension('I')->setAutoSize(true);
	$objSheet->getColumnDimension('J')->setAutoSize(true);

	$objWriter->save('../downloads/'.$name.'.xlsx');
	$objPHPExcel->disconnectWorksheets();
	unset($objWriter, $objPHPExcel);

	return  json_encode($name);
}


?>