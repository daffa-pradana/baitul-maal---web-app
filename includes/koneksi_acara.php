<?php

 $mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(myqsqli_error($mysqli));

 $no_acara = 0;
 $update = false;
 $headline = '';
 $tgl = '';
 $catatan = '';
 $peserta = '';
 /*INSERT DATA INTO TABLE*/
 if (isset($_POST['save'])){
 	$headline = $_POST['headline'];
 	$tgl = $_POST['tgl'];
 	$catatan = $_POST['catatan'];
 	$peserta = implode(', ', $_POST['peserta']);
 	$mysqli->query("INSERT INTO acara (headline, tgl, catatan, peserta) VALUES('$headline','$tgl','$catatan','$peserta')") or
 			die($mysqli->error);

 	header("location: as-page2.php");
 }
 /*INSERT DATA INTO TABLE*/


/*DELETE RECORD FORM TABLE*/
 if (isset($_GET['delete'])) {
 	$no_acara = $_GET['delete'];
 	$mysqli->query("DELETE FROM acara WHERE no_acara=$no_acara") or die($mysqli->error());

 	header("location: as-page2.php");

 }
 /*DELETE RECORD FORM TABLE*/

 /*EDIT RECORD FROM TABLE*/
 /*GET RECORD FROM TABLE to input form*/
 if (isset($_GET['edit'])){
 	$no_acara = $_GET['edit'];
 	$update = true;
 	$result = $mysqli->query("SELECT * FROM acara WHERE no_acara=$no_acara") or die($mysqli->error());
 	if (count($result)==1){
 		$row = $result->fetch_array();
 		$headline = $row['headline'];
 		$tgl = $row['tgl'];
 		$catatan = $row['catatan'];
 	}
 }
 /*GET RECORD FROM TABLE to input form*/
 /*UPDATE RECORD*/
 if (isset($_POST['update'])){
 	$no_acara = $_POST['no_acara'];
 	$headline = $_POST['headline'];
 	$tgl = $_POST['tgl'];
 	$catatan = $_POST['catatan'];

 	$mysqli->query("UPDATE acara SET headline='$headline', tgl='$tgl', catatan='$catatan' WHERE no_acara=$no_acara") or die($mysqli->error);

 	header('location: as-page2.php');
 }
 /*UPDATE RECORD*/
 /*EDIT RECORD FROM TABLE*/