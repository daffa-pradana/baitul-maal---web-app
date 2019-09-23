<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
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
					    <td><img src="../src/img/user.svg"></td>
					    <td class="nama"><h5>John Doe</h5><p class="jabatan">Ketua</p></td>
					  </tr>
					</table>
				</div>
				<!--End of User profile-->
			</li>
			<!--Navbar menu-->
			<div class="main-menu">
				<li class="menu menu1">
					<a href="admin-dashboard.html" class="active"><img src="../src/img/menu-icon/home-grey.svg"></a>
				</li>
				<li class="menu menu2">
					<a href="admin-data.html" class="passive"><img src="../src/img/menu-icon/database-grey.svg"></a>
				</li>
				<li class="menu-active">
					<a href="admin-statistik.html" class="passive"><img src="../src/img/menu-icon/statistics-red.svg"></a>
				</li>
				<li class="keluar">
					<a href="#" class="passive"><img src="../src/img/menu-icon/keluar-white.svg"></a>
				</li>
			</div>
			<!--End of Navbar menu-->
		</ul>
	</nav>
	<!--End of Navbar-->
	<!--Main content-->
	<main>
		<section class="section1 statistics">
			<div data-aos="fade-right"><p>Statistics</p></div>
			<hr>
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