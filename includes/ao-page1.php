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
				<li class="menu-active">
					<a href="ao-page1.php" class="active"><img src="../src/img/menu-icon/database-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="ao-page2.php" class="active"><img src="../src/img/menu-icon/verif-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="ao-page3.php" class="passive"><img src="../src/img/menu-icon/savings-grey.svg"></a>
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
		<section class="section1 data">
			<div data-aos="fade-right"><p>Data Nasabah</p></div>
			<hr>
		</section>
		<section class="section2 database-content">
			<!--Database Connection-->
			<?php require_once 'koneksi_db-nasabah2.php'; ?>
			<?php
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM nasabah") or die($mysqli->error);
			?>
			<!--Database Connection-->

			<!-- Database Table -->
			<table class="table database-table">
				<tr>
					<th class="id_n-db">ID</th>
					<th class="nama_n-db"><span>Nama</span></th>
					<th class="act-db"></th>
				</tr>
				<!-- while loop record -->
				<?php
				while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
				<tr class="nasabah-record">
					<td class="id_n-db id_n-record"><?php echo $row['id_n']; ?></td><!--READ DATA from column-->
					<td class="nama_n-db nama_n-record"><span><?php echo $row['nama_n']; ?></span></td><!--READ DATA from column-->
					<td class="act-db act-record">
						<a href="ao-page1.php?show=<?php echo $row['id_n']; ?>" class="show-btn">
							<img src="../src/img/menu-icon/view-white.svg">
						</a><!--EDIT button-->
					</td>
				</tr>
				<?php endwhile; ?>
				<!-- while loop record -->
			</table>
			<!--Database Table -->
			<?php
				function pre_r($array) {
					echo '<pre>';
					print_r($array);
					echo '</pre>';
				}
			?>
			<!-- Data Nasabah Display -->
			<div class="nasabah-data-area">
				<div class="nasabah-data-border">
					<table class="table nasabah-data-profile">
						<tr>
							<td id="foto-nasabah">
								<?php echo '<img class="foto" src="foto_nasabah/'.$foto_n.'" alt="Profile image"/>'; ?>
							</td>
							<td id="profile-nasabah">
								<div data-aos="fade-up"><input type="text" name="nama_n" class="nama-nasabah" value="<?php echo $nama_n; ?>" readonly="readonly"></div><br>
								<input type="text" name="id_n" class="id-nasabah" value="ID Nasabah: <?php echo $id_n; ?>" readonly="readonly">
							</td>
						</tr>
					</table>
					<table class="table nasabah-data-detail">
						<tr>
							<td id="nasabah-data-label">JK</td>
							<td id="nasabah-data-content">
								<input type="text" class="jk-nasabah" name="jk_n" value=": <?php echo $jk_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">NIK</td>
							<td id="nasabah-data-content">
								<input type="text" class="nik-nasabah" name="nik_n" value=": <?php echo $nik_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No.HP</td>
							<td id="nasabah-data-content">
								<input type="text" class="nik-nasabah" name="hp_n" value=": <?php echo $hp_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No.KK</td>
							<td id="nasabah-data-content">
								<input type="text" class="kk-nasabah" name="kk_n"  value=": <?php echo $kk_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Alamat</td>
							<td id="nasabah-data-content">
								<input type="text" class="alamat-nasabah" name="alamat_n" value=": <?php echo $alamat_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">RT/RW</td>
							<td ">
								<input type="text" class="rt-nasabah" name="rt_n" value=": <?php echo $rt_n; ?>" readonly="readonly">/
								<input type="text" class="rw-nasabah" name="rt_w" value="<?php echo $rw_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kelurahan</td>
							<td id="nasabah-data-content">
								<input type="text" class="kel-nasabah" name="kel_n" value=": <?php echo $kel_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kecamatan</td>
							<td id="nasabah-data-content">
								<input type="text" class="kec-nasabah" name="kec_n" value=": <?php echo $kec_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kode Pos</td>
							<td id="nasabah-data-content">
								<input type="text" class="pos-nasabah" name="pos_n" value=": <?php echo $pos_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Agama</td>
							<td id="nasabah-data-content">
								<input type="text" class="agama-nasabah" name="agama_n" value=": <?php echo $agama_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Istri / Suami</td>
							<td id="nasabah-data-content">
								<input type="text" class="is-nasabah" name="is_n" value=": <?php echo $is_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Ibu Kandung</td>
							<td id="nasabah-data-content">
								<input type="text" class="ibu-nasabah" name="ibu_n" value=": <?php echo $ibu_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Pendidikan terakhir</td>
							<td id="nasabah-data-content">
								<input type="text" class="pendidikan-nasabah" name="pendidikan_n" value=": <?php echo $pendidikan_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Pekerjaan</td>
							<td id="nasabah-data-content">
								<input type="text" class="pekerjaan-nasabah" name="pekerjaan_n" value=": <?php echo $pekerjaan_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Penghasilan</td>
							<td id="nasabah-data-content">
								<input type="text" class="penghasilan-nasabah" name="penghasilan_n" value=": <?php echo $penghasilan_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Bank</td>
							<td id="nasabah-data-content">
								<input type="text" class="bank-nasabah" name="bank_n" value=": <?php echo $bank_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No Rekening</td>
							<td id="nasabah-data-content">
								<input type="text" class="rek-nasabah" name="rek_n" value=": <?php echo $rek_n; ?>" readonly="readonly">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Waktu daftar</td>
							<td id="nasabah-data-content">
								<input type="text" class="tgl-nasabah" name="tgl_n" value=": <?php echo $tgl_n; ?>" readonly="readonly">
							</td>
						</tr>
					</table>
				</div>
			</div>
			<!-- Data Nasabah Display -->
			<!-- Status Pembiayaan -->
				<?php
					$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
					$result2 = $mysqli->query("SELECT * FROM pembiayaan WHERE id_n=$id_n") or die($mysqli->error());
				?>
			<div class="pembiayaan-db-area">
				<h3>Pembiayaan</h3>
				<table class="pembiayaan-db-table">
					<tr>
						<th class="kode-pembiayaan">KD Pemb</th>
						<th class="status-pembiayaan">Status</th>
					</tr>
					<!-- while loop record -->
					<?php
					while ($row = $result2 ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
					<tr class="pembiayaan-record">
						<td class="kode-pembiayaan"><?php echo $row['kd_p']; ?></td>
						<td class="status-pembiayaan status-pembiayaan">

							<!-- Status Survei -->
							<?php if ($row['stat_surv'] == 'belum disurvei'): ?>
								<img src="../src/img/stat-icon/belum-disurvei.png">
							<?php else: ?>
								<img src="../src/img/stat-icon/sudah-disurvei.png">
							<?php endif; ?>
							

							<!-- Status Persetujuan -->
							<?php if ($row['stat_pers'] == 'belum disetujui'): ?>
								<img src="../src/img/stat-icon/belum-disetujui.png">
							<?php elseif ($row['stat_pers'] == 'disetujui'): ?>
								<img src="../src/img/stat-icon/disetujui.png">
							<?php else: ?>
								<img src="../src/img/stat-icon/ditolak.png">
							<?php endif; ?>
							

							<!-- Status Pencairan -->
							<?php if ($row['stat_cair'] == 'belum dicairkan'): ?>
								<img src="../src/img/stat-icon/belum-dicairkan.png">
							<?php elseif ($row['stat_cair'] == 'sudah dicairkan'): ?>
								<img src="../src/img/stat-icon/sudah-dicairkan.png">
							<?php else: ?>
								<img src="../src/img/stat-icon/tidak-dicairkan.png">
							<?php endif; ?>
							

							<!-- Status Pembiayaan -->
							<?php if ($row['stat_pemb'] == 'belum berjalan'): ?>
								<img src="../src/img/stat-icon/belum-berjalan.png">
							<?php elseif ($row['stat_pemb'] == 'tidak berjalan'): ?>
								<img src="../src/img/stat-icon/tidak-berjalan.png">
							<?php elseif ($row['stat_pemb'] == 'sedang berjalan'): ?>
								<img src="../src/img/stat-icon/sedang-berjalan.png">
							<?php elseif ($row['stat_pemb'] == 'selesai'): ?>
								<img src="../src/img/stat-icon/selesai.png">
							<?php else: ?>
								<img src="../src/img/stat-icon/gagal.png">
							<?php endif; ?>
							
								
						</td>
					</tr>
					<?php endwhile; ?>
					<!-- while loop record -->
				</table>
			</div>
			
			<!-- Status Pembiayaan -->
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