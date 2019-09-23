<?php

 $mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

 $id_n = 0;
 
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
 	
 	$result1 = $mysqli->query("SELECT * FROM nasabah WHERE id_n=$id_n") or die($mysqli->error());
 	if (count($result1)==1){
 		$row = $result1->fetch_array();
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
 