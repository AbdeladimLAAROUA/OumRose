<?php

function db_connect(){
	$params = getConnexionParams();

	$hote		=$params['hote'];
	$passDb 	=$params['passDb'];
	$bd 		=$params['bd'];
	$user		=$params['user'];


	$connexion = new PDO('mysql:host='.$hote.';dbname='.$bd.';charset=utf8', $user, $passDb);

	return $connexion;
}

function getConnexionParams(){
	$array = array();

	/*Local Kindy*/

/*	$array['hote']		= 'localhost';
	$array['passDb'] 	= 'S3cr3T%44';
	$array['bd'] 		= 'oumdev_leads';
	$array['user']		= 'root';*/
	
	/*Local*/

	$array['hote']		= 'localhost';
	$array['passDb'] 	= '';
	$array['bd'] 		= 'oumdev_leads';
	$array['user']		= 'root';
	
	/*Distant*/

/*	$array['hote']		= 'localhost';
	$array['passDb'] 	= 'oumdev';
	$array['bd'] 		= 'id709237_oumdev_leads';
	$array['user']		= 'id709237_oumdev';*/
	
	/*oumtest*/
	
/*	$array['hote']		= 'sql.k4mshost.odns.fr';
	$array['passDb'] 	= '!!oumb0x';
	$array['bd'] 		= 'k4mshost_oumdev';
	$array['user']		= 'k4mshost_oumdev';*/

	return $array;
}