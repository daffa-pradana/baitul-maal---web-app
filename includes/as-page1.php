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
	<?php require_once 'koneksi_karyawan.php'; ?>
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
				<li class="menu-active">
					<a href="#" class="active"><img src="../src/img/menu-icon/employee-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="as-page2.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
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
		<!--Database Connection-->
		<?php
			$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM karyawan") or die($mysqli->error);
		?>
		<!--Database Connection-->
		<section class="section1">
			<div data-aos="fade-right" class="karyawan"><p>Karyawan</p></div>
			<hr class="separator">

			<div class="container karyawan-table-area">
				<table class="table karyawan-table">
					<thead>
						<tr>
							<th class="id_k">ID</th>
							<th class="foto_k">Foto</th>
							<th class="nama_k">&nbsp; Nama</th>
							<th class="jk_k">JK</th>
							<th class="email_k">E-mail</th>
							<th class="jabatan_k">Jabatan</th>
							<th class="hp_k">No.HP</th>
							<th class="tgl_k">Tanggal Gabung</th>
							<th class="nik_k">NIK</th>
							<th class="npwp_k">NPWP</th>
							<th class="kk_k">No.KK</th>
							<th class="status_k">Status</th>
							<th class="act_k">Action</th>
						</tr>
					</thead>
					<!--AUTO INCREMENT TABLE-->
					<?php
						while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
							<tr class="karyawan-record">
								<td class="id_k"><?php echo $row['no_k']; ?></td><!--READ DATA from column-->
								<td class="foto_k"><?php echo "<img src='foto_karyawan/".$row['foto_k']."' >"; ?></td><!--READ DATA from column-->
								<td class="nama_k"><?php echo $row['nama_k']; ?></td><!--READ DATA from column-->
								<td class="jk_k"><?php echo $row['jk_k']; ?></td><!--READ DATA from column-->
								<td class="email_k"><?php echo $row['email_k']; ?></td><!--READ DATA from column-->
								<td class="jabatan_k"><?php echo $row['jabatan_k']; ?></td><!--READ DATA from column-->
								<td class="hp_k"><?php echo $row['hp_k']; ?></td><!--READ DATA from column-->
								<td class="tgl_k"><?php echo $row['tgl_k']; ?></td><!--READ DATA from column-->
								<td class="nik_k"><?php echo $row['nik_k']; ?></td><!--READ DATA from column-->
								<td class="npwp_k"><?php echo $row['npwp_k']; ?></td><!--READ DATA from column-->
								<td class="kk_k"><?php echo $row['kk_k']; ?></td><!--READ DATA from column-->
								<td class="status_k"><?php echo $row['status_k']; ?></td><!--READ DATA from column-->
								<td class="act_k">
									<a href="as-page1.php?edit=<?php echo $row['no_k']; ?>" class="edit-btn"><img src="../src/img/menu-icon/edit-white.jpg"></a><!--EDIT button-->
									<a href="koneksi_karyawan.php?delete=<?php echo $row['no_k']; ?>" class="delete-btn"><img src="../src/img/menu-icon/delete-darkred.jpg"></a><!--DELETE button-->
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

			<div class="container karyawan-form-area">
				<form action="koneksi_karyawan.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="no_k" value="<?php echo $no_k; ?>"><!--hidden input form-->
					<h3>Form Karyawan</h3>
					<div class="karyawan-border-form">
						<table>
							<tr>
							 	<td id="karyawan-form-label" align="right">Nama</td>
								<td id="karyawan-form-input"><input type="text" name="nama_k" placeholder="Nama karyawan *" value="<?php echo $nama_k; ?>" required></td>
							</tr>
							<tr>
								<td id="karyawan-form-label" align="right">E-mail</td>
							 	<td id="karyawan-form-input"><input type="text" name="email_k" placeholder="E-mail karyawan *" value="<?php echo $email_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">Password</td>
							 	<td id="karyawan-form-input"><input type="password" name="pass_k" placeholder="Password *" value="<?php echo $pass_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">Jenis Kelamin</td>
							 	<td id="karyawan-form-input" required>
							 		<input type="radio" name="jk_k" value="Pria"><label class="radio1">Pria</label>
									<input type="radio" name="jk_k" value="Wanita"><label class="radio2">Wanita</label>
								</td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">Jabatan</td>
							 	<td id="karyawan-form-input">
							 		<select name="jabatan_k" required>
										<option value="General Manager" <?php if ($jabatan_k=='General Manager') {echo "selected";}?>>General Manager</option>
										<option value="Accounting Staff" <?php if ($jabatan_k=='Accounting Staff') {echo "selected";}?>>Accounting Staff</option>
										<option value="Account Officer" <?php if ($jabatan_k=='Account Officer') {echo "selected";}?>>Account Officer</option>
										<option value="Admin" <?php if ($jabatan_k=='Admin') {echo "selected";}?>>Admin</option>
										<option value="Komite Pembiayaan" <?php if ($jabatan_k=='Komite Pembiayaan') {echo "selected";}?>>Komite Pembiyaan</option>
										<option value="Teller" <?php if ($jabatan_k=='Teller') {echo "selected";}?>>Teller</option>
									</select>
							 	</td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">NIK</td>
							 	<td id="karyawan-form-input"><input type="text" name="nik_k" placeholder="Nomor Induk Kependudukan *" value="<?php echo $nik_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">NPWP</td>
							 	<td id="karyawan-form-input"><input type="text" name="npwp_k" placeholder="Nomor Pokok Wajib Pajak *" value="<?php echo $npwp_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">Kartu Keluarga</td>
							 	<td id="karyawan-form-input"><input type="text" name="kk_k" placeholder="Nomor Kartu Keluarga *" value="<?php echo $kk_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">No. HP</td>
							 	<td id="karyawan-form-input"><input type="text" name="hp_k" placeholder="Nomor Handphone *" value="<?php echo $hp_k; ?>" required></td>
							</tr>
							<tr>
							 	<td id="karyawan-form-label" align="right">Status</td>
							 	<td id="karyawan-form-input">
							 		<input type="radio" name="status_k" value="Aktif" <?php if ($status_k=='Aktif') {echo "checked";}?> required><label class="radio1">Aktif</label>
									<input type="radio" name="status_k" value="Tidak Aktif" <?php if ($status_k=='Tidak Aktif') {echo "checked";}?>><label class="radio2">Tidak Aktif</label>
							 	</td>
							</tr>
						</table>
					</div>
						<div id="karyawan-form-file">
							<input type="file" id="upload-foto_k" name="foto_k"><label for="upload-foto_k"><img src="../src/img/menu-icon/upload-foto-grey.svg">&nbsp;Upload Foto</label>
						</div>
						<div id="karyawan-form-btn">
							<center>
							<?php if ($update == true): ?>
							<button type="submit" class="btn btn-info" name="update">Perbarui Karyawan</button>
							<?php else: ?>
							<button class="btn btn-primary" type="submit" name="save">Tambah Karyawan</button>
							<?php endif; ?>
							</center>
						</div>
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