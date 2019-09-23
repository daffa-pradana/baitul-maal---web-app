<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['teller'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['teller'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="teller.css?v=<?php echo time(); ?>">
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
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">Teller</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu menu1">
					<a href="teller-page1.php" class="passive"><img src="../src/img/menu-icon/form-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="teller-page2.php" class="passive"><img src="../src/img/menu-icon/fund-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="teller-page3.php" class="active"><img src="../src/img/menu-icon/database-red.svg"></a>
				</li>
				<li class="menu menu3">
					<a href="teller-page4.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
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
		<section class="section1 database">
			<div data-aos="fade-right"><p>Database Nasabah</p></div>
			<hr>
		</section>
		<section class="section2 database-content">
			<!--Database Connection-->
			<?php require_once 'koneksi_db-nasabah.php'; ?>
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
							<a href="teller-page3.php?show=<?php echo $row['id_n']; ?>" class="show-btn">
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

					<form method="POST" action="koneksi_db-nasabah.php">
					<table class="table nasabah-data-profile">
						<tr>
							<td id="foto-nasabah">
								<?php echo '<img class="foto" src="foto_nasabah/'.$foto_n.'" alt="Profile image"/>'; ?>
							</td>
							<td id="profile-nasabah">
								<div data-aos="fade-up"><input type="text" name="nama_n" class="nama-nasabah" value="<?php echo $nama_n; ?>"></div><br>
								<span class="id-nasabah">ID Nasabah:&nbsp;</span><input type="text" name="id_n" class="id-nasabah" value="<?php echo $id_n; ?>">
							</td>
						</tr>
					</table>
					<table class="table nasabah-data-detail">
						<tr>
							<td id="nasabah-data-label">JK</td>
							<td id="nasabah-data-content">
								:<input type="text" class="jk-nasabah" name="jk_n" value="<?php echo $jk_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">NIK</td>
							<td id="nasabah-data-content">
								:<input type="text" class="nik-nasabah" name="nik_n" value="<?php echo $nik_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No.HP</td>
							<td id="nasabah-data-content">
								:<input type="text" class="hp-nasabah" name="hp_n" value="<?php echo $hp_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No.KK</td>
							<td id="nasabah-data-content">
								:<input type="text" class="kk-nasabah" name="kk_n"  value="<?php echo $kk_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Alamat</td>
							<td id="nasabah-data-content">
								:<input type="text" class="alamat-nasabah" name="alamat_n" value="<?php echo $alamat_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">RT/RW</td>
							<td ">
								:<input type="text" class="rt-nasabah" name="rt_n" value="<?php echo $rt_n; ?>">/
								<input type="text" class="rw-nasabah" name="rw_n" value="<?php echo $rw_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kelurahan</td>
							<td id="nasabah-data-content">
								:<input type="text" class="kel-nasabah" name="kel_n" value="<?php echo $kel_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kecamatan</td>
							<td id="nasabah-data-content">
								:<input type="text" class="kec-nasabah" name="kec_n" value="<?php echo $kec_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Kode Pos</td>
							<td id="nasabah-data-content">
								:<input type="text" class="pos-nasabah" name="pos_n" value="<?php echo $pos_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Agama</td>
							<td id="nasabah-data-content">
								:<input type="text" class="agama-nasabah" name="agama_n" value="<?php echo $agama_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Istri / Suami</td>
							<td id="nasabah-data-content">
								:<input type="text" class="is-nasabah" name="is_n" value="<?php echo $is_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Ibu Kandung</td>
							<td id="nasabah-data-content">
								:<input type="text" class="ibu-nasabah" name="ibu_n" value="<?php echo $ibu_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Pendidikan terakhir</td>
							<td id="nasabah-data-content">
								:<input type="text" class="pendidikan-nasabah" name="pendidikan_n" value="<?php echo $pendidikan_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Pekerjaan</td>
							<td id="nasabah-data-content">
								:<input type="text" class="pekerjaan-nasabah" name="pekerjaan_n" value="<?php echo $pekerjaan_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Penghasilan</td>
							<td id="nasabah-data-content">
								:<input type="text" class="penghasilan-nasabah" name="penghasilan_n" value="<?php echo $penghasilan_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Bank</td>
							<td id="nasabah-data-content">
								:<input type="text" class="bank-nasabah" name="bank_n" value="<?php echo $bank_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">No Rekening</td>
							<td id="nasabah-data-content">
								:<input type="text" class="rek-nasabah" name="rek_n" value="<?php echo $rek_n; ?>">
							</td>
						</tr>
						<tr>
							<td id="nasabah-data-label">Waktu daftar</td>
							<td id="nasabah-data-content">
								:<input type="text" class="tgl-nasabah" name="tgl_n" value="<?php echo $tgl_n; ?>">
							</td>
						</tr>
					</table>
					<div id="nasabah-perbarui-btn">
						<center>
						<?php if ($update == true): ?>
						<button class="perbarui-btn" type="submit" name="update">Perbarui Data Nasabah</button>
						<?php else: ?>
						<button class="perbarui-btn-disabled" type="submit" name="save" disabled="disabled">Perbarui Data Nasabah</button>
						<?php endif; ?>
						</center>
					</div>
					</form>

				</div>
			</div>
			<!-- Data Nasabah Display -->
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