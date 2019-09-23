<?php
$mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

	// Save button
	$save = false;
	// Default variable value
 	$kd_p = '0';
 	
 	if (isset($_GET['select'])){
 		$kd_p = $_GET['select'];
 		// Enabling button
 		$save = true;
 		// Select from database
 		$result = $mysqli->query("SELECT * FROM pembiayaan WHERE kd_p = $kd_p") or die($mysqli->error());
 		if (count($result)==1){
 			$row = $result->fetch_array();
 			$kd_p = $row['kd_p'];
 		}
 	}
 	
 	if (isset($_POST['save'])){

 		$kd_p = $_POST['kd_p'];
 		//Survei Kondisi
 		$is_ts = $_POST['is_ts'];
 		$ibu_ts = $_POST['ibu_ts'];
 		$ayah_ts = $_POST['ayah_ts'];
 		$anak1_ts = $_POST['anak1_ts'];
 		$anak2_ts = $_POST['anak2_ts'];
 		$anak3_ts = $_POST['anak3_ts'];
 		$cucu1_ts = $_POST['cucu1_ts'];
 		$cucu2_ts = $_POST['cucu2_ts'];
 		$cucu3_ts = $_POST['cucu3_ts'];
 		$lokasi_rs = $_POST['lokasi_rs'];
 		$milik_rs = $_POST['milik_rs'];
 		$ukuran_rs = $_POST['ukuran_rs'];
 		$dinding_rs = $_POST['dinding_rs'];
 		$lantai_rs = $_POST['lantai_rs'];
 		$atap_rs = $_POST['atap_rs'];
 		$pintu_rs = $_POST['pintu_rs'];
 		$jendela_rs = $_POST['jendela_rs'];
 		$jamban_rs = $_POST['jamban_rs'];
 		$toilet_rs = $_POST['toilet_rs'];
 		//Survei Karakter
 		$karakter1_s = $_POST['karakter1_s'];
 		$karakter2_s = $_POST['karakter2_s'];
 		$karakter3_s = $_POST['karakter3_s'];
 		$karakter4_s = $_POST['karakter4_s'];
 		$karakter5_s = $_POST['karakter5_s'];
 		$karakter6_s = $_POST['karakter6_s'];
 		//Survei Usaha
 		$bidang_us = $_POST['bidang_us'];
 		$produk_us = $_POST['produk_us'];
 		$karyawan_us = $_POST['karyawan_us'];
 		$jarak_us = $_POST['jarak_us'];
 		$kondisi1_us = $_POST['kondisi1_us'];
 		$kondisi2_us = $_POST['kondisi2_us'];
 		$kelola_us = $_POST['kelola_us'];
 		$sedia_us = $_POST['sedia_us'];
 		$pemasok_us = $_POST['pemasok_us'];
 		$saingan_us = $_POST['saingan_us'];
 		$pengalaman_us = $_POST['pengalaman_us'];
 		$rcr_us = $_POST['rcr_us'];
 		$gm_us = $_POST['gm_us'];

 		//Insert into database
	 	$mysqli->query("INSERT INTO survei 
	 		(kd_p,
	 		 is_ts,
	 		 ibu_ts,
	 		 ayah_ts,
	 		 anak1_ts,
	 		 anak2_ts,
	 		 anak3_ts,
	 		 cucu1_ts,
	 		 cucu2_ts,
	 		 cucu3_ts,
	 		 lokasi_rs,
	 		 milik_rs,
	 		 ukuran_rs,
	 		 dinding_rs,
	 		 lantai_rs,
	 		 atap_rs,
	 		 pintu_rs,
	 		 jendela_rs,
	 		 jamban_rs,
	 		 toilet_rs,
	 		 karakter1_s,
	 		 karakter2_s,
	 		 karakter3_s,
	 		 karakter4_s,
	 		 karakter5_s,
	 		 karakter6_s,
	 		 bidang_us,
	 		 produk_us,
	 		 karyawan_us,
	 		 jarak_us,
	 		 kondisi1_us,
	 		 kondisi2_us,
	 		 kelola_us,
	 		 sedia_us,
	 		 pemasok_us,
	 		 saingan_us,
	 		 pengalaman_us,
	 		 rcr_us,
	 		 gm_us)
	 		 VALUES
	 		('$kd_p',
	 		 '$is_ts',
	 		 '$ibu_ts',
	 		 '$ayah_ts',
	 		 '$anak1_ts',
	 		 '$anak2_ts',
	 		 '$anak3_ts',
	 		 '$cucu1_ts',
	 		 '$cucu2_ts',
	 		 '$cucu3_ts',
	 		 '$lokasi_rs',
	 		 '$milik_rs',
	 		 '$ukuran_rs',
	 		 '$dinding_rs',
	 		 '$lantai_rs',
	 		 '$atap_rs',
	 		 '$pintu_rs',
	 		 '$jendela_rs',
	 		 '$jamban_rs',
	 		 '$toilet_rs',
	 		 '$karakter1_s',
	 		 '$karakter2_s',
	 		 '$karakter3_s',
	 		 '$karakter4_s',
	 		 '$karakter5_s',
	 		 '$karakter6_s',
	 		 '$bidang_us',
	 		 '$produk_us',
	 		 '$karyawan_us',
	 		 '$jarak_us',
	 		 '$kondisi1_us',
	 		 '$kondisi2_us',
	 		 '$kelola_us',
	 		 '$sedia_us',
	 		 '$pemasok_us',
	 		 '$saingan_us',
	 		 '$pengalaman_us',
	 		 '$rcr_us',
	 		 '$gm_us')") or
	 			die($mysqli->error);

	 	//Set stat_survei = sudah disurvei
	 	$sudah = 'sudah disurvei';
	 	$mysqli->query("UPDATE pembiayaan SET stat_surv = '$sudah' WHERE kd_p = $kd_p") or die($mysqli->error);

	 	//Redirect
	 	header("location: ao-page2.php");
	 }


?>