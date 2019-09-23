<?php

$mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(mysqli_error($mysqli));

if (isset($_POST['nasabah-submit-btn'])) {
	$nama_n = $_POST['nama_n'];
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
	//FOTO NASABAH
	$target = "foto_nasabah/".basename($_FILES['foto_n']['name']);
	$foto_n = $_FILES['foto_n']['name'];
	move_uploaded_file($_FILES['foto_n']['tmp_name'], $target);
	//KTP NASABAH
	$temp2 = explode(".", $_FILES['ktp_n']['name']);
	$extension2 = end($temp2);
	$ktp_n = $_FILES['ktp_n']["name"];
	move_uploaded_file($_FILES['ktp_n']['tmp_name'], "ktp_nasabah/" .$_FILES['ktp_n']['name']);
	//BUKU NIKAH
	$allowedExts = array("pdf");
	$temp1 = explode(".", $_FILES['bknikah_n']['name']);
	$extension1 = end($temp1);
	$bknikah_n = $_FILES['bknikah_n']['name'];
	move_uploaded_file($_FILES['bknikah_n']['tmp_name'], "bknikah_nasabah/" .$_FILES['bknikah_n']['name']);

	$mysqli->query("INSERT INTO nasabah (
		nama_n,
		jk_n,
		nik_n,
		kk_n,
		alamat_n,
		rt_n,
		rw_n,
		kel_n,
		kec_n,
		pos_n,
		agama_n,
		ibu_n,
		pendidikan_n,
		hp_n,
		is_n,
		pekerjaan_n,
		penghasilan_n,
		bank_n,
		rek_n,
		foto_n,
		ktp_n,
		bknikah_n
		)VALUES(
		'$nama_n',
		'$jk_n',
		'$nik_n',
		'$kk_n',
		'$alamat_n',
		'$rt_n',
		'$rw_n',
		'$kel_n',
		'$kec_n',
		'$pos_n',
		'$agama_n',
		'$ibu_n',
		'$pendidikan_n',
		'$hp_n',
		'$is_n',
		'$pekerjaan_n',
		'$penghasilan_n',
		'$bank_n',
		'$rek_n',
		'$foto_n',
		'$ktp_n',
		'$bknikah_n'
		)") or die($mysqli->error);

	header("location: teller-page1.php");
}