<?php
$mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

// Save button
$save = false;

// Default variable value
$kd_p = '0';
$id_n = '0';
$nominal_p = '';
$jangka_p = '';
$pokok = '';

if (isset($_GET['select'])){
 		$kd_p = $_GET['select'];
 		// Enabling button
 		$save = true;
 		// Select from database
 		$result = $mysqli->query("SELECT * FROM pembiayaan WHERE kd_p = $kd_p") or die($mysqli->error());
 		if (count($result)==1){
 			$row = $result->fetch_array();
 			$kd_p = $row['kd_p'];
 			$id_n = $row['id_n'];
 			$nominal_p = $row['nominal_p'];
 			$jangka_p = $row['jangka_p'];

 			$operation = $nominal_p / $jangka_p ;
 			$pokok = round($operation,0,PHP_ROUND_HALF_UP);

 		}
 	}

if (isset($_POST['save'])){
	$kd_p = $_POST['kd_p'];
	$id_n = $_POST['id_n'];
	$jangka_p = $_POST['jangka_p'];
	$pokok = $_POST['pokok'];
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];

	// insert into database pencairan
	$mysqli->query("INSERT INTO pencairan
						(kd_p,
						id_n,
						jangka_p,
						tgl_awal,
						tgl_akhir,
						pokok)
					VALUES
						('$kd_p',
						'$id_n',
						'$jangka_p',
						'$tgl_awal',
						'$tgl_akhir',
						'$pokok')");

	// insert into database angsuran
	$mysqli->query("INSERT INTO angsuran
						(kd_p,
						id_n,
						pokok,
						jangka_p)
					VALUES
						('$kd_p',
						'$id_n',
						'$pokok',
						'$jangka_p')");

	// insert into database monitoring
	$mysqli->query("INSERT INTO monitoring
						(kd_p,
						id_n,
						jangka_p)
					VALUES
						('$kd_p',
						'$id_n',
						'$jangka_p')");

	$mysqli->query("UPDATE pembiayaan SET stat_cair='sudah dicairkan', stat_pemb='sedang berjalan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir' WHERE kd_p=$kd_p");

	header("location:admin-page1.php");
}




























?>