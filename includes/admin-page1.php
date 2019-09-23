<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['admin'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['admin'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css?v=<?php echo time(); ?>">
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
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">Admin & Legal Akad</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu-active">
					<a a href="admin-page1.php" class="active"><img src="../src/img/menu-icon/receipt-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="admin-page2.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
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
		<section class="section1 pencairan">
			<div data-aos="fade-right"><p>Pencairan dana</p></div>
			<hr>
		</section>
		<section class="section2 pencairan-area">
			<div class="db-pembiayaan-area">
				<!-- Database connection -->
				<?php
				require_once 'koneksi_pencairan.php';
				$belum_dicairkan = 'belum dicairkan';
				$sudah_disetujui = 'disetujui';
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM pembiayaan WHERE stat_cair = '$belum_dicairkan' AND stat_pers = '$sudah_disetujui' ") or die($mysqli->error);
				?>
				<!-- Database connection -->
				<table class="table pembiayaan-table">
					<thead>
						<tr>
							<th class="kd_p">KD.Pemb</th>
							<th class="id_n">ID.Nasabah</th>
							<th class="stat_pers">Status Survei</th>
							<th class="act_p"></th>
						</tr>
					</thead>
					<!--AUTO INCREMENT TABLE-->
					<?php while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
							<tr class="pembiayaan-record">
								<td class="kd_p"><?php echo $row['kd_p']; ?></td>
								<td class="id_n"><?php echo $row['id_n']; ?></td>
								<td class="stat_pers"><?php echo $row['stat_pers']; ?></td>
								<td class="act_p proses-btn">
									<a href="admin-page1.php?select=<?php echo $row['kd_p']; ?>" class="select-btn">Proses</a><!--EDIT button-->
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
			<div class="form-pencairan-area">
				<form method="post" action="koneksi_pencairan.php">
					<h4>Form Pencairan Dana</h4>
					<table class="form-pencairan-table">
						<tr>
							<td class="form-pencairan-label">ID Nasabah</td>
							<td class="form-pencairan-input input-id_n">
								<?php if ($id_n == '0') :?>
								:<input type="hidden" name="id_n" value="<?php echo $id_n?>" readonly="readonly">
								<?php else :?>
								:<input type="text" name="id_n" value="<?php echo $id_n?>" readonly="readonly">
								<?php endif;?>
							</td>
						</tr>
						<tr>
							<td class="form-pencairan-label">Kode Pembiayaan</td>
							<td class="form-pencairan-input input-kd_p">
								<?php if ($kd_p == '0') :?>
								:<input type="hidden" name="kd_p" value="<?php echo $kd_p?>" readonly="readonly">
								<?php else :?>
								:<input type="text" name="kd_p" value="<?php echo $kd_p?>" readonly="readonly">
								<?php endif;?>
								
							</td>
						</tr>
						<tr>
							<td class="form-pencairan-label">Nominal Pembiayaan</td>
							<td class="form-pencairan-input input-nominal_p">: Rp.<input type="text" name="nominal_p" value="<?php echo $nominal_p;?>" readonly="readonly	"></td>
						</tr>
						<tr>
							<td class="form-pencairan-label">Jangka Waktu</td>
							<td class="form-pencairan-input input-jangka_p">:<input type="text" name="jangka_p" value="<?php echo $jangka_p;?>" readonly="readonly"></td>
						</tr>
						<tr>
							<td class="form-pencairan-label">Tanggal Pembiayaan</td>
							<td class="form-pencairan-input">
								:<input class="input-tgl_awal" type="date" name="tgl_awal"> s/d <input class="input-tgl_akhir" type="date" name="tgl_akhir"></td>
						</tr>
						<tr>
							<td class="form-pencairan-label">Angsuran Pokok</td>
							<td class="form-pencairan-input input-pokok">:Rp.<input type="text" name="pokok" value="<?php echo $pokok;?>"></td>
						</tr>
					</table>
					<div id="cairkan-btn-area">
						<center>
						<?php if ($save == true): ?>
						<button class="cairkan-btn" type="submit" name="save">Cairkan Dana</button>
						<?php else: ?>
						<button class="cairkan-btn-disabled" type="submit" name="save" disabled="disabled">Cairkan Dana</button>
						<?php endif; ?>
						</center>
					</div>
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