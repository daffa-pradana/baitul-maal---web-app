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
				<li class="menu-active">
					<a href="teller-page1.php" class="active"><img src="../src/img/menu-icon/form-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="teller-page2.php" class="passive"><img src="../src/img/menu-icon/fund-grey.svg"></a>
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
		<section class="section1 nasabah">
			<div data-aos="fade-right"><p>Form Nasabah</p></div>
			<hr>
			<center>
			<div class="container nasabah-form-area">
				<form action="koneksi_nasabah.php" method="post" enctype="multipart/form-data">
					<h3>Form Pendaftaran Nasabah</h3>
					<div class="nasabah-border-form">
						<table>
							<tr>
								<td id="nasabah-form-label" align="right">Nama:</td>
								<td id="nasabah-form-input"><input type="text" name="nama_n" placeholder="Nama Nasabah"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">jenis kelamin:</td>
								<td id="nasabah-form-input">
									<input type="radio" name="jk_n" value="Pria"><label class="radio1">Pria</label>
									<input type="radio" name="jk_n" value="Wanita"><label class="radio2">Wanita</label>
								</td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">NIK:</td>
								<td id="nasabah-form-input"><input type="text" name="nik_n" placeholder="Nomor Induk Kependudukan"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Kartu Keluarga:</td>
								<td id="nasabah-form-input"><input type="text" name="kk_n" placeholder="No. Kartu Keluarga"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Alamat:</td>
								<td id="nasabah-form-input"><input type="text" name="alamat_n" placeholder="Alamat Nasabah"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">RT/RW:</td>
								<td id="nasabah-form-input-rtrw"><input type="text" name="rt_n" placeholder="RT"><input type="text" name="rw_n" placeholder="RW"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Kelurahan/Desa:</td>
								<td id="nasabah-form-input"><input type="text" name="kel_n" placeholder="Kelurhan / Desa"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Kecamatan:</td>
								<td id="nasabah-form-input"><input type="text" name="kec_n" placeholder="Kecamatan"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Kode pos:</td>
								<td id="nasabah-form-input"><input type="text" name="pos_n" placeholder="Kode Pos"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Agama:</td>
								<td id="nasabah-form-input">
									<select name="agama_n">
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Konghucu">Konghucu</option>
									</select>
								</td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Ibu Kandung:</td>
								<td id="nasabah-form-input"><input type="text" name="ibu_n" placeholder="Nama Ibu Kandung"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Pendidikan terakhir:</td>
								<td id="nasabah-form-input">
									<select name="pendidikan_n">
										<option value="SD">SD Sederajat</option>
										<option value="SMP">SMP Sederajat</option>
										<option value="SMA">SMA Sederajat</option>
										<option value="D3">D3</option>
										<option value="S1">S1</option>
										<option value="Tidak sekolah">Tidak sekolah</option>
									</select>
								</td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">No HP:</td>
								<td id="nasabah-form-input"><input type="text" name="hp_n" placeholder="Nomor HP"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Nama Istri / Suami:</td>
								<td id="nasabah-form-input"><input type="text" name="is_n" placeholder="Nama Istri / Suami"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Pekerjaan:</td>
								<td id="nasabah-form-input"><input type="text" name="pekerjaan_n" placeholder="Pekerjaan"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Penghasilan per bulan:</td>
								<td id="nasabah-form-input">
									<select name="penghasilan_n">
										<option value="< Rp.500,000">< Rp.500,000</option>
										<option value="Rp.500,000 - Rp.1,000,000">Rp.500.000 - Rp.1.000.000</option>
										<option value="Rp.1,000,000 - Rp.4,000,000">Rp.1,000,000 - Rp.4,000,000</option>
										<option value="Rp.4,000,000 - Rp.6,000,000">Rp.4,000,000 - Rp.6,000,000</option>
										<option value="Rp.6,000,000 - Rp.10,000,000">Rp.6,000,000 - Rp.10,000,000</option>
										<option value="> Rp.10.000.000">> Rp.10.000.000</option>
									</select>
								</td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Nama Bank Nasabah:</td>
								<td id="nasabah-form-input">
									<select name="bank_n">
										<option value="Tidak Punya">--Tidak Punya--</option>
										<option value="Bank Mandiri">Mandiri</option>
										<option value="Bank Central Asia">BCA</option>
										<option value="Bank Rakyat Indonesia">BRI</option>
										<option value="Bank Negara Indonesia">BNI</option>
										<option value="Bank Permata">Permata</option>
										<option value="Bank CIMB Niaga">CIMB Niaga</option>
										<option value="Bank Mandiri Syariah">BSM</option>
										<option value="Bank Rakyat Indonesia Syariah">BRI Syariah</option>
										<option value="Bank Negara Indonesia Syariah">BNI Syariah</option>
										<option value="Bank Permata Syariah">Permata Syariah</option>
										<option value="Bank CIMB Syariah">CIMB Syariah</option>
									</select>
								</td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">No. Rekening:</td>
								<td id="nasabah-form-input"><input type="text" name="rek_n" placeholder="No. Rekening"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Foto Nasabah</td>
								<td id="nasabah-form-input"><input type="file" name="foto_n"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Scan KTP nasabah</td>
								<td id="nasabah-form-input"><input type="file" name="ktp_n" accept="application/pdf"></td>
							</tr>
							<tr>
								<td id="nasabah-form-label" align="right">Scan Buku Nikah</td>
								<td id="nasabah-form-input"><input type="file" name="bknikah_n" accept="application/pdf"></td>
							</tr>
						</table>
					</div>
					<div id="nasabah-form-btn">
						<button type="submit" name="nasabah-submit-btn">Daftarkan Nasabah</button> 
					</div>
				</form>
			</div>
			</center>
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