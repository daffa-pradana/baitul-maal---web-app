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
				<li class="menu-active">
					<a href="ao-page2.php" class="active"><img src="../src/img/menu-icon/verif-red.svg"></a>
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
		<section class="section1 survei">
			<div data-aos="fade-right"><p>Survei Kelayakan</p></div>
			<hr>
		</section>
		<section class="section2 survei-section">
			<!-- Data Base Connection -->
			<?php require_once 'koneksi_survei.php'; ?>
			<?php
				$belum = 'belum disurvei';
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM pembiayaan WHERE stat_surv = '$belum'") or die($mysqli->error);
			?>
			<!-- Data Base Connection -->
			<div class="container survei-table-area">
				<table class="table survei-table">
					<thead>
						<tr>
							<th class="kd_p">KD.Pemb</th>
							<th class="id_n">ID.Nasabah</th>
							<th class="stat_surv">Status Survei</th>
							<th class="act_s"></th>
						</tr>
					</thead>
					<!--AUTO INCREMENT TABLE-->
					<?php
						while ($row = $result ->fetch_assoc()): ?><!--FETCH DATA from DATA BASE-->
							<tr class="survei-record">
								<td class="kd_p"><?php echo $row['kd_p']; ?></td>
								<td class="id_n"><?php echo $row['id_n']; ?></td>
								<td class="stat_surv"><?php echo $row['stat_surv']; ?></td>
								<td class="act_s">
									<a href="ao-page2.php?select=<?php echo $row['kd_p']; ?>" class="select-btn">Select</a><!--EDIT button-->
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

			<div class="survei-form-area">
				<form method="post" action="koneksi_survei.php">
					<input type="hidden" name="kd_p" value="<?php echo $kd_p; ?>"><!--hidden input form-->
					
					<!-- Form Survei Keadaan -->
					<h4 class="survei-label1">Survei Keadaan</h4>
					<p class="sub-survei">Anggota keluarga yang tinggal di rumah</p>
					<table class="survei-keadaan">
						<tr>
							<td class="s-kea-label">Nama Istri / Suami:</td>
							<td class="s-kea-input"><input type="text" name="is_ts" placeholder="Nama Istri / Suami"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Ibu Kandung:</td>
							<td class="s-kea-input"><input type="text" name="ibu_ts" placeholder="Nama Ibu Kandung"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Ayah Kandung:</td>
							<td class="s-kea-input"><input type="text" name="ayah_ts" placeholder="Nama Ayah Kandung"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Anak 1:</td>
							<td class="s-kea-input"><input type="text" name="anak1_ts" placeholder="Nama Anak"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Anak 2:</td>
							<td class="s-kea-input"><input type="text" name="anak2_ts" placeholder="Nama Anak"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Anak 3:</td>
							<td class="s-kea-input"><input type="text" name="anak3_ts" placeholder="Nama Anak"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Cucu 1:</td>
							<td class="s-kea-input"><input type="text" name="cucu1_ts" placeholder="Nama Cucu"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Cucu 2:</td>
							<td class="s-kea-input"><input type="text" name="cucu2_ts" placeholder="Nama Cucu"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Nama Cucu 3:</td>
							<td class="s-kea-input"><input type="text" name="cucu3_ts" placeholder="Nama Cucu"></td>
						</tr>
					</table>
					<p class="sub-survei">Informasi Rumah</p>
					<table class="survei-keadaan">
						<tr>
							<td class="s-kea-label">lokasi Rumah:</td>
							<td class="s-kea-input"><textarea name="lokasi_rs" placeholder="eg. Jl.Jatiwaringin No.6 Sawangan, Depok"></textarea></td>
						</tr>
						<tr>
							<td class="s-kea-label">Kepemilikan Rumah:</td>
							<td class="s-kea-input">
								<input type="radio" name="milik_rs" value="milik sendiri"><label class="label1">Milik Sendiri</label>
								<input type="radio" name="milik_rs" value="kontrak/sewa"><label class="label2">Kontrak / Sewa</label>
								<input type="radio" name="milik_rs" value="numpang"><label class="label3">Numpang</label>
							</td>
						</tr>
					</table>
					<p class="sub-survei">Kondisi Rumah</p>
					<table class="survei-keadaan">		
						<tr>
							<td class="s-kea-label">Ukuran Luas Rumah:</td>
							<td class="s-kea-input"><input type="text" name="ukuran_rs" placeholder="eg. 3X7m"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Dinding:</td>
							<td class="s-kea-input"><input type="text" name="dinding_rs" placeholder="eg. batako"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Lantai:</td>
							<td class="s-kea-input"><input type="text" name="lantai_rs" placeholder="eg. semen"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Atap:</td>
							<td class="s-kea-input"><input type="text" name="atap_rs" placeholder="eg. asbes"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Pintu:</td>
							<td class="s-kea-input"><input type="text" name="pintu_rs" placeholder="eg. alumunium"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Jendela:</td>
							<td class="s-kea-input"><input type="text" name="jendela_rs" placeholder="eg. kaca mati"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Jamban:</td>
							<td class="s-kea-input"><input type="text" name="jamban_rs" placeholder="eg. leher angsa"></td>
						</tr>
						<tr>
							<td class="s-kea-label">Jenis Toilet:</td>
							<td class="s-kea-input"><input type="text" name="toilet_rs" placeholder="eg. jongkok"></td>
						</tr>
					</table>

					<!-- Form Survei Karakter -->
					<h4 class="survei-label2">Survei Karakter</h4>
					<table class="survei-karakter">
						<tr>
							<td class="s-kar-label">Apakah pemohon pernah memiliki pinjaman / fasilitas pembiayaan?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter1_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter1_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
						<tr>
							<td class="s-kar-label">Dari hasil pengecekan ke rekan-rekan pemohon, apakah yang bersangkutan sering ingkar janji ke rekan-rekannya atau orang lain?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter2_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter2_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
						<tr>
							<td class="s-kar-label">Apakah pemohon rajin beribadah, seperti sholat, puasa, dan ibadah lainyya?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter3_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter3_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
						<tr>
							<td class="s-kar-label">Apakah pemohon rajin mengikuti pengajian atau sholat berjamaah di mushola/masjid?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter4_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter4_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
						<tr>
							<td class="s-kar-label">Apakah pemohon suka atau pernah mengemis / meminta-minta, memalak, dan atau melakukan pungutan liar lainyya?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter5_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter5_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
						<tr>
							<td class="s-kar-label">Apakah pemohon suka atau pernah berjudi, bermabuk-mabukan, berzina, mencuri, dan menipu?</td>
							<td class="s-kar-input">
								<input type="radio" name="karakter6_s" value="ya"><label>Ya</label>
								<input type="radio" name="karakter6_s" value="tidak"><label>Tidak</label>
							</td>
						</tr>
					</table>

					<!-- Form Survei Usaha -->
					<h4 class="survei-label3">Survei Usaha</h4>
					<table class="survei-usaha">
						<tr>
							<td class="s-usa-label">Kelompok Bidang Usaha</td>
							<td class="s-usa-input">
								<select name="bidang_us">
									<option value="perdangan">Perdagangan</option>
									<option value="kulinari">Kulinari</option>
									<option value="produksi">Produksi</option>
									<option value="pertanian">Pertanian</option>
									<option value="jasa">Jasa</option>
									<option value="peternakan">Peternakan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Jenis produk yang ditawarkan</td>
							<td class="s-usa-input">
								<select name="produk_us">
									<option value="kebutuhan pokok">Kebutuhan Pokok</option>
									<option value="perlengkapan">Perlengkapan</option>
									<option value="bahan baku">Bahan Baku</option>
									<option value="lainyya">Lainyya</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Jumlah tenaga kerja yang menjalankan usaha</td>
							<td class="s-usa-input">
								<select name="karyawan_us">
									<option value=">5 orang">>5 Orang</option>
									<option value="4 - 5 orang">4 - 5 orang</option>
									<option value="2 - 3 orang">2 - 3 orang</option>
									<option value="<2 orang"><2 orang</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Jarak lokasi usaha dengan kantor baitul maal</td>
							<td class="s-usa-input">
								<select name="jarak_us">
									<option value="< 1 km">< 1 km</option>
									<option value="1 - 2 km">1 - 2 km</option>
									<option value="2 - 3 km">2 - 3 km</option>
									<option value="> 3 km">> 3 km</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Kondisi tempat Usaha / Akses (sesuai dengan Bidang Usaha)</td>
							<td class="s-usa-input">
								<select name="kondisi1_us">
									<option value="bangunan permanen">bangunan permanen (dagang,kulinari,jasa)</option>
									<option value="bangunan semi permanen">bangunan semi permanen (dagang,kulinari,jasa)</option>
									<option value="bangunan tidak permanen">bangunan tidak permanen (dagang,kulinari,jasa)</option>
									<option value="tidak menetap">tidak menetap (dagang,kulinari,jasa)</option>
									<!-- option separator -->
									<option value="akses sangat baik">akses sangat baik (produksi, pertanian, peternakan)</option>
									<option value="akses baik">akses baik (produksi, pertanian, peternakan)</option>
									<option value="akses cukup baik">akses cukup baik (produksi, pertanian, peternakan)</option>
									<option value="akses tidak baik">akses tidak baik (produksi, pertanian, peternakan)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Kondisi lokasi Usaha / Peruntukan (sesuai dengan Bidang Usaha)</td>
							<td class="s-usa-input">
								<select name="kondisi2_us">
									<option value="pasar dan sekitarnya">pasar dan sekitarnya (dagang,kulinari,jasa)</option>
									<option value="jalan raya">jalan raya (dagang,kulinari,jasa)</option>
									<option value="gang">gang (dagang,kulinari,jasa)</option>
									<option value="tidak menetap">akses sangat baik (dagang,kulinari,jasa)</option>
									<!-- option separator -->
									<option value="sesuai peruntukan">sesuai peruntukan (produksi, pertanian, peternakan)</option>
									<option value="seizin lingkungan">seizin lingkungan (produksi, pertanian, peternakan)</option>
									<option value="tidak memiliki izin">tidak memiliki izin (produksi, pertanian, peternakan)</option>
									<option value="daerah terlarang">daerah terlarang (produksi, pertanian, peternakan)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Pengelolaan keuangan</td>
							<td class="s-usa-input">
								<select name="kelola_us">
									<option value="sangat baik">sangat baik</option>
									<option value="cukup baik">cukup baik</option>
									<option value="pengelolaan sederhana">pengelolaan sederhana</option>
									<option value="tidak dikelola">tidak dikelola</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Ketersediaan bahan baku / produk / dagangan</td>
							<td class="s-usa-input">
								<select name="sedia_us">
									<option value="setiap saat">setiap saat</option>
									<option value="dengan pemesanan">dengan pemesanan</option>
									<option value="musiman">musiman</option>
									<option value="tidak menentu">tidak menentu</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Jumlah pemasok bahan baku / produk / dagangan</td>
							<td class="s-usa-input">
								<select name="pemasok_us">
									<option value="> 3 pemasok">> 3 pemasok</option>
									<option value="2 - 3 pemasok">2 - 3 pemasok</option>
									<option value="1 pemasok">1 pemasok</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Persaingan usaha dilokasi sekitar</td>
							<td class="s-usa-input">
								<select name="saingan_us">
									<option value="1 - 2 usaha">1 - 2 usaha</option>
									<option value="3 - 10 usaha">3 - 10 usaha</option>
									<option value="10 - 20 usaha">10 - 20 usaha</option>
									<option value="> 20 usaha">> 20 usaha</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Pengalaman menjalankan usaha</td>
							<td class="s-usa-input">
								<select name="pengalaman_us">
									<option value="> 2 tahun">> 2 tahun</option>
									<option value="1 - 2 tahun">1 - 2 tahun</option>
									<option value="< 1 tahun">< 1 tahun</option>
									<option value="belum pernah">belum pernah</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Repayment Capacity Ratio<br><p class="label-ket">Angsuran / Penghasilan bersih</p></td>
							<td class="s-usa-input">
								<select name="rcr_us">
									<option value="< 25%">< 25%</option>
									<option value="25% - 35%">25% - 35%</option>
									<option value="35% - 50%">35% - 50%</option>
									<option value="> 50%">> 50%</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="s-usa-label">Gross Margin<br><p class="label-ket">(Omzet - Harga pokok) / Omzet</p></td>
							<td class="s-usa-input">
								<select name="gm_us">
									<option value="> 35%">> 35%</option>
									<option value="25% - 35%">25% - 35%</option>
									<option value="10% - 25%">10% - 25%</option>
									<option value="< 10%">< 10%</option>
								</select>
							</td>
						</tr>

					</table>
					<center>
					<?php if ($save == true): ?>
						<button class="save-survei" type="submit" name="save">Simpan Survei</button>
					<?php else: ?>
						<button class="disabled-survei" type="button" disabled>Pilih kode pembiayaan</button>
					<?php endif; ?>
					</center>
				</form>
			</div>

			<!-- CONTINUE -->

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