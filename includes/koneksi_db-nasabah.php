<?php

 $mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

 $id_n = 0;
 $update = false;
 $foto_n = 'default.png';
 $nama_n = '';
 $jk_n = '';
 $nik_n = '';
 $kk_n = '';
 $alamat_n = '';
 $rt_n = '';
 $rw_n = '';
 $kel_n = '';
 $kec_n = '';
 $pos_n = '';
 $agama_n = '';
 $ibu_n = '';
 $pendidikan_n = '';
 $hp_n = '';
 $is_n = '';
 $pekerjaan_n = '';
 $penghasilan_n = '';
 $bank_n = '';
 $rek_n = '';
 $tgl_n = '';
 


 /*GET RECORD FROM TABLE to input form*/
 if (isset($_GET['show'])){
 	$id_n = $_GET['show'];
 	$update = true;
 	$result = $mysqli->query("SELECT * FROM nasabah WHERE id_n='$id_n'") or die($mysqli->error());
 	if (count($result)==1){
 		$row = $result->fetch_array();
 		$foto_n = $row['foto_n'];
 		$nama_n = $row['nama_n'];
		$jk_n = $row['jk_n'];
		$nik_n = $row['nik_n'];
		$kk_n = $row['kk_n'];
		$alamat_n = $row['alamat_n'];
		$rt_n = $row['rt_n'];
		$rw_n = $row['rw_n'];
		$kel_n = $row['kel_n'];
		$kec_n = $row['kec_n'];
		$pos_n = $row['pos_n'];
		$agama_n = $row['agama_n'];
		$ibu_n = $row['ibu_n'];
		$pendidikan_n = $row['pendidikan_n'];
		$hp_n = $row['hp_n'];
		$is_n = $row['is_n'];
		$pekerjaan_n = $row['pekerjaan_n'];
		$penghasilan_n = $row['penghasilan_n'];
		$bank_n = $row['bank_n'];
		$rek_n = $row['rek_n'];
		$tgl_n = $row['tgl_n'];
 	}
 }
 /*GET RECORD FROM TABLE to input form*/

 /*UPDATE RECORD*/
 if (isset($_POST['update'])){
 	$id_n = $_POST['id_n'];
 	$jk_n = $_POST['jk_n'];
	$nik_n = $_POST['nik_n'];
	$kk_n = $_POST['kk_n'];
	$alamat_n = $_POST['alamat_n'];
	$rt_n = $_POST['rt_n'];
	$rw_n = $_POST['rw_n'];
	$kel_n = $_POST['kel_n'];
	$kec_n = $_POST['kec_n'];
	$pos_n = $_POST['pos_n'];
	$agama_n = $_POST['agama_n'];
	$ibu_n = $_POST['ibu_n'];
	$pendidikan_n = $_POST['pendidikan_n'];
	$hp_n = $_POST['hp_n'];
	$is_n = $_POST['is_n'];
	$pekerjaan_n = $_POST['pekerjaan_n'];
	$penghasilan_n = $_POST['penghasilan_n'];
	$bank_n = $_POST['bank_n'];
	$rek_n = $_POST['rek_n'];


 	$mysqli->query("
 		UPDATE
 			nasabah
 		SET
 			jk_n='$jk_n',
 			nik_n='$nik_n',
 			kk_n='$kk_n',
 			alamat_n='$alamat_n',
 			rt_n='$rt_n',
 			rw_n='$rw_n',
 			kel_n='$kel_n',
 			kec_n='$kec_n',
 			pos_n='$pos_n',
 			agama_n='$agama_n',
 			ibu_n='$ibu_n',
 			pendidikan_n='$pendidikan_n',
 			hp_n='$hp_n',
 			is_n='$is_n',
 			pekerjaan_n='$pekerjaan_n',
 			penghasilan_n='$penghasilan_n',
 			bank_n='$bank_n',
 			rek_n='$rek_n'
 		WHERE
 			id_n=$id_n ") or die($mysqli->error);

 	header('location: teller-page3.php');
 }
  /*UPDATE RECORD*/