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
				<li class="menu-active">
					<a href="teller-page2.php" class="active"><img src="../src/img/menu-icon/fund-red.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="teller-page3.php" class="passive"><img src="../src/img/menu-icon/database-grey.svg"></a>
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
		<section class="section1 pembiayaan">
			<div data-aos="fade-right"><p>Form Pembiayaan</p></div>
			<hr>
		</section>
		<center>
		
		
		<div class="container pembiayaan-form-area">
			<form action="koneksi_pembiayaan.php" method="post">
				<h3>Form Pengajuan Pembiayaan</h3>
				<div class="pembiayaan-border-form">
					<table>
						<tr>
							<td id="pembiayaan-form-label" align="right">ID Nasabah:</td>
							<td id="pembiayaan-form-input-id_n">
							<!-- Select population -->
							<?php
								$mysqli = new mysqli('localhost', 'root', '', 'bmt') or die(mysqli_error($mysqli));
								$option = $mysqli->query("SELECT id_n
															FROM nasabah
															WHERE penghasilan_n
															IN ('< Rp.500,000',
																'Rp.500,000 - Rp.1,000,000',
																'Rp.1,000,000 - Rp.4,000,000')");
							?>
							<!-- Select population -->
								<select name="id_n">
								<?php
								while($rows = $option->fetch_assoc()){
									$id_n = $rows['id_n'];
									echo "<option value='$id_n'>$id_n</option>";
								}
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Nominal pembiayaan:</td>
							<td id="pembiayaan-form-input">
								<select name="nominal_p">
									<option value="1000000">Rp.1,000,000</option>
									<option value="2000000">Rp.2,000,000</option>
								</select>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Jangka Waktu:</td>
							<td id="pembiayaan-form-input">
								<select name="jangka_p">
									<option value="3">3 Bulan</option>
									<option value="6">6 Bulan</option>
									<option value="9">9 Bulan</option>
									<option value="12">12 Bulan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Bentuk Usaha:</td>
							<td id="pembiayaan-form-input"><input type="text" name="bentuk_u" placeholder="eg:Penjual nasi goreng"></td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Nama Usaha:</td>
							<td id="pembiayaan-form-input"><input type="text" name="nama_u" placeholder="eg:Nasi goreng berkah"></td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Bidang Usaha:</td>
							<td id="pembiayaan-form-input">
								<select name="bidang_u">
									<option value="Perdagangan">Perdagangan</option>
									<option value="Jasa">Jasa</option>
									<option value="Kulinari">Kulinari</option>
									<option value="Produksi">Produksi</option>
									<option value="Pertanian">Pertanian</option>
									<option value="Peternakan">Peternakan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Lama Usaha:</td>
							<td id="pembiayaan-form-input">
								<select name="lama_u">
									<option value="< 3 Bulan">< 3 Bulan</option>
									<option value="3 - 6 Bulan">3 - 6 Bulan</option>
									<option value="6 - 9 Bulan">6 - 9 Bulan</option>
									<option value="12 - 24 Bulan">12 - 24 Bulan</option>
									<option value="> 24 Bulan">> 24 Bulan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Jumlah Karywan:</td>
							<td id="pembiayaan-form-input-jml_kar_u"><input type="text" name="jml_kar_u" placeholder="eg: 10"></td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Alamat Usaha:</td>
							<td id="pembiayaan-form-input"><textarea name="alamat_u" placeholder="eg: jl.Karangmulya no.7 Sawangan, Depok"></textarea><!-- <input type="textarea" name="alamat_u" placeholder=""> --></td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Status Tempat Usaha:</td>
							<td id="pembiayaan-form-input">
								<input type="radio" name="stat_tmpt_u" value="Milik Sendiri"><label class="radio1">Milik Sendiri</label>
								<input type="radio" name="stat_tmpt_u" value="Milik Keluarga"><label class="radio2">Milik Keluarga</label>
								<input type="radio" name="stat_tmpt_u" value="Sewa / Kontrak"><label class="radio3">Sewa / Kontrak</label>
							</td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Omset per bulan:</td>
							<td id="pembiayaan-form-input"><input type="text" name="omset_u" placeholder="eg: Rp.1,000,000"></td>
						</tr>
						<tr>
							<td id="pembiayaan-form-label" align="right">Laba per bulan:</td>
							<td id="pembiayaan-form-input"><input type="text" name="laba_u" placeholder="eg: Rp.400,000"></td>
						</tr>
						
					</table>
				</div>
				<div id="pembiayaan-form-btn">
					<button type="submit" name="pembiayaan-submit-btn">Ajukan Pembiayaan</button> 
				</div>
			</form>
		</div>
		</center>
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