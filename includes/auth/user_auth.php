<?php


function get_data_karyawan($no_k) {
	$con = new mysqli("localhost", "root", "", "bmt");
	$sql = $con->query("select * from karyawan where no_k='$no_k'");
	$data = $sql->fetch_array(MYSQLI_ASSOC);

	if(!empty($data)) {
		return $data;
	}
	return NULL;
}

?>