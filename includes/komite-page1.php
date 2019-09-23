<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['komite'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['komite'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="komite.css?v=<?php echo time(); ?>">
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
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">Komite Pembiayaan</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu-active">
					<a href="komite-page1.php" class="active"><img src="../src/img/menu-icon/verif-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="komite-page2.php" class="passive"><img src="../src/img/menu-icon/statistics-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="komite-page3.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
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
		<section class="section1 persetujuan">
			<div data-aos="fade-right"><p>Form Persetujuan</p></div>
			<hr>
		</section>
		<section class="section2 pers-area">
			<div class="pers-col-1">
				<div class="pers-db-area">
					<!-- Database Connection -->
					<?php require_once 'koneksi_persetujuan.php'; ?>
					<?php
						$sudah_surv = 'sudah disurvei';
						$belum_pers = 'belum disetujui';
						$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
						$result = $mysqli->query("SELECT * FROM pembiayaan WHERE stat_surv = '$sudah_surv' AND stat_pers = '$belum_pers'") or die($mysqli->error);
					?>
					<!-- Database Connection -->
					<table class="table pers-db-table">
						<thead>
							<tr>
								<th class="kd_p-pers">KD Pemb</th>
								<th class="id_n-pers">ID Nasabah</th>
								<th class="stat_pers">Status Persetujuan</th>
								<th class="act-pers"></th>
							</tr>
						</thead>
						<!-- Auto Increment Row -->
						<?php while ($row = $result ->fetch_assoc()): ?>
							<tr class="pers-record">
								<td class="kd_p-pers"><?php echo $row['kd_p']?></td>
								<td class="id_n-pers"><?php echo $row['id_n']?></td>
								<td class="stat_pers"><?php echo $row['stat_pers']?></td>
								<td class="act-pers act-pers-record">
									<a href="komite-page1.php?select=<?php echo $row['kd_p']; ?>" class="proses-btn">Proses</a>
								</td>
							</tr>
						<?php endwhile; ?>
						<!-- Auto Increment Row -->
					</table>
				</div>
				<div class="nasabah-db-area">
					<center>
					<h6>Data Nasabah Pemohon</h6>
					</center>
					<table class="nasabah-db-table">
						<tr>
							<td class="nasabah-db-label">Nama</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $nama_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Jenis Kelamin</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $jk_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">No.HP</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $hp_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">NIK</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $nik_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">No.KK</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $kk_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Alamat</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $alamat_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">RT / RW</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $rt_n; ?> / <?php echo $rw_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Kelurahan</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $kel_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Kecamatan</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $kec_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Kode Pos</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $pos_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Agama</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $agama_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Pendidikan Terakhir</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $pendidikan_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Pekerjaan</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $pekerjaan_n; ?></td>
						</tr>
						<tr>
							<td class="nasabah-db-label">Penghasilan</td>
							<td class="nasabah-db-data">&nbsp;&nbsp;: <?php echo $penghasilan_n; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="pers-col-2">
				<div class="display-col1">
					<!-- Survei Kondisi Data -->
					<div class="survei-kondisi">
						<h5>Survei Kondisi</h5>
						<!-- Keluarga yang tinggal -->
						<p>Nama anggota keluarga yang tinggal</p>
						<table class="survei-kondisi-table1">
							<tr>
								<td class="survei-kondisi-label">Istri / Suami</td>
								<td class="survei-kondisi-data">: <?php echo $is_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Ibu Kandung</td>
								<td class="survei-kondisi-data">: <?php echo $ibu_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Ayah Kandung</td>
								<td class="survei-kondisi-data">: <?php echo $ayah_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Anak ke-1</td>
								<td class="survei-kondisi-data">: <?php echo $anak1_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Anak ke-2</td>
								<td class="survei-kondisi-data">: <?php echo $anak2_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Anak ke-3</td>
								<td class="survei-kondisi-data">: <?php echo $anak3_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Cucu ke-1</td>
								<td class="survei-kondisi-data">: <?php echo $cucu1_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Cucu ke-2</td>
								<td class="survei-kondisi-data">: <?php echo $cucu2_ts; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Cucu ke-3</td>
								<td class="survei-kondisi-data">: <?php echo $cucu3_ts; ?></td>
							</tr>
						</table>
						<!-- Kondisi Rumah -->
						<p>Kondisi Rumah:</p>
						<table class="survei-kondisi-table2">
							<tr>
								<td class="survei-kondisi-label">Lokasi Rumah</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $lokasi_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Kepemilikan</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $milik_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Luas Rumah</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $ukuran_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Dinding</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $dinding_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Lantai</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $lantai_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Atap</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $atap_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Pintu</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $pintu_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Jendela</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $jendela_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Jamban</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $jamban_rs; ?></td>
							</tr>
							<tr>
								<td class="survei-kondisi-label">Jenis Toilet</td>
								<td class="survei-kondisi-data">:&nbsp;<?php echo $toilet_rs; ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="display-col2">
					<!-- Survei Karakter Data -->
					<div class="survei-karakter">
						<h5>Survei Karakter</h5>
						<table class="survei-karakter-table">
							<tr>
								<td>
									<!-- Survei Karakter 1 -->
									<?php if ($karakter1_s == 'ya'): ?>
										<p>Pemohon Pernah memiliki pinjaman</p>
									<?php elseif ($karakter1_s == 'tidak'): ?>
										<p>Pemohon Tidak pernah memiliki pinjaman</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<!-- Survei Karakter 2 -->
									<?php if ($karakter2_s == 'ya'): ?>
										<p>Pemohon sering ingkar janji</p>
									<?php elseif ($karakter2_s == 'tidak'): ?>
										<p>Pemohon tidak sering ingkar janji</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<!-- Survei Karakter 3 -->
									<?php if ($karakter3_s == 'ya'): ?>
										<p>Pemohon rajin beribadah</p>
									<?php elseif ($karakter3_s == 'tidak'): ?>
										<p>Pemohon tidak pernah memiliki pinjaman</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<!-- Survei Karakter 4 -->
									<?php if ($karakter4_s == 'ya'): ?>
										<p>Pemohon rajin mengikuti pengajian dan sholat berjamaah</p>
									<?php elseif ($karakter4_s == 'tidak'): ?>
										<p>Pemohon tidak rajin mengikuti pengajian dan sholat berjamaah</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<!-- Survei Karakter 5 -->
									<?php if ($karakter5_s == 'ya'): ?>
										<p>Pemohon pernah mengemis / meminta-minta</p>
									<?php elseif ($karakter5_s == 'tidak'): ?>
										<p>Pemohon tidak pernah mengemis / meminta-minta</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>
									<!-- Survei Karakter 6 -->
									<?php if ($karakter6_s == 'ya'): ?>
										<p>Pemohon pernah berjudi/mabuk/melacur/berzina</p>
									<?php elseif ($karakter6_s == 'tidak'): ?>
										<p>Pemohon tidak pernah berjudi/mabuk/melacur/berzina</p>
									<?php else: ?>
										<p></p>
									<?php endif; ?>
								</td>
							</tr>
						</table>
					</div>
					<!-- Survei Usaha Data -->
					<div class="survei-usaha">
						<h5>Survei Usaha</h5>
						<table class="survei-usaha-table">
							<tr>
								<td class="survei-usaha-label">Kelompok bidang usaha</td>
								<td class="survei-usaha-data">: <?php echo $bidang_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Jenis produk yang ditawarkan</td>
								<td class="survei-usaha-data">: <?php echo $produk_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Jumlah tenaga kerja</td>
								<td class="survei-usaha-data">: <?php echo $karyawan_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Jarak usaha dengan BMT</td>
								<td class="survei-usaha-data">: <?php echo $jarak_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Kondisi Usaha 1</td>
								<td class="survei-usaha-data">
									<?php if ($kondisi1_us == 'bangunan permanen'): ?>
										<p>: Bangunan bersifat permanen</p>
									<?php elseif ($kondisi1_us == 'bangunan semi permanen'): ?>
										<p>: Bangunan bersifat semi permanen</p>
									<?php elseif ($kondisi1_us == 'bangunan tidak permanen'): ?>
										<p>: Bangunan bersifat tidak permanen</p>
									<?php elseif ($kondisi1_us == 'tidak menetap'): ?>
										<p>: Bangunan tidak menetap</p>
									<?php elseif ($kondisi1_us == 'akses sangat baik'): ?>
										<p>: Usaha memiliki akses yang sangat baik</p>
									<?php elseif ($kondisi1_us == 'akses baik'): ?>
										<p>: Usaha memiliki akses yang baik</p>
									<?php elseif ($kondisi1_us == 'akses cukup baik'): ?>
										<p>: Usaha memiliki akses yang cukup baik</p>
									<?php elseif ($kondisi1_us == 'akses tidak baik'): ?>
										<p>: Usaha memiliki akses yang tidak baik</p>
									<?php else: ?>
										<p>:</p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Kondisi Usaha 2</td>
								<td class="survei-usaha-data">
									<?php if ($kondisi2_us == 'pasar dan sekitarnya'): ?>
										<p>: Usaha berada di pasar dan sekitarnya</p>
									<?php elseif ($kondisi2_us == 'jalan raya'): ?>
										<p>: Usaha berada di pinggir jalan raya</p>
									<?php elseif ($kondisi2_us == 'gang'): ?>
										<p>: Usaha berada di dalam gang</p>
									<?php elseif ($kondisi2_us == 'tidak menetap'): ?>
										<p>: Usaha berada di lokasi yang tidak menentu</p>
									<?php elseif ($kondisi2_us == 'sesuai peruntukan'): ?>
										<p>: Usaha memiliki tempat sesuai peruntukan</p>
									<?php elseif ($kondisi2_us == 'seizin lingkungan'): ?>
										<p>: Usaha memiliki tempat seizin lingkungan</p>
									<?php elseif ($kondisi2_us == 'tidak memiliki izin'): ?>
										<p>: Usaha tidak memiliki izin</p>
									<?php elseif ($kondisi2_us == 'daerah terlarang'): ?>
										<p>: Usaha berada di tempat terlarang</p>
									<?php else: ?>
										<p>: </p>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Pengelolaan keuangan</td>
								<td class="survei-usaha-data">: <?php echo $kelola_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Ketersediaan bahan baku</td>
								<td class="survei-usaha-data">: <?php echo $sedia_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Jumlah pemasok</td>
								<td class="survei-usaha-data">: <?php echo $pemasok_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Persaingan usaha di lokasi</td>
								<td class="survei-usaha-data">: <?php echo $saingan_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Pengalaman berusaha</td>
								<td class="survei-usaha-data">: <?php echo $pengalaman_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Repayment Capacity Ratio</td>
								<td class="survei-usaha-data">: <?php echo $rcr_us;?></td>
							</tr>
							<tr>
								<td class="survei-usaha-label">Gross Margin</td>
								<td class="survei-usaha-data">: <?php echo $gm_us;?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="display-col3">
					<div class="form-persetujuan">
						<h5>Form Persetujuan</h5>
						<form method="POST" action="koneksi_persetujuan.php">
							<p>Nilai Kelayakan Survei</p>
							<input type="hidden" name="kd_p" value="<?php echo $kd_p;?>">
							<table>
								<tr>
									<td class="form-pers-label">Survei Kondisi</td>
									<td class="form-pers-input">:
										<Select name="survei_kondisi">
											<option value="">-- Nilai Kelayakan --</option>
											<option value="layak">Layak</option>
											<option value="tidak layak">Tidak Layak</option>
										</Select>
									</td>
								</tr>
								<tr>
									<td class="form-pers-label">Survei Karakter</td>
									<td class="form-pers-input">:
										<Select name="survei_karakter">
											<option value="">-- Nilai Kelayakan --</option>
											<option value="layak">Layak</option>
											<option value="tidak layak">Tidak Layak</option>
										</Select>
									</td>
								</tr>
								<tr>
									<td class="form-pers-label">Survei Prospek Usaha</td>
									<td class="form-pers-input">:
										<Select name="survei_usaha">
											<option value="">-- Nilai Kelayakan --</option>
											<option value="layak">Layak</option>
											<option value="tidak layak">Tidak Layak</option>
										</Select>
									</td>
								</tr>
							</table>
							<p>Dengan ini pengajuan pembiayaan oleh pemohon telah<br>
								<select class="stat-pers-select" name="stat_pers">
									<option value="disetujui">disetujui</option>
									<option value="ditolak">ditolak</option>
								</select>
							</p>
							<center>
								<?php if ($submit == true): ?>
								<input class="submit-pers-btn" type="submit" name="submit-persetujuan">
								<?php else: ?>
								<input class="submit-pers-btn-disabled" type="submit" name="submit-persetujuan" disabled>
								<?php endif; ?>
							</center>
						</form>
					</div>
				</div>
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