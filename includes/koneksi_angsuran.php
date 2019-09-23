<?php
	$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));

	$update = false;

	$id_n = '0';
	$kd_p = '0';
	$jangka_p = '';
	$tgl_awal = '';
	$tgl_akhir = '';
	$nominal_p = '';
	$nama_u = '';
	$nama_n = '';
	$pokok = '';
	// variable angsuran
	$a1 = '';
 	$a2 = '';
 	$a3 = '';
 	$a4 = '';
 	$a5 = '';
 	$a6 = '';
 	$a7 = '';
 	$a8 = '';
 	$a9 = '';
 	$a10 = '';
 	$a11 = '';
 	$a12 = '';
 	// variable monitoring
 	$m1_o = '';
 	$m2_o = '';
 	$m3_o = '';
 	$m4_o = '';
 	$m5_o = '';
 	$m6_o = '';
 	$m7_o = '';
 	$m8_o = '';
 	$m9_o = '';
 	$m10_o = '';
 	$m11_o = '';
 	$m12_o = '';
 	$m1_p = '';
 	$m2_p = '';
	$m3_p = '';
	$m4_p = '';
	$m5_p = '';
	$m6_p = '';
	$m7_p = '';
	$m8_p = '';
	$m9_p = '';
	$m10_p = '';
	$m11_p = '';
	$m12_p = '';

	if (isset($_GET['select'])){
 		$kd_p = $_GET['select'];
 		// Enabling button
 		$update = true;
 		// Select from database
 		$result1 = $mysqli->query("SELECT * FROM pembiayaan WHERE kd_p = $kd_p") or die($mysqli->error());
 		if (count($result1)==1){
 			$row1 = $result1->fetch_array();
 			$kd_p = $row1['kd_p'];
 			$id_n = $row1['id_n'];
 			$nama_u = $row1['nama_u'];
 			$nominal_p = $row1['nominal_p'];
 			$jangka_p = $row1['jangka_p'];

 			$result2 = $mysqli->query("SELECT * FROM nasabah WHERE id_n = $id_n") or die($mysqli->error());
 			if (count($result2)==1){
 				$row2 = $result2->fetch_array();
 				$nama_n = $row2['nama_n'];
 			}

 			$result3 = $mysqli->query("SELECT * FROM pencairan WHERE kd_p = $kd_p") or die($mysqli->error());
 			if (count($result3)==1){
 				$row3 = $result3->fetch_array();
 				$tgl_awal = $row3['tgl_awal'];
 				$tgl_akhir = $row3['tgl_akhir'];
 				$pokok = $row3['pokok'];
 			}

 			$result4 = $mysqli->query("SELECT * FROM angsuran WHERE kd_p = $kd_p") or die($mysqli->error());
 			if (count($result4)==1){
 				$row4 = $result4->fetch_array();
 				$a1 = $row4['a1'];
 				$a2 = $row4['a2'];
 				$a3 = $row4['a3'];
 				$a4 = $row4['a4'];
 				$a5 = $row4['a5'];
 				$a6 = $row4['a6'];
 				$a7 = $row4['a7'];
 				$a8 = $row4['a8'];
 				$a9 = $row4['a9'];
 				$a10 = $row4['a10'];
 				$a11 = $row4['a11'];
 				$a12 = $row4['a12'];
 			}

 			$result5 = $mysqli->query("SELECT * FROM monitoring WHERE kd_p = $kd_p")or die($mysqli->error());
 			if (count($result5)==1){
 				$row5 = $result5->fetch_array();
 				$m1_o = $row5['m1_o'];
 				$m2_o = $row5['m2_o'];
 				$m3_o = $row5['m3_o'];
 				$m4_o = $row5['m4_o'];
 				$m5_o = $row5['m5_o'];
 				$m6_o = $row5['m6_o'];
 				$m7_o = $row5['m7_o'];
 				$m8_o = $row5['m8_o'];
 				$m9_o = $row5['m9_o'];
 				$m10_o = $row5['m10_o'];
 				$m11_o = $row5['m11_o'];
 				$m12_o = $row5['m12_o'];
 				$m1_p = $row5['m1_p'];
 				$m2_p = $row5['m2_p'];
				$m3_p = $row5['m3_p'];
				$m4_p = $row5['m4_p'];
				$m5_p = $row5['m5_p'];
				$m6_p = $row5['m6_p'];
				$m7_p = $row5['m7_p'];
				$m8_p = $row5['m8_p'];
				$m9_p = $row5['m9_p'];
				$m10_p = $row5['m10_p'];
				$m11_p = $row5['m11_p'];
				$m12_p = $row5['m12_p'];
 			}
 		}
 	}

	if (isset($_POST['update'])){
		$kd_p = $_POST['kd_p'];

		//Update Angsuran
		$a1 = $_POST['a1'];
 		$a2 = $_POST['a2'];
 		$a3 = $_POST['a3'];
 		$a4 = $_POST['a4'];
 		$a5 = $_POST['a5'];
 		$a6 = $_POST['a6'];
 		$a7 = $_POST['a7'];
 		$a8 = $_POST['a8'];
 		$a9 = $_POST['a9'];
 		$a10 = $_POST['a10'];
 		$a11 = $_POST['a11'];
 		$a12 = $_POST['a12'];
 		$mysqli->query("UPDATE 
 							angsuran 
 						SET 
 							a1='$a1',
 							a2='$a2',
 							a3='$a3',
 							a4='$a4',
 							a5='$a5',
 							a6='$a6',
 							a7='$a7',
 							a8='$a8',
 							a9='$a9',
 							a10='$a10',
 							a11='$a11',
 							a12='$a12' 
 						WHERE
 							kd_p='$kd_p'");

 		//monitoring
 		$m1_o = $_POST['m1_o'];
 		$m2_o = $_POST['m2_o'];
 		$m3_o = $_POST['m3_o'];
 		$m4_o = $_POST['m4_o'];
 		$m5_o = $_POST['m5_o'];
 		$m6_o = $_POST['m6_o'];
 		$m7_o = $_POST['m7_o'];
 		$m8_o = $_POST['m8_o'];
 		$m9_o = $_POST['m9_o'];
 		$m10_o = $_POST['m10_o'];
 		$m11_o = $_POST['m11_o'];
 		$m12_o = $_POST['m12_o'];
 		$m1_p = $_POST['m1_p'];
 		$m2_p = $_POST['m2_p'];
		$m3_p = $_POST['m3_p'];
		$m4_p = $_POST['m4_p'];
		$m5_p = $_POST['m5_p'];
		$m6_p = $_POST['m6_p'];
		$m7_p = $_POST['m7_p'];
		$m8_p = $_POST['m8_p'];
		$m9_p = $_POST['m9_p'];
		$m10_p = $_POST['m10_p'];
		$m11_p = $_POST['m11_p'];
		$m12_p = $_POST['m12_p'];
		$mysqli->query("UPDATE 
 							monitoring 
 						SET 
 							m1_o='$m1_o',
 							m2_o='$m2_o',
 							m3_o='$m3_o',
 							m4_o='$m4_o',
 							m5_o='$m5_o',
 							m6_o='$m6_o',
 							m7_o='$m7_o',
 							m8_o='$m8_o',
 							m9_o='$m9_o',
 							m10_o='$m10_o',
 							m11_o='$m11_o',
 							m12_o='$m12_o',
 							m1_p='$m1_p',
 							m2_p='$m2_p',
 							m3_p='$m3_p',
 							m4_p='$m4_p',
 							m5_p='$m5_p',
 							m6_p='$m6_p',
 							m7_p='$m7_p',
 							m8_p='$m8_p',
 							m9_p='$m9_p',
 							m10_p='$m10_p',
 							m11_p='$m11_p',
 							m12_p='$m12_p'
 						WHERE
 							kd_p='$kd_p'");

	header("location:ao-page3.php");
	}

	if (isset($_POST['selesai'])){
		$kd_p = $_POST['kd_p'];
		$nominal_p  = $_POST['nominal_p'];

		$result6 = $mysqli->query("SELECT * FROM angsuran WHERE kd_p='$kd_p'");
		if (count($result6)==1){
 				$row6 = $result6->fetch_array();
 				$pokok = $row6['pokok'];
 				$a1 = $row6['a1'];
		 		$a2 = $row6['a2'];
		 		$a3 = $row6['a3'];
		 		$a4 = $row6['a4'];
		 		$a5 = $row6['a5'];
		 		$a6 = $row6['a6'];
		 		$a7 = $row6['a7'];
		 		$a8 = $row6['a8'];
		 		$a9 = $row6['a9'];
		 		$a10 = $row6['a10'];
		 		$a11 = $row6['a11'];
		 		$a12 = $row6['a12'];

				$total_angsuran = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12;
				
		 		if ($total_angsuran > $nominal_p) {
					$total_simpanan = $total_angsuran - $nominal_p;
					$mysqli->query("UPDATE pembiayaan SET stat_pemb='selesai' WHERE kd_p='$kd_p'");
					$mysqli->query("UPDATE angsuran SET total_angsuran=$nominal_p, total_simpanan=$total_simpanan WHERE kd_p='$kd_p'");		
		 		} else {
					$mysqli->query("UPDATE pembiayaan SET stat_pemb='gagal' WHERE kd_p='$kd_p'");
					$mysqli->query("UPDATE angsuran SET total_angsuran=$total_angsuran WHERE kd_p='$kd_p'");
		 		}
 			}
		
 		  
	header("location:ao-page3.php");
	}































?>