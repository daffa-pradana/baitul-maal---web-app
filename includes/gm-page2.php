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
				<li class="menu menu1">
					<a href="gm-page1.php" class="active"><img src="../src/img/menu-icon/statistics-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="gm-page2.php" class="passive"><img src="../src/img/menu-icon/employee-red.svg"></a>
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
		<section class="section1 karyawan">
			<div data-aos="fade-right"><p>Karyawan</p></div>
			<hr>
		</section>
		<section class="section2 db-karyawan">
			<!--Database Connection-->
			<?php
				$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
				$result = $mysqli->query("SELECT * FROM karyawan") or die($mysqli->error);
			?>
			<!--Database Connection-->
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
							</tr>
					<?php endwhile; ?>
					<!--AUTO INCREMENT TABLE-->
				</table>
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