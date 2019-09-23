<?php
	session_start();

	require_once('auth/user_auth.php');
	if (!isset($_SESSION['gm'])) {
		header('Location: ../index.php');
		exit();
	}

	$no_k = $_SESSION['gm'];
	$data_karyawan = get_data_karyawan($no_k);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="gm.css?v=<?php echo time(); ?>">
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
					    <td class="nama"><h5><?=$data_karyawan['nama_k'];?></h5><p class="jabatan">General Manager</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu-active">
					<a href="gm-page1.php" class="active"><img src="../src/img/menu-icon/statistics-red.svg"></a>
				</li>
				<li class="menu menu1">
					<a href="gm-page2.php" class="passive"><img src="../src/img/menu-icon/employee-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="gm-page3.php" class="passive"><img src="../src/img/menu-icon/event-grey.svg"></a>
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
	<?php require_once 'koneksi_statistik.php';?>
		<section class="section1 statistik">
			<div data-aos="fade-right"><p>Statistik</p></div>
			<hr>
		</section>
		<section class="section2 laporan-bmt-area">
			<div class="laporan-col1">
				<div class="laporan-pemb-row1">
					<div class="grafik-pemb-area">
						<h4>Statistik Pembiayaan</h4>
						<div class="grafik-pemb-col1">
							<canvas id="chart-stat_pemb"></canvas>
						</div>
						<div class="grafik-pemb-col2">
							<div class="pemb-col2-row1">
								<table>
									<tr>
										<td class="legend-color lancar"></td>
										<td class="legend-label"><p>Lancar</p></td>
									</tr>
									<tr>
										<td class="legend-color bermasalah"></td>
										<td class="legend-label"><p>Bermasalah</p></td>
									</tr>
								</table>
							</div>
							<div class="pemb-col2-row2">
								<h6>Data Pembiayaan</h6>
								<table class="db-pemb">
									<tr>
										<td class="db-pemb-label">Total</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $total_pemb; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Lancar</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $pemb_lancar; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Bermasalah</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $pemb_masalah; ?></td>
									</tr>
								</table>
								<h6>Pembiayaan Usaha</h6>
								<table class="db-usaha">
									<tr>
										<td class="db-pemb-label">Perdagangan</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $perdagangan; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Jasa</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $jasa; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Kulinari</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $kulinari; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Produksi</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $produksi; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Pertanian</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $pertanian; ?></td>
									</tr>
									<tr>
										<td class="db-pemb-label">Peternakan</td>
										<td class="db-pemb-record">:&nbsp;<?php echo $peternakan; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="laporan-pemb-row2">
					<div class="dana-sosial-area">
						<h4>Dana Sosial</h4>
						<div class="dansos-col1">
							<p>Pembiayaan terlaksana</p>
							<table>
								<tr>
									<td class="nominal-label">Rp.2.000.000</td>
									<td class="nominal-record">:&nbsp;<?php echo $nominal2jt;?>&nbsp;Pembiayaan</td>
								</tr>
								<tr>
									<td class="nominal-label">Rp.1.000.000</td>
									<td class="nominal-record">:&nbsp;<?php echo $nominal1jt;?>&nbsp;Pembiayaan</td>
								</tr>
							</table>
						</div>
						<div class="dansos-col2">
							<table>
								<tr>
									<td class="dansos-label">Total dana cair</td>
									<td class="dansos-record">:&nbsp;Rp.
										<?php echo number_format($total_cair, 0, ",", '.');?>
									</td>
								</tr>
								<tr>
									<td class="dansos-label">Total dana kembali</td>
									<td class="dansos-record">:&nbsp;Rp.
										<?php echo number_format($total_kembali, 0, ",", '.');?>
									</td>
								</tr>
							</table>
						</div>
						<div class="dansos-col3">
							<p class="dana-kembali-record"><?php echo $persen_kembali;?>%</p>
							<p class="dana-kembali-label">persentase dana kembali</p>	
						</div>
					</div>
				</div>
			</div>
			<div class="laporan-col2">
				<div class="nasabah-chart-area">
					<h4>Status Nasabah</h4>
					<div class="chart-nasabah">
						<canvas id="chart-nasabah"></canvas>
					</div>
					<div class="legend-nasabah">
						<div class="legend-nasabah-row1">
							<p class="persen-muzakki"><?php echo $persen_muzakki ;?>%</p>
							<p class="legend-muzakki">Nasabah Muzakki</P>
						</div>
						<div class="legend-nasabah-row2">
							<p class="persen-mustahik"><?php echo $persen_mustahik ;?>%</p>
							<p class="legend-mustahik">Nasabah Mustahik</P>
						</div>
					</div>		
				</div>
				<div class="nasabah-data-area">
					<h4>Data Nasabah</h4>
					<div class="nasabah-data-col1">
						<div class="nasabah-data-border1">
							<h5>Pendidikan terakhir</h5>
							<table>
								<tr>
									<td class="pendidikan-label">Tidak sekolah</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $ts; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">SD</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $sd; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">SMP</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $smp; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">SMA</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $sma; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">D3</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $d3; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">S1</td>
									<td class="pendidikan-record">:&nbsp;<?php echo $s1; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="nasabah-data-col2">
						<div class="nasabah-data-border2">
							<h5>Penghasilan:</h5>
							<table>
								<tr>
									<td class="penghasilan-label">< Rp.500,000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p1; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">Rp.500,000 - Rp.1,000,000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p2; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">Rp.1,000,000 - Rp.4,000,000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p3; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">Rp.4,000,000 - Rp.6,000,000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p4; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">Rp.6,000,000 - Rp.10,000,000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p5; ?></td>
								</tr>
								<tr>
									<td class="pendidikan-label">> Rp.10.000.000</td>
									<td class="penghasilan-record">:&nbsp;<?php echo $p6; ?></td>
								</tr>
							</table>
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
	<!-- Script For Line Chart -->
	<script type="text/javascript">
		var ctx = document.getElementById("chart-stat_pemb").getContext('2d');
		var gradientStroke1 = ctx.createLinearGradient(500, 0, 100, 0);
		gradientStroke1.addColorStop(0,"#2B2D42");
		gradientStroke1.addColorStop(1,"#474966");
		var gradientStroke2 = ctx.createLinearGradient(500, 0, 100, 0);
		gradientStroke2.addColorStop(0,"#D80032");
		gradientStroke2.addColorStop(1,"#EF233C");
		var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [2019,2020,2021,2022,2023],
			datasets: 
				[{
					label: 'Berhasil',
					data: [<?php echo implode(",", $berhasil);?>],
					borderColor: gradientStroke1,
					pointBorderColor: gradientStroke1,
					pointBackgroundColor: gradientStroke1,
					pointHoverBackgroundColor: gradientStroke1,
					pointHoverBorderColor: gradientStroke1,
					fill: false,
					borderWidth: 3
				},
				{
					label: 'Gagal',
					data: [<?php echo implode(",", $gagal);?>],
					borderColor: gradientStroke2,
					pointBorderColor: gradientStroke2,
					pointBackgroundColor: gradientStroke2,
					pointHoverBackgroundColor: gradientStroke2,
					pointHoverBorderColor: gradientStroke2,
					fill: false,
					borderWidth: 3  
				}]
				},            
				options: {
					responsive: true,
					maintainAspectRatio: false,
					tooltips:{mode: 'index'},
					legend:{display: false},
					scales:{
						yAxes:[{
							gridLines:{
								display:false
							}
						}
					], xAxes:[{
						gridLines:{
							display:false
						}
					}]}
				}
		});
	</script>
	<!-- Construct Chart -->
	<script>
		var canvas = document.getElementById("chart-nasabah");
		var ctx = canvas.getContext('2d');
		var data = {
			labels: ['Mustahik','Muzakki'],
			datasets: [
				{
					fill: true,	
					backgroundColor: [
						'#2B2D42',
						'#D80032'],
					data: [<?php echo $mustahik; ?>,<?php echo $muzakki; ?>],
				}
			]
		};
		// Notice the rotation from the documentation.
		var options = {
				responsive: true,
				maintainAspectRatio: false,
				rotation: -0.7 * Math.PI,
				legend:{display: false},
		};
		// Chart declaration:
		var myBarChart = new Chart(ctx, {
			type: 'pie',
			data: data,
			options: options
		});
	</script>
	<!-- Script For Pie Chart -->
	<!--End of JavaScript-->
</body>
</html>