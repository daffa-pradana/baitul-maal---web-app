<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bmt';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

//Grafik Pembiayaan
$i = 2019;
$berhasil = array();
$gagal = array();
while ($i <= 2030) {

    $sql1 = "SELECT * FROM pembiayaan WHERE tgl_awal LIKE '$i%' AND stat_pemb = 'selesai'";
    $result1 = mysqli_query($mysqli , $sql1);
    $berhasil[] = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM pembiayaan WHERE tgl_awal LIKE '$i%' AND stat_pemb = 'gagal'";
    $result2 = mysqli_query($mysqli , $sql2);
    $gagal[] = mysqli_num_rows($result2);

    $i++;

}

//Data pembiayaan
//Total Pembiayaan
$sql3 = "SELECT * FROM pembiayaan";
$result3 = mysqli_query($mysqli, $sql3);
$total_pemb = mysqli_num_rows($result3);

//Total Lancar
$sql4 = "SELECT * FROM pembiayaan WHERE stat_pemb = 'selesai'";
$result4 = mysqli_query($mysqli, $sql4);
$pemb_lancar = mysqli_num_rows($result4);

//Total bermasalah
$sql5 = "SELECT * FROM pembiayaan WHERE stat_pemb = 'gagal'";
$result5 = mysqli_query($mysqli, $sql5);
$pemb_masalah = mysqli_num_rows($result5);

//Perdagangan
$sql6 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Perdagangan'";
$result6 = mysqli_query($mysqli, $sql6);
$perdagangan = mysqli_num_rows($result6);

//Jasa
$sql7 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Jasa'";
$result7 = mysqli_query($mysqli, $sql7);
$jasa = mysqli_num_rows($result7);

//Kulinari
$sql8 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Kulinari'";
$result8 = mysqli_query($mysqli, $sql8);
$kulinari = mysqli_num_rows($result8);

//Produksi
$sql9 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Produksi'";
$result9 = mysqli_query($mysqli, $sql9);
$produksi = mysqli_num_rows($result9);

//Pertanian
$sql10 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Pertanian'";
$result10 = mysqli_query($mysqli, $sql10);
$pertanian = mysqli_num_rows($result10);

//Peternakan
$sql11 = "SELECT * FROM pembiayaan WHERE bidang_u = 'Peternakakan'";
$result11 = mysqli_query($mysqli, $sql11);
$peternakan = mysqli_num_rows($result11);

//Dana Sosial
//Total Dana yang dicairkan
$sql12 = "SELECT SUM(nominal_p) AS totalDicairkan FROM pembiayaan WHERE stat_cair = 'sudah dicairkan'";
$result12 = mysqli_query($mysqli, $sql12);
$row12 = mysqli_fetch_assoc($result12);
$total_cair = $row12['totalDicairkan'];

//Total Dana yang kembali
$sql13 = "SELECT SUM(total_angsuran) AS totalKembali FROM angsuran";
$result13 = mysqli_query($mysqli, $sql13);
$row13 = mysqli_fetch_assoc($result13);
$total_kembali = $row13['totalKembali'];

//Pembiayaan 2jt
$sql14 = "SELECT * FROM pembiayaan WHERE nominal_p = 2000000";
$result14 = mysqli_query($mysqli, $sql14);
$nominal2jt = mysqli_num_rows($result14);

//Pembiayaan 1jt
$sql15 = "SELECT * FROM pembiayaan WHERE nominal_p = 1000000";
$result15 = mysqli_query($mysqli, $sql15);
$nominal1jt = mysqli_num_rows($result15);

//Presentase dana kembali
$dana_kembali1 = $total_kembali / $total_cair;
$dana_kembali2= round($dana_kembali1,4);
$persen_kembali = $dana_kembali2 *100;

//Presentase nasabah muzakki
$sql16 = "SELECT * FROM nasabah WHERE penghasilan_n ='Rp.4,000,000 - Rp.6,000,000'";
$result16 = mysqli_query($mysqli, $sql16);
$muzakki1 = mysqli_num_rows($result16);
$sql17 = "SELECT * FROM nasabah WHERE penghasilan_n ='Rp.6,000,000 - Rp.10,000,000'";
$result17 = mysqli_query($mysqli, $sql17);
$muzakki2 = mysqli_num_rows($result17);
$sql21 = "SELECT * FROM nasabah WHERE penghasilan_n ='> Rp.10,000,000'";
$result21 = mysqli_query($mysqli, $sql21);
$muzakki3 = mysqli_num_rows($result21);
$muzakki = $muzakki1 + $muzakki2 + $muzakki3;

//Presentase nasabah mustahik
$sql18 = "SELECT * FROM nasabah WHERE penghasilan_n ='< Rp.500,000'";
$result18 = mysqli_query($mysqli, $sql18);
$mustahik1 = mysqli_num_rows($result18);
$sql19 = "SELECT * FROM nasabah WHERE penghasilan_n ='Rp.500,000 - Rp.1,000,000'";
$result19 = mysqli_query($mysqli, $sql19);
$mustahik2 = mysqli_num_rows($result19);
$sql20 = "SELECT * FROM nasabah WHERE penghasilan_n ='Rp.1,000,000 - Rp.4,000,000'";
$result20 = mysqli_query($mysqli, $sql20);
$mustahik3 = mysqli_num_rows($result20);
$mustahik = $mustahik1 + $mustahik2 + $mustahik3;

$persen_muzakki = round((( $muzakki / ( $mustahik + $muzakki )) * 100),2);
$persen_mustahik = round((( $mustahik / ( $mustahik + $muzakki )) * 100),2);

//Total Nasabah Tidak Sekolah
$sql22 = "SELECT * FROM nasabah WHERE pendidikan_n = 'Tidak sekolah'";
$result22 = mysqli_query($mysqli, $sql22);
$ts = mysqli_num_rows($result22);
//Total Nasabah SD
$sql23 = "SELECT * FROM nasabah WHERE pendidikan_n = 'SD'";
$result23 = mysqli_query($mysqli, $sql23);
$sd = mysqli_num_rows($result23);
//Total Nasabah SMP
$sql24 = "SELECT * FROM nasabah WHERE pendidikan_n = 'SMP'";
$result24 = mysqli_query($mysqli, $sql24);
$smp = mysqli_num_rows($result24);
//Total Nasabah SMA
$sql25 = "SELECT * FROM nasabah WHERE pendidikan_n = 'SMA'";
$result25 = mysqli_query($mysqli, $sql25);
$sma = mysqli_num_rows($result25);
//Total Nasabah D3
$sql26 = "SELECT * FROM nasabah WHERE pendidikan_n = 'D3'";
$result26 = mysqli_query($mysqli, $sql26);
$d3 = mysqli_num_rows($result26);
//Total Nasabah S1
$sql27 = "SELECT * FROM nasabah WHERE pendidikan_n = 'S1'";
$result27 = mysqli_query($mysqli, $sql27);
$s1 = mysqli_num_rows($result27);

//Total Nasabah
$sql28 = "SELECT * FROM nasabah WHERE penghasilan_n = '< Rp.500,000'";
$result28 = mysqli_query($mysqli, $sql28);
$p1 = mysqli_num_rows($result28);
//Total Nasabah SD
$sql29 = "SELECT * FROM nasabah WHERE penghasilan_n = 'Rp.500,000 - Rp.1,000,000'";
$result29 = mysqli_query($mysqli, $sql29);
$p2 = mysqli_num_rows($result29);
//Total Nasabah SMP
$sql30 = "SELECT * FROM nasabah WHERE penghasilan_n = 'Rp.1,000,000 - Rp.4,000,000'";
$result30 = mysqli_query($mysqli, $sql30);
$p3 = mysqli_num_rows($result30);
//Total Nasabah SMA
$sql31 = "SELECT * FROM nasabah WHERE penghasilan_n = 'Rp.4,000,000 - Rp.6,000,000'";
$result31 = mysqli_query($mysqli, $sql31);
$p4 = mysqli_num_rows($result31);
//Total Nasabah D3
$sql32 = "SELECT * FROM nasabah WHERE penghasilan_n = 'Rp.6,000,000 - Rp.10,000,000'";
$result32 = mysqli_query($mysqli, $sql32);
$p5 = mysqli_num_rows($result32);
//Total Nasabah S1
$sql33 = "SELECT * FROM nasabah WHERE penghasilan_n = '> Rp.10.000.000'";
$result33 = mysqli_query($mysqli, $sql33);
$p6 = mysqli_num_rows($result33);