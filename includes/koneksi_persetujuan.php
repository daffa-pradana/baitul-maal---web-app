<?php

 $mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

 $kd_p = '0';
 $id_n = '0';

 //Enabling submit button
 $submit = false;

 //Data Nasabah
 $nama_n = '';
 $jk_n = '';
 $hp_n = '';
 $nik_n = '';
 $kk_n = '';
 $alamat_n = '';
 $rt_n = '';
 $rw_n = '';
 $kel_n = '';
 $kec_n = '';
 $pos_n = '';
 $agama_n = '';
 $pendidikan_n = '';
 $pekerjaan_n = '';
 $penghasilan_n = '';

 //Survei Kondisi
 $is_ts = '';    
 $ibu_ts = ''; 
 $ayah_ts = '';  
 $anak1_ts = '';   
 $anak2_ts = '';   
 $anak3_ts = '';   
 $cucu1_ts = '';   
 $cucu2_ts = '';   
 $cucu3_ts = '';   
 $lokasi_rs = '';    
 $milik_rs = '';   
 $ukuran_rs = '';    
 $dinding_rs = '';    
 $lantai_rs = '';    
 $atap_rs = '';  
 $pintu_rs = '';   
 $jendela_rs = '';   
 $jamban_rs = '';    
 $toilet_rs = '';    
 //Survei Karakter
 $karakter1_s = '';   
 $karakter2_s = '';    
 $karakter3_s = '';    
 $karakter4_s = '';    
 $karakter5_s = '';    
 $karakter6_s = '';    
 //Survei Usaha
 $bidang_us = '';    
 $produk_us = '';    
 $karyawan_us = '';   
 $jarak_us = '';
 $kondisi1_us = '';
 $kondisi2_us = '';
 $kelola_us = '';  
 $sedia_us = '';
 $pemasok_us = '';
 $saingan_us = '';
 $pengalaman_us = '';
 $rcr_us = '';
 $gm_us = '';    

 if (isset($_GET['select'])){
 		$kd_p = $_GET['select'];
 		// Enabling button
 		$submit = true;
 		// Select from database
 		$result1 = $mysqli->query("SELECT * FROM pembiayaan WHERE kd_p = $kd_p") or die($mysqli->error());
 		if (count($result1)==1){
 			$row1 = $result1->fetch_array();
 			$id_n = $row1['id_n'];

 			//Fetch data from nasabah table
 			$result2 = $mysqli->query("SELECT * FROM nasabah WHERE id_n = $id_n") or die($mysqli->error());
 			if (count($result2)==1){
 				$row2 = $result2->fetch_array();
 				$nama_n = $row2['nama_n'];
 				$jk_n = $row2['jk_n'];
 				$hp_n = $row2['hp_n'];
 				$nik_n = $row2['nik_n'];
 				$kk_n = $row2['kk_n'];
 				$alamat_n = $row2['alamat_n'];
 				$rt_n = $row2['rt_n'];
 				$rw_n = $row2['rw_n'];
 				$kel_n = $row2['kel_n'];
 				$kec_n = $row2['kec_n'];
 				$pos_n = $row2['pos_n'];
 				$agama_n = $row2['agama_n'];
 				$pendidikan_n = $row2['pendidikan_n'];
 				$pekerjaan_n = $row2['pekerjaan_n'];
 				$penghasilan_n = $row2['penghasilan_n'];	
 			}
 			

 			//Fetch data form survei table
 			$result3 = $mysqli->query("SELECT * FROM survei WHERE kd_p = $kd_p") or die($mysqli->error());
 			if (count($result3)==1){
 				//Survei Kondisi
 				$row3 = $result3->fetch_array();
		 		$is_ts = $row3['is_ts'];
		 		$ibu_ts = $row3['ibu_ts'];
		 		$ayah_ts = $row3['ayah_ts'];
		 		$anak1_ts = $row3['anak1_ts'];
		 		$anak2_ts = $row3['anak2_ts'];
		 		$anak3_ts = $row3['anak3_ts'];
		 		$cucu1_ts = $row3['cucu1_ts'];
		 		$cucu2_ts = $row3['cucu2_ts'];
		 		$cucu3_ts = $row3['cucu3_ts'];
		 		$lokasi_rs = $row3['lokasi_rs'];
		 		$milik_rs = $row3['milik_rs'];
		 		$ukuran_rs = $row3['ukuran_rs'];
		 		$dinding_rs = $row3['dinding_rs'];
		 		$lantai_rs = $row3['lantai_rs'];
		 		$atap_rs = $row3['atap_rs'];
		 		$pintu_rs = $row3['pintu_rs'];
		 		$jendela_rs = $row3['jendela_rs'];
		 		$jamban_rs = $row3['jamban_rs'];
		 		$toilet_rs = $row3['toilet_rs'];
		 		//Survei Karakter
		 		$karakter1_s = $row3['karakter1_s'];
		 		$karakter2_s = $row3['karakter2_s'];
		 		$karakter3_s = $row3['karakter3_s'];
		 		$karakter4_s = $row3['karakter4_s'];
		 		$karakter5_s = $row3['karakter5_s'];
		 		$karakter6_s = $row3['karakter6_s'];
		 		//Survei Usaha
		 		$bidang_us = $row3['bidang_us'];
		 		$produk_us = $row3['produk_us'];
		 		$karyawan_us = $row3['karyawan_us'];
		 		$jarak_us = $row3['jarak_us'];
		 		$kondisi1_us = $row3['kondisi1_us'];
		 		$kondisi2_us = $row3['kondisi2_us'];
		 		$kelola_us = $row3['kelola_us'];
		 		$sedia_us = $row3['sedia_us'];
		 		$pemasok_us = $row3['pemasok_us'];
		 		$saingan_us = $row3['saingan_us'];
		 		$pengalaman_us = $row3['pengalaman_us'];
		 		$rcr_us = $row3['rcr_us'];
		 		$gm_us = $row3['gm_us'];
 			}
 		}
	 }
	 
 if (isset($_POST['submit-persetujuan'])) {
	$kd_p = $_POST['kd_p'];
	$survei_kondisi = $_POST['survei_kondisi'];
	$survei_karakter = $_POST['survei_karakter'];
	$survei_usaha = $_POST['survei_usaha'];
	$stat_pers = $_POST['stat_pers'];

	if ($stat_pers == 'disetujui') {
		$mysqli->query("UPDATE pembiayaan SET stat_pers='$stat_pers' WHERE kd_p='$kd_p'") or die ($mysqli->error);
	} else {
		$mysqli->query("UPDATE pembiayaan SET stat_pers='$stat_pers', stat_cair='tidak dicairkan', stat_pemb='tidak berjalan' WHERE kd_p='$kd_p'") or die ($mysqli->error); 
	}

	$mysqli->query("INSERT INTO persetujuan 
								(kd_p,
								survei_kondisi,
								survei_karakter,
								survei_usaha)
								VALUES
								('$kd_p',
								'$survei_kondisi',
								'$survei_karakter',
								'$survei_usaha'
								   )") or die ($mysqli->error);
	header("location: komite-page1.php");
 }
?>