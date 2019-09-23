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
				<li class="menu menu1">
					<a href="komite-page1.php" class="passive"><img src="../src/img/menu-icon/verif-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="komite-page2.php" class="active"><img src="../src/img/menu-icon/statistics-red.svg"></a>
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
		<section class="section1 record">
			<div data-aos="fade-right"><p>Record Pembiayaan</p></div>
			<hr>
		</section>
		<section class="section2 record-usaha-area">
			<div class="record-usaha-col1">
				<div class="search-area">
					<form method="POST" action="komite-page2.php" autocomplete="off">
						<input type="text" class="search-inbox" placeholder="Cari Nasabah.." name="cari_nasabah">
						<button type="submit" class="search-btn" name="search"><img src='../src/img/search-icon.svg'></button>
					</form>
				</div>
				<!-- Nasabah List -->
				<div class="db-nasabah-area">
					<table class="db-nasabah-table">
					<?php
					require_once'koneksi_record-usaha.php';
					if (isset($_POST['search'])) {
						$cari_nasabah = $_POST['cari_nasabah'];
						$sql = "SELECT id_n, nama_n FROM nasabah WHERE nama_n LIKE '%$cari_nasabah%'";
						$result = $conn-> query($sql);
						if ($result-> num_rows > 0) {
							while ($row = $result-> fetch_assoc()) {
								echo
									"<tr class='nasbah-record'>
										<td class='id_n-nasabah'>". $row['id_n'] . "</td>
										<td class='nama_n-nasabah'>". $row['nama_n'] . "</td>
										<td class='lihat-nasabah'><a class='lihat-btn' href='komite-page2.php?select=". $row['id_n'] ."'>Pilih</a></td>
									</tr>";
							}
							echo "</table>";
						}
					} else {
						$sql = "SELECT id_n, nama_n FROM nasabah";
						$result = $conn-> query($sql);
						if ($result-> num_rows > 0) {
							while ($row = $result-> fetch_assoc()){
								echo
									"<tr class='nasbah-record'>
										<td class='id_n-nasabah'>". $row['id_n'] . "</td>
										<td class='nama_n-nasabah'>". $row['nama_n'] . "</td>
										<td class='lihat-nasabah'><a class='lihat-btn' href='komite-page2.php?select=". $row['id_n'] ."'>Pilih</a></td>
									</tr>";
							}
							echo "</table>";
						}
					}
					?>	
				</div>
				<!-- Nasabah List -->
			</div>
			<div class="record-usaha-col2">
				<div class="border-pemb-area">
					<h4>Rekam Pembiayaan</h4>
					<!-- Rekam Pembiayaan Nasabah -->
					<table class="db-pembiayaan-table">
						<tr>
							<th class="kd_p-pembiayaan">KD Pembiayaan</th>
							<th class="id_n-pembiayaan">ID Nasabah</th>
							<th class="preview-pemb"></th>
						</tr>
					<?php
						if (isset($_GET['select'])) {
							$id_n = $_GET['select'];
							$sql = "SELECT kd_p, id_n FROM pembiayaan WHERE id_n = $id_n";
							$result = $conn-> query($sql);
							if ($result-> num_rows > 0) {
								while ($row = $result-> fetch_assoc()) {
									echo
										"<tr class='pembiayaan-record'>
											<td class='kd_p-pembiayaan'>". $row['kd_p'] ."</td>
											<td class='id_n-pembiayaan'>". $row['id_n'] ."</td>
											<td class='preview-pemb'><a href='komite-page2.php?preview=". $row['kd_p'] ."'>Preview</a></td>
										</tr>";	
								}
							}
						}
					?>
					</table>
					<!-- Rekam Pembiayaan Nasabah -->
				</div>
			</div>
			<div class="record-usaha-col3">
				<div class="record-usaha-row1">
					<div class="statistik-omset-area">
						<h4>Statistik Keuangan Usaha</h4>
						<!-- Statistik Omset -->
						<canvas id="omset-chart"></canvas>
					</div>
				</div>
				<div class="record-usaha-row2">
					<div class="record-usaha-row2-col1">
						<div class="data-usaha-area">
							<h5>Data Usaha</h5>
							<table>
								<tr>
									<td class="label-u">Nama Usaha</td>
									<td class="record-u">:&nbsp;<?php echo $nama_u; ?></td>
								</tr>
								<tr>
									<td class="label-u">Bentuk Usaha</td>
									<td class="record-u">:&nbsp;<?php echo $bentuk_u; ?></td>
								</tr>
								<tr>
									<td class="label-u">Bidang Usaha</td>
									<td class="record-u">:&nbsp;<?php echo $bidang_u; ?></td>
								</tr>
								<tr>
									<td class="label-u">Karyawan</td>
									<td class="record-u">:&nbsp;<?php echo $jml_kar_u; ?></td>
								</tr>
								<tr>
									<td class="label-u">Alamat Usaha</td>
									<td class="record-u">:&nbsp;<?php echo $alamat_u; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="record-usaha-row2-col2">
						<div class="data-pemb-area">
						<h5>Data Pembiayaan</h5>
							<table>
								<tr>
									<td class="label-p">Nominal</td>
									<td class="record-p">:&nbsp;
										<?php if($nominal_p == ''): ?>
											<?php echo $nominal_p; ?>
										<?php else: ?>
											<?php echo "Rp. ".$nominal_p; ?>
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td class="label-p">Jangka</td>
									<td class="record-p">:&nbsp;
										<?php if($jangka_p == ''): ?>
											<?php echo $jangka_p; ?>
										<?php else: ?>
											<?php echo $jangka_p." Bulan"; ?>
										<?php endif; ?>	
									</td>
								</tr>
								<tr>
									<td class="label-p">Tanggal</td>
									<td class="record-p">:&nbsp;
										<?php if($tgl_awal == ''): ?>
											<?php echo $tgl_awal; ?>
										<?php else: ?>
											<?php echo $tgl_awal." s/d ".$tgl_akhir; ?>
										<?php endif; ?>	
									</td>
								</tr>
								<tr>
									<td class="label-p">Angsuran</td>
									<td class="record-p">:&nbsp;
										<?php if($pokok == ''): ?>
											<?php echo $pokok; ?>
										<?php else: ?>
											<?php echo "Rp. ".$pokok; ?>
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td class="label-p">Status</td>
									<td class="record-p">:&nbsp;<?php echo $stat_pemb; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="record-usaha-row2-col3">
						<div class="omset-area">
							<h4>Pertumbuhan</h4>
							<?php if($omset_stat == 'meningkat'): ?>
								<center>
								<p class="omset-percentage"><?php echo $omset_round ."%"; ?></p>
								<p class="omset-naik"><?php echo $omset_stat; ?></p>
								</center>
							<?php elseif($omset_stat == 'menurun'): ?>
								<center>
								<p class="omset-percentage"><?php echo $omset_round ." %"; ?></p>
								<p class="omset-turun"><?php echo $omset_stat; ?></p>
								</center>
							<?php elseif($omset_stat == 'tetap'): ?>
								<center>
								<p class="omset-percentage"><?php echo $omset_round ." %"; ?></p>
								<p class="omset-tetap"><?php echo $omset_stat; ?></p>
								</center>
							<?php else: ?>
								<center>
								<p><?php echo $omset_stat; ?></p>
								</center>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<!--End of Main content-->
	<!--JavaScript goes here-->
	<script type="text/javascript" src="../src/js/Chart.min.2.7.2.js"></script>
	<script type="text/javascript" src="../src/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="aos.js"></script>
	<script type="text/javascript">
    	AOS.init();
	</script>
	<script>
		var ctx = document.getElementById("omset-chart").getContext('2d');
    	var myChart = new Chart(ctx, {
        type: 'line',
		data: {
		    labels: [1,2,3,4,5,6,7,8,9,10,12],
		    datasets: 
		    [{
		        label: 'Omset',
		        data: [ <?php echo $m1_o; ?>,
		                <?php echo $m2_o; ?>,
		                <?php echo $m3_o; ?>,
		                <?php echo $m4_o; ?>,
		                <?php echo $m5_o; ?>,
		                <?php echo $m6_o; ?>,
		                <?php echo $m7_o; ?>,
		                <?php echo $m8_o; ?>,
		                <?php echo $m9_o; ?>,
		                <?php echo $m10_o; ?>,
		                <?php echo $m11_o; ?>,
		                <?php echo $m12_o; ?>  ],
		        backgroundColor: 'transparent',
		        borderColor:'rgb(43,45,66)',
		        borderWidth: 3
		    },

		    {
		        label: 'Harga Pokok',
		        data: [ <?php echo $hp1; ?>,
		                <?php echo $hp2; ?>,
		                <?php echo $hp3; ?>,
		                <?php echo $hp4; ?>,
		                <?php echo $hp5; ?>,
		                <?php echo $hp6; ?>,
		                <?php echo $hp7; ?>,
		                <?php echo $hp8; ?>,
		                <?php echo $hp9; ?>,
		                <?php echo $hp10; ?>,
		                <?php echo $hp11; ?>,
		                <?php echo $hp12; ?>  ],
		        backgroundColor: 'transparent',
		        borderColor:'rgb(141,153,174)',
		        borderWidth: 3
		    },

		    {
		        label: 'Profit',
		        data: [ <?php echo $m1_p; ?>,
		                <?php echo $m2_p; ?>,
		                <?php echo $m3_p; ?>,
		                <?php echo $m4_p; ?>,
		                <?php echo $m5_p; ?>,
		                <?php echo $m6_p; ?>,
		                <?php echo $m7_p; ?>,
		                <?php echo $m8_p; ?>,
		                <?php echo $m9_p; ?>,
		                <?php echo $m10_p; ?>,
		                <?php echo $m11_p; ?>,
		                <?php echo $m12_p; ?>  ],
		        backgroundColor: 'transparent',
		        borderColor:'rgb(216,0,50)',
		        borderWidth: 3	
		    }]
		},
		     
		options: {
			responsive: true,
    		maintainAspectRatio: false,
		    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		    tooltips:{mode: 'index'},
		    legend:{display: true, position: 'right', labels: {fontColor: 'rgb(0,0,0)', fontSize: 12, fontFamily: 'Open sans'}}
		}
		});
	</script>
	<!--End of JavaScript-->
</body>
</html>