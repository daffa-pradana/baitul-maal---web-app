<?php

 $mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));
 $msg = "";
 $no_k = 0;
 $update = false;
 $nama_k = '';
 $email_k = '';
 $pass_k = '';
 $jk_k = '';
 $jabatan_k = '';
 $nik_k = '';
 $npwp_k = '';
 $kk_k = '';
 $hp_k = '';
 $status_k = '';
 /*INSERT DATA INTO TABLE*/
 if (isset($_POST['save'])){
 	$nama_k	= $_POST['nama_k'];
 	$email_k = $_POST['email_k'];
 	$pass_k = $_POST['pass_k'];
 	$jk_k = $_POST['jk_k'];
 	$jabatan_k = $_POST['jabatan_k'];
 	$nik_k = $_POST['nik_k'];
 	$npwp_k = $_POST['npwp_k'];
 	$kk_k = $_POST['kk_k'];
 	$hp_k = $_POST['hp_k'];
 	$status_k = $_POST['status_k'];
 	//FOTO Karyawan
 	$target = "foto_karyawan/".basename($_FILES['foto_k']['name']);
 	$foto_k = $_FILES['foto_k']['name'];

 	//$peserta = implode(', ', $_POST['peserta']);
 	$mysqli->query("INSERT INTO karyawan (nama_k, email_k, pass_k, jk_k, jabatan_k, nik_k, npwp_k, kk_k, hp_k, status_k, foto_k) VALUES('$nama_k','$email_k','$pass_k','$jk_k','$jabatan_k','$nik_k','$npwp_k','$kk_k','$hp_k','$status_k','$foto_k')") or
 			die($mysqli->error);

 	//MOVE FOTO INTO ROOT FOLDER
 	if (move_uploaded_file($_FILES['foto_k']['tmp_name'], $target)){
			$msg = "image uploaded successfully";
		} else {
			$msg = "There was a problem uploading image";
		}

 	header("location: as-page1.php");
 }
 /*INSERT DATA INTO TABLE*/


/*DELETE RECORD FORM TABLE*/
 if (isset($_GET['delete'])) {
 	$no_k = $_GET['delete'];
 	$mysqli->query("DELETE FROM karyawan WHERE no_k=$no_k") or die($mysqli->error());

 	header("location: as-page1.php");

 }
 /*DELETE RECORD FORM TABLE*/

 /*EDIT RECORD FROM TABLE*/
 /*GET RECORD FROM TABLE to input form*/
 if (isset($_GET['edit'])){
 	$no_k = $_GET['edit'];
 	$update = true;
 	$result = $mysqli->query("SELECT * FROM karyawan WHERE no_k=$no_k") or die($mysqli->error());
 	if (count($result)==1){
 		$row = $result->fetch_array();
 		$nama_k = $row['nama_k'];
 		$email_k = $row['email_k'];
 		$pass_k = $row['pass_k'];
 		$jabatan_k = $row['jabatan_k'];
 		$nik_k = $row['nik_k'];
 		$npwp_k = $row['npwp_k'];
 		$kk_k = $row['kk_k'];
 		$hp_k = $row['hp_k'];
 		$status_k = $row['status_k'];
 	}
 }
 /*GET RECORD FROM TABLE to input form*/
 /*UPDATE RECORD*/
 if (isset($_POST['update'])){
 	$no_k = $_POST['no_k'];
 	$nama_k = $_POST['nama_k'];
 	$email_k = $_POST['email_k'];
 	$pass_k = $_POST['pass_k'];
 	$jabatan_k = $_POST['jabatan_k'];
 	$nik_k = $_POST['nik_k'];
 	$npwp_k = $_POST['npwp_k'];
 	$kk_k = $_POST['kk_k'];
 	$hp_k = $_POST['hp_k'];
 	$status_k = $_POST['status_k'];

 	$mysqli->query("UPDATE karyawan SET nama_k='$nama_k', email_k='$email_k', pass_k='$pass_k', jabatan_k='$jabatan_k', nik_k='$nik_k', npwp_k='$npwp_k', kk_k='$kk_k', hp_k='$hp_k', status_k='$status_k' WHERE no_k=$no_k") or die($mysqli->error);

 	header('location: as-page1.php');
 }
 /*UPDATE RECORD*/
 /*EDIT RECORD FROM TABLE*/