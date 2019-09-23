<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['as'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['as'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="as.css?v=<?php echo time(); ?>">
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
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">Accounting Staff</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu menu1">
					<a href="as-page1.php" class="passive"><img src="../src/img/menu-icon/employee-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="as-page2.php" class="active"><img src="../src/img/menu-icon/event-red.svg"></a>
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
		
		<section class="section1 acara">
			<div data-aos="fade-right"><p>Acara</p></div>
			<hr>
			<!-- Data Base Connection -->
			<?php require_once 'koneksi_acara.php'; ?>
			<?php
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM acara") or die($mysqli->error);
			?>
			<!-- Data Base Connection -->
			<div class="container acara-table-area">
				<table class="table acara-table">
					<thead>
						<tr>
							<th class="no_a">No.acara</th>
							<th class="tgl_b_a">Tanggal buat</th>
							<th class="hd_a">Acara</th>
							<th class="tgl_a">Tanggal</th>
							<th class="ctt_a">Catatan</th>
							<th class="pst_a">Peserta</th>
							<th class="act_a">Action</th>
						</tr>
					</thead>
					<!--AUTO INCREMENT TABLE-->
					<?php
						while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
							<tr class="acara-record">
								<td class="no_a"><?php echo $row['no_acara']; ?></td><!--READ DATA from column-->
								<td class="tgl_b_a"><?php echo $row['tgl_buat']; ?></td><!--READ DATA from column-->
								<td class="hd_a"><center><div class="hd_a-box"><?php echo $row['headline']; ?></div></center></td><!--READ DATA from column-->
								<td class="tgl_a"><?php echo $row['tgl']; ?></td><!--READ DATA from column-->
								<td class="ctt_a"><?php echo $row['catatan']; ?></td><!--READ DATA from column-->
								<td class="pst_a"><?php echo $row['peserta']; ?></td><!--READ DATA from column-->
								<td class="act_a">
									<a href="as-page2.php?edit=<?php echo $row['no_acara']; ?>" class="edit-btn"><img src="../src/img/menu-icon/edit-white.jpg"></a><!--EDIT button-->
									<a href="koneksi_acara.php?delete=<?php echo $row['no_acara']; ?>" class="edit-btn"><img src="../src/img/menu-icon/delete-darkred.jpg"></a><!--DELETE button-->
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

			<div class="container acara-form-area">
				<form action="koneksi_acara.php" class="acara-form" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="no_acara" value="<?php echo $no_acara; ?>"><!--hidden input form-->
					<h3 align="center">Form Acara</h3>
					<center>
					<div class="acara-form-border">
						<table class="acara-form">
							<tr>
								<td class="acara-form-label" align="right">Acara</td>
								<td class="acara-form-input">
									<input type="text" class="form-control" name="headline" placeholder="Headline acara" value="<?php echo $headline; ?>">
								</td>
							</tr>
							<tr>
								<td class="acara-form-label" align="right">Tanggal</td>
								<td class="acara-form-input">
									<input type="datetime-local" class="form-control" name="tgl" value="<?php echo $tgl; ?>">
								</td>
							</tr>
							<tr>
								<td class="acara-form-label" align="right">Catatan</td>
								<td class="acara-form-input">
									<input type="text" class="form-control" name="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>">
								</td>
							</tr>
							<tr>
								<td class="acara-form-label " align="right" valign="top">Peserta</td>
								<td class="acara-form-input acara-form-checkbox">
									<input type="checkbox" name="peserta[]" value="General Manager"> General Manager<br>
									<input type="checkbox" name="peserta[]" value="Teller"> Teller<br>
									<input type="checkbox" name="peserta[]" value="Account Officer"> Account Officer<br>
									<input type="checkbox" name="peserta[]" value="Komite Pembiayaan"> Komite Pembiayaan<br>
									<input type="checkbox" name="peserta[]" value="Admin"> Admin & Legal Akad<br>
									<input type="checkbox" name="peserta[]" value="Accounting Staff"> Accounting Staff<br>
								</td>
							</tr>
						</table>
						<div class="acara-form-btn" align="center">
							<?php if ($update == true): ?>
							<button type="submit" class="btn btn-info" name="update">Perbarui Acara</button>
							<?php else: ?>
							<button class="btn btn-primary" type="submit" name="save">Tambah Acara</button>
							<?php endif; ?>
						</div>
					</div>
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