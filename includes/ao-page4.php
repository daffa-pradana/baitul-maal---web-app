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
				<li class="menu menu2">
					<a href="ao-page2.php" class="passive"><img src="../src/img/menu-icon/verif-grey.svg"></a>
				</li>
				<li class="menu menu3">
					<a href="ao-page3.php" class="passive"><img src="../src/img/menu-icon/savings-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="ao-page4.php" class="active"><img src="../src/img/menu-icon/event-red.svg"></a>
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
		</section>
		<section class="section2 acara-table-section">
		<!-- database connection -->
		<?php
			$mysqli = new mysqli('localhost','root','','bmt') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM acara WHERE peserta LIKE '%Account Officer%'") or die($mysqli->error);
		?>
		<!-- database connection -->
			<table class="table acara-table">
				<tr class="acara-head">
					<th class="no-acara">No</th>
					<th class="headline-acara"><span>Acara</span></th>
					<th class="tgl-acara">Tanggal</th>
					<th class="catatan-acara">Catatan</th>
					<th class="peserta-acara">Peserta</th>
				</tr>
				<!-- while loop record -->
				<?php
					while ($row = $result ->fetch_assoc()): 
				?><!--FETCH DATA from DATA BASE-->
				<tr class="acara-record">
					<td class="no-acara-record"><?php echo $row['no_acara']; ?></td>
					<td class="headline-acara-record"><?php echo $row['headline']; ?></td>
					<td class="tgl-acara-record"><?php echo $row['tgl']; ?></td>
					<td class="catatan-acara-record"><?php echo $row['catatan']; ?></td>
					<td class="peserta-acara-record"><?php echo $row['peserta']; ?></td>
				</tr>
				<?php endwhile; ?>
				<!-- while loop record -->
			</table>
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