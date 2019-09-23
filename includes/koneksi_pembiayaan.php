<?php

$mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(mysqli_error($mysqli));

if (isset($_POST['pembiayaan-submit-btn'])) {
	$id_n = $_POST['id_n'];
	$nominal_p = $_POST['nominal_p'];
	$jangka_p = $_POST['jangka_p'];
	$bentuk_u = $_POST['bentuk_u'];
	$nama_u = $_POST['nama_u'];
	$bidang_u = $_POST['bidang_u'];
	$lama_u = $_POST['lama_u'];
	$jml_kar_u = $_POST['jml_kar_u'];
	$alamat_u = $_POST['alamat_u'];
	$stat_tmpt_u = $_POST['stat_tmpt_u'];
	$omset_u = $_POST['omset_u'];
	$laba_u = $_POST['laba_u'];
	$stat_surv = 'belum disurvei';
	$stat_pers = 'belum disetujui';
	$stat_cair = 'belum dicairkan';
	$stat_pemb = 'belum berjalan';

	$mysqli->query("INSERT INTO pembiayaan (
		id_n,
		nominal_p,
		jangka_p,
		bentuk_u,
		nama_u,
		bidang_u,
		lama_u,
		jml_kar_u,
		alamat_u,
		stat_tmpt_u,
		omset_u,
		laba_u,
		stat_surv,
		stat_pers,
		stat_cair,
		stat_pemb
		)VALUES(
		'$id_n',
		'$nominal_p',
		'$jangka_p',
		'$bentuk_u',
		'$nama_u',
		'$bidang_u',
		'$lama_u',
		'$jml_kar_u',
		'$alamat_u',
		'$stat_tmpt_u',
		'$omset_u',
		'$laba_u',
		'$stat_surv',
		'$stat_pers',
		'$stat_cair',
		'$stat_pemb'
		)") or die($mysqli->error);

	header("location: teller-page2.php");
}