<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bmt';

//connection
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Omset
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
//Profit
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
//Harga Pokok
$hp1 = '';
$hp2 = '';
$hp3 = '';
$hp4 = '';
$hp5 = '';
$hp6 = '';
$hp7 = '';
$hp8 = '';
$hp9 = '';
$hp10 = '';
$hp11 = '';
$hp12 = '';
//usaha & pembiayaan
$nama_u = '';
$bentuk_u = '';
$bidang_u = '';
$alamat_u = '';
$jml_kar_u = '';
$nominal_p = '';
$jangka_p = '';
$tgl_awal = '';
$tgl_akhir = '';
$pokok = '';
$stat_pemb = '';
//omset
$omset_stat = '';
$omset_round = '';

if (isset($_GET['preview'])) {
    $kd_p = $_GET['preview'];
    //Get value from monitoring table
	$sql = "SELECT * FROM monitoring WHERE kd_p = $kd_p";
	$result = $conn-> query($sql);
	if ($result-> num_rows > 0){
        $row = $result-> fetch_assoc();
        //Omset
		$m1_o = $row['m1_o'];
        $m2_o = $row['m2_o'];
        $m3_o = $row['m3_o'];
        $m4_o = $row['m4_o'];
        $m5_o = $row['m5_o'];
        $m6_o = $row['m6_o'];
        $m7_o = $row['m7_o'];
        $m8_o = $row['m8_o'];
        $m9_o = $row['m9_o'];
        $m10_o = $row['m10_o'];
        $m11_o = $row['m11_o'];
        $m12_o = $row['m12_o'];
        //Profit
		$m1_p = $row['m1_p'];
        $m2_p = $row['m2_p'];
        $m3_p = $row['m3_p'];
        $m4_p = $row['m4_p'];
        $m5_p = $row['m5_p'];
        $m6_p = $row['m6_p'];
        $m7_p = $row['m7_p'];
        $m8_p = $row['m8_p'];
        $m9_p = $row['m9_p'];
        $m10_p = $row['m10_p'];
        $m11_p = $row['m11_p'];
        $m12_p = $row['m12_p'];
        //Harga Pokok
        $hp1 = $m1_o - $m1_p;
        $hp2 = $m2_o - $m2_p;
        $hp3 = $m3_o - $m3_p;
        $hp4 = $m4_o - $m4_p;
        $hp5 = $m5_o - $m5_p;
        $hp6 = $m6_o - $m6_p;
        $hp7 = $m7_o - $m7_p;
        $hp8 = $m8_o - $m8_p;
        $hp9 = $m9_o - $m9_p;
        $hp10 = $m10_o - $m10_p;
        $hp11 = $m11_o - $m11_p;
        $hp12 = $m12_o - $m12_p;

        if ( $m12_o == 0){
            if ( $m9_o == 0){
                if ( $m6_o == 0){
                    if ($m3_o == 0){
                        $omset_stat = '';
                    } else {
                        $omset_operation = $m3_o - $m1_o;
                        $omset_absolute = abs($omset_operation);
                        $omset_divide = $omset_absolute / $m1_o;
                        $omset_multiply = $omset_divide * 100;
                        $omset_round = round($omset_multiply,2);
                        if ($m3_o > $m1_o){
                            $omset_stat = 'meningkat';
                        }
                        elseif ($m3_o == $m1_o) {
                            $omset_stat = 'tetap';
                        } else {
                            $omset_stat = 'menurun';
                        }
                        
                    }
                } else {
                    $omset_operation = $m6_o - $m1_o;
                    $omset_absolute = abs($omset_operation);
                    $omset_divide = $omset_absolute / $m1_o;
                    $omset_multiply = $omset_divide * 100;
                    $omset_round = round($omset_multiply,2);
                    if ($m6_o > $m1_o){
                        $omset_stat = 'meningkat';
                    }
                    elseif ($m6_o == $m1_o) {
                        $omset_stat = 'tetap';
                    } else {
                        $omset_stat = 'menurun';
                    }
                    
                }
            } else {
                $omset_operation = $m9_o - $m1_o;
                $omset_absolute = abs($omset_operation);
                $omset_divide = $omset_absolute / $m1_o;
                $omset_multiply = $omset_divide * 100;
                $omset_round = round($omset_multiply,2);
                if ($m9_o > $m1_o){
                    $omset_stat = 'meningkat';
                }
                elseif ($m9_o == $m1_o) {
                    $omset_stat = 'tetap';
                } else {
                    $omset_stat = 'menurun';
                }
                
            }
        } else {
            $omset_operation = $m12_o - $m1_o;
            $omset_absolute = abs($omset_operation);
            $omset_divide = $omset_absolute / $m1_o;
            $omset_multiply = $omset_divide * 100;
            $omset_round = round($omset_multiply,2);
            if ($m12_o > $m1_o){
                $omset_stat = 'meningkat';
            }
            elseif ($m12_o == $m1_o) {
                $omset_stat = 'tetap';
            } else {
                $omset_stat = 'menurun';
            }
            
        }
    }
    
    $sql1 = "SELECT * FROM pembiayaan WHERE kd_p = $kd_p";
    $result1 = $conn-> query($sql1);
    if ($result1-> num_rows > 0){
        $row = $result1-> fetch_assoc();
        $nama_u = $row['nama_u'];
        $bentuk_u = $row['bentuk_u'];
        $bidang_u = $row['bidang_u'];
        $jml_kar_u = $row['jml_kar_u'];
        $alamat_u = $row['alamat_u'];
        $nominal_p = $row['nominal_p'];
        $stat_pemb = $row['stat_pemb'];
    }

    $sql2 = "SELECT * FROM pencairan WHERE kd_p = $kd_p";
    $result2 = $conn-> query($sql2);
    if ($result1-> num_rows > 0){
        $row = $result2-> fetch_assoc();
        $jangka_p = $row['jangka_p'];
        $tgl_awal = $row['tgl_awal'];
        $tgl_akhir = $row['tgl_akhir'];
        $pokok = $row['pokok'];
    }
}