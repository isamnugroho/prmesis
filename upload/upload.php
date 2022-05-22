<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	// $new_image_name = "newimage_".mt_rand().".jpg";

	// move_uploaded_file($_FILES["file"]["tmp_name"], 'server/upload/'.$new_image_name);
	// echo $new_image_name ;
	
	print_r($_REQUEST);
	print_r($_FILES);
	
	// $wsid = $_REQUEST['wsid'];
	// $name = $_REQUEST['name'];
	// if($wsid!=="") {
		// $dir = "server/upload/".$wsid;
		// if( is_dir($dir) === false ) {
			// mkdir($dir);
		// }
		
		// // Set new file name
		// $new_image_name = $name.".jpg";
		
		// // upload file
		// move_uploaded_file($_FILES["file"]["tmp_name"], $dir.'/'.$new_image_name);

		// echo "\n".$new_image_name;
	// }
	
	
	
	
	
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	
	$thn = date("Y");
	$bln = $bulan[(int)date("m")];
	$idatm = $_REQUEST['atm_id'];
	$idticket = $_REQUEST['ticket_id'];
	
	echo $thn." ".$bln;
	
	$dir_tahun = "documentation/".$thn;
	$dir_bulan = $dir_tahun."/".$bln;
	$dir_idatm = $dir_tahun."/".$bln."/".$idatm;
	$dir_idticket = $dir_tahun."/".$bln."/".$idatm."/".$idticket;
	if( is_dir($dir_tahun) === false ) {
		mkdir($dir_tahun);
	}
	if( is_dir($dir_bulan) === false ) {
		mkdir($dir_bulan);
	}
	if( is_dir($dir_idatm) === false ) {
		mkdir($dir_idatm);
	}
	if( is_dir($dir_idticket) === false ) {
		mkdir($dir_idticket);
	}
	$new_image_name = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"], $dir_idticket.'/'.$new_image_name);
	
	
	