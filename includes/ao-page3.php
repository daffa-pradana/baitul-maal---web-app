<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['ao'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['ao'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="ao.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="aos.css">
</head>
<body>
	<!--Navbar-->
	<nav>
		<ul class="navbar-left">
			<li>
				<a href="#" class="logo"><img src="../src/img/logo-merah.png"></a><!--Navbar logo-->
			</li>
			<li>
				<!--User profile-->
				<div class="profile-box">
					<table>
					  <tr>
					    <td><img src="<?="foto_karyawan/".$data_karyawan['foto_k'];?>"></td>
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">Account Officer</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu menu1">
					<a href="ao-page1.php" class="passive"><img src="../src/img/menu-icon/database-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="ao-page2.php" class="passive"><img src="../src/img/menu-icon/verif-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="ao-page3.php" class="active"><img src="../src/img/menu-icon/savings-red.svg"></a>
				</li>
				<li class="menu menu3">
					<a href="ao-page4.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
				</li>
				<li class="keluar">
					<a href="logout.php" class="passive"><img src="../src/img/menu-icon/keluar-white.svg"></a>
				</li>
			</div>
			<!--End of Navbar menu-->
		</ul>
	</nav>
	<!--End of Navbar-->
	<!--Main content-->
	<main>
		<section class="section1 angsuran">
			<div data-aos="fade-right"><p>Form Angsuran</p></div>
			<hr>
		</section>
		<section class="section2 angsuran-area">
			<!-- database connection -->
			<?php
				require_once 'koneksi_angsuran.php';
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM pembiayaan WHERE stat_pemb = 'sedang berjalan'") or die($mysqli->error); 
			?>
			<!-- database connection -->
			<div class="db-pemb-berjalan-area">
				<table class="table db-pemb-table">
					<thead>
						<tr>
							<th class="db-pemb-kd_p">KD.Pemb</th>
							<th class="db-pemb-id_n">ID.Nasabah</th>
							<th class="db-pemb-stat_pemb">Status Pembayaran</th>
							<th class="act-pemb"></th>
						</tr>
					</thead>
					<!--AUTO INCREMENT TABLE-->
					<?php
						while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
							<tr class="pemb-record">
								<td class="db-pemb-kd_p"><?php echo $row['kd_p']; ?></td>
								<td class="db-pemb-id_n"><?php echo $row['id_n']; ?></td>
								<td class="db-pemb-stat_pemb"><?php echo $row['stat_pemb']; ?></td>
								<td class="act-pemb act-pemb-record">
									<a href="ao-page3.php?select=<?php echo $row['kd_p']; ?>" class="select-btn">Pilih</a><!--EDIT button-->
								</td>
							</tr>
					<?php endwhile; ?>
					<!--AUTO INCREMENT TABLE-->
				</table>
			</div>
			<?php
				function pre_r($array) {
					echo '<pre>';
					print_r($array);
					echo '</pre>';
				}
			?>
			<div class="form-angsuran-area">
				<form method="post" action="koneksi_angsuran.php">
					<!-- profile pembiayaan -->
					<div class="form-angsuran-border">
						<table>
							<tr>
								<td class="form-profile-label">Nasabah (id)</td>
								<td class="form-profile-record">
									<?php if ($id_n == '0') :?>
										:
									<?php else: ?>
										:&nbsp;<?php echo $nama_n;?>&nbsp;(<?php echo $id_n;?>)
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="form-profile-label">Pembiayaan (kd)</td>
								<td class="form-profile-record">
									<?php if ($kd_p == '0') :?>
										:
									<?php else: ?>
										:&nbsp;<?php echo $nama_u;?>&nbsp;(<?php echo $kd_p;?>)
										<input type="hidden" name="kd_p" value="<?php echo $kd_p;?>">
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="form-profile-label">Jangka</td>
								<td class="form-profile-record">
									<?php if ($jangka_p == '') :?>
										:
									<?php else: ?>
										:&nbsp;<?php echo $jangka_p; ?>&nbsp;Bulan
										<input type="hidden" name="jangka_p" value="<?php echo $jangka_p;?>">
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="form-profile-label">Tanggal</td>
								<td class="form-profile-record">
									<?php if ($tgl_awal == '') :?>
										:
									<?php else: ?>
										:&nbsp;<?php echo $tgl_awal; ?>&nbsp;&nbsp;s/d&nbsp;&nbsp;<?php echo $tgl_akhir; ?>		
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="form-profile-label">Nominal</td>
								<td class="form-profile-record">
									<?php if ($nominal_p == '') :?>
										:
									<?php else: ?>
										:&nbsp;Rp.&nbsp;<?php echo $nominal_p; ?>
										<input type="hidden" name="nominal_p" value="<?php echo $nominal_p;?>">
									<?php endif; ?>		
								</td>
							</tr>
						</table>
					</div>
					<!-- profile pembiayaan -->
					<!-- tabel angsuran -->
					<div class="angsuran-table-area">
						<!-- apabila jangka waktu = 12 bulan -->
						<?php if ($jangka_p == '12'):?>
							<table class="angsuran-table">
								<thead>
									<tr>
										<th class="angsuran-no">Angsuran</th>
										<th class="angsuran-pokok">Pokok</th>
										<th class="angsuran-nominal">Nominal Angsuran</th>
										<th class="monitoring-omset">Omset</th>
										<th class="monitoring-profit">Profit</th>
									</tr>
								</thead>
								<!-- Angsuran ke 1/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">1</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a1" value="<?php echo $a1;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m1_o" value="<?php echo $m1_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m1_p" value="<?php echo $m1_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 2/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">2</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a2" value="<?php echo $a2;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m2_o" value="<?php echo $m2_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m2_p" value="<?php echo $m2_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 3/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">3</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a3" value="<?php echo $a3;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m3_o" value="<?php echo $m3_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m3_p" value="<?php echo $m3_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 4/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">4</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a4" value="<?php echo $a3;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m4_o" value="<?php echo $m4_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m4_p" value="<?php echo $m4_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 5/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">5</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a5" value="<?php echo $a5;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m5_o" value="<?php echo $m5_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m5_p" value="<?php echo $m5_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 6/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">6</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a6" value="<?php echo $a6;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m6_o" value="<?php echo $m6_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m6_p" value="<?php echo $m6_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 7/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">7</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a7" value="<?php echo $a7;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m7_o" value="<?php echo $m7_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m7_p" value="<?php echo $m7_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 8/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">8</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a8" value="<?php echo $a8;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m8_o" value="<?php echo $m8_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m8_p" value="<?php echo $m8_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 9/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">9</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9" value="<?php echo $a9;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o" value="<?php echo $m9_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p" value="<?php echo $m9_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 10/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">10</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a10" value="<?php echo $a10;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m10_o" value="<?php echo $m10_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m10_p" value="<?php echo $m10_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 11/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">11</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a11" value="<?php echo $a11;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m11_o" value="<?php echo $m11_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m11_p" value="<?php echo $m11_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 12/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">12</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a12" value="<?php echo $a12;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m12_o" value="<?php echo $m12_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m12_p" value="<?php echo $m12_p;?>">
									</td>
								</tr>
							</table>
						<!-- apabila jangka waktu = 9 bulan -->
						<?php elseif ($jangka_p == '9'):?>
							<table class="angsuran-table">
								<thead>
									<tr>
										<th class="angsuran-no">Angsuran</th>
										<th class="angsuran-pokok">Pokok</th>
										<th class="angsuran-nominal">Nominal Angsuran</th>
										<th class="monitoring-omset">Omset</th>
										<th class="monitoring-profit">Profit</th>
									</tr>
								</thead>
								<!-- Angsuran ke 1/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">1</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a1" value="<?php echo $a1;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m1_o" value="<?php echo $m1_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m1_p" value="<?php echo $m1_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 2/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">2</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a2" value="<?php echo $a2;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m2_o" value="<?php echo $m2_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m2_p" value="<?php echo $m2_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 3/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">3</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a3" value="<?php echo $a3;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m3_o" value="<?php echo $m3_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m3_p" value="<?php echo $m3_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 4/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">4</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a4" value="<?php echo $a4;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m4_o" value="<?php echo $m4_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m4_p" value="<?php echo $m4_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 5/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">5</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a5" value="<?php echo $a5;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m5_o" value="<?php echo $m5_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m5_p" value="<?php echo $m5_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 6/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">6</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a6" value="<?php echo $a6;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m6_o" value="<?php echo $m6_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m6_p" value="<?php echo $m6_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 7/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">7</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a7" value="<?php echo $a7;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m7_o" value="<?php echo $m7_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m7_p" value="<?php echo $m7_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 8/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">8</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a8" value="<?php echo $a8;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m8_o" value="<?php echo $m8_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m8_p" value="<?php echo $m8_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 9/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">9</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9" value="<?php echo $a9;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o" value="<?php echo $m9_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p" value="<?php echo $m9_p;?>">
									</td>
								</tr>
							</table>
						<!-- apabila jangka waktu = 6 bulan -->
						<?php elseif ($jangka_p == '6'):?>
							<table class="angsuran-table">
								<thead>
									<tr>
										<th class="angsuran-no">Angsuran</th>
										<th class="angsuran-pokok">Pokok</th>
										<th class="angsuran-nominal">Nominal Angsuran</th>
										<th class="monitoring-omset">Omset</th>
										<th class="monitoring-profit">Profit</th>
									</tr>
								</thead>
								<!-- Angsuran ke 1/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">1</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a1" value="<?php echo $a1;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m1_o" value="<?php echo $m1_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m1_p" value="<?php echo $m1_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 2/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">2</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a2" value="<?php echo $a2;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m2_o" value="<?php echo $m2_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m2_p" value="<?php echo $m2_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 3/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">3</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a3" value="<?php echo $a3;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m3_o" value="<?php echo $m3_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m3_p" value="<?php echo $m3_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 4/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">4</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a4" value="<?php echo $a4;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m4_o" value="<?php echo $m4_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m4_p" value="<?php echo $m4_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 5/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">5</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a5" value="<?php echo $a5;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m5_o" value="<?php echo $m5_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m5_p" value="<?php echo $m5_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 6/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">6</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a6" value="<?php echo $a6;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m6_o" value="<?php echo $m6_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m6_p" value="<?php echo $m6_p;?>">
									</td>
								</tr>
							</table>
						<!-- apabila jangka waktu = 3 bulan -->
						<?php elseif ($jangka_p == '3'):?>
							<table class="angsuran-table">
								<thead>
									<tr>
										<th class="angsuran-no">Angsuran</th>
										<th class="angsuran-pokok">Pokok</th>
										<th class="angsuran-nominal">Nominal Angsuran</th>
										<th class="monitoring-omset">Omset</th>
										<th class="monitoring-profit">Profit</th>
									</tr>
								</thead>
								<!-- Angsuran ke 1/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">1</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a1" value="<?php echo $a1;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m1_o" value="<?php echo $m1_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m1_p" value="<?php echo $m1_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 2/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">2</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a2" value="<?php echo $a2;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m2_o" value="<?php echo $m2_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m2_p" value="<?php echo $m2_p;?>">
									</td>
								</tr>
								<!-- Angsuran ke 3/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">3</td>
									<td class="angsuran-pokok">Rp.<?php echo $pokok; ?></td>
									<td class="angsuran-nominal">
										<input type="text" name="a3" value="<?php echo $a3;?>">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m3_o" value="<?php echo $m3_o;?>">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m3_p" value="<?php echo $m3_p;?>">
									</td>
								</tr>
							</table>
						<?php else :?>
							<table class="angsuran-table">
								<thead>
									<tr>
										<th class="angsuran-no">Angsuran</th>
										<th class="angsuran-pokok">Pokok</th>
										<th class="angsuran-nominal">Nominal Angsuran</th>
										<th class="monitoring-omset">Omset</th>
										<th class="monitoring-profit">Profit</th>
									</tr>
								</thead>
								<!-- Angsuran ke 1/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">1</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a1">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m1_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m1_p">
									</td>
								</tr>
								<!-- Angsuran ke 2/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">2</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a2">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m2_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m2_p">
									</td>
								</tr>
								<!-- Angsuran ke 3/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">3</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a3">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m3_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m3_p">
									</td>
								</tr>
								<!-- Angsuran ke 4/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">4</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="42">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m4_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m4_p">
									</td>
								</tr>
								<!-- Angsuran ke 5/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">5</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a5">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m5_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m5_p">
									</td>
								</tr>
								<!-- Angsuran ke 6/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">6</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a6">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m6_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m6_p">
									</td>
								</tr>
								<!-- Angsuran ke 7/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">7</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a7">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m7_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m7_p">
									</td>
								</tr>
								<!-- Angsuran ke 8/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">8</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a8">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m8_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m8_p">
									</td>
								</tr>
								<!-- Angsuran ke 9/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">9</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p">
									</td>
								</tr>
								<!-- Angsuran ke 10/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">10</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p">
									</td>
								</tr>
								<!-- Angsuran ke 11/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">11</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p">
									</td>
								</tr>
								<!-- Angsuran ke 12/12 -->
								<tr class="angsuran-input">
									<td class="angsuran-no">12</td>
									<td class="angsuran-pokok"></td>
									<td class="angsuran-nominal">
										<input type="text" name="a9">
									</td>
									<td class="monitoring-omset">
										<input type="text" name="m9_o">
									</td>
									<td class="monitoring-profit">
										<input type="text" name="m9_p">
									</td>
								</tr>
							</table>
						<?php endif; ?>	
					</div>
					<!-- tabel angsuran -->
					<center>
						<?php if ($update == true): ?>
						<button class="submit-btn perbarui" type="submit" name="update">Perbarui Pembayaran</button><br>
						<button class="submit-btn selesai" type="submit" name="selesai">Selesaikan Pembayaran</button>
						<?php else: ?>
						<button class="submit-btn-disabled" type="submit" name="save" disabled="disabled">Perbarui Pembayaran</button><br>
						<button class="submit-btn-disabled selesai-disabled" type="submit" name="save" disabled="disabled">Selesaikan Pembayaran</button>
						<?php endif; ?>
					</center>
				</form>
			</div>
		</section>
	</main>
	<!--End of Main content-->
	<!--JavaScript goes here-->
	<script type="text/javascript" src="../src/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="aos.js"></script>
	<script type="text/javascript">
    	AOS.init();
	</script>
	<!--End of JavaScript-->
</body>
</html>