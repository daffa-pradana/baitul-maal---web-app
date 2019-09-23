<?php
	ob_start();
	session_start();
	$con = new mysqli("localhost", "root", "", "bmt");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="index.css?v=<?php echo time(); ?>">
</head>
<body>
	<div id="wrapper" class="main">
		<center>
		<div class="logo">
			<img src="src/img/logo-putih.png">
		</div>
		</center>
		<form method="post" autocomplete="off">
			<div class="text-box">
				<img src="src/img/man-user.svg">
				<input type="email" placeholder="E-mail" name="email_k" required="">
			</div>
			<div class="text-box">
				<img src="src/img/lock.svg">
				<input type="password" placeholder="Password" name="pass_k" required="">
			</div>
			
			<input class="btn" type="submit" name="masuk" value="Masuk">
		</form>
		
	</div>
</body>
</html>
<?php
	if (isset($_POST['email_k'])){
		$email_k = $_POST['email_k'];
	}
	if (isset($_POST['pass_k'])){
		$pass_k = $_POST['pass_k'];	
	}


	if (isset($_POST['masuk'])) {
		$sql = $con->query("select * from karyawan where email_k='$email_k'");
		$data = $sql->fetch_array(MYSQLI_ASSOC);
		
		if (!empty($data)) {
			if($pass_k == $data['pass_k']) {
				if ($data['jabatan_k'] == "General Manager") {
					$_SESSION['gm'] = $data['no_k'];
					header("location:includes/gm-page1.php");
				}
				else if ($data['jabatan_k'] == "Admin") {
					$_SESSION['admin'] = $data['no_k'];
					header("location:includes/admin-page1.php");
				}
				else if ($data['jabatan_k'] == "Accounting Staff") {
					$_SESSION['as'] = $data['no_k'];
					header("location:includes/as-page1.php");
				}
				else if ($data['jabatan_k'] == "Account Officer") {
					$_SESSION['ao'] = $data['no_k'];
					header("location:includes/ao-page1.php");
				}
				else if ($data['jabatan_k'] == "Komite Pembiayaan") {
					$_SESSION['komite'] = $data['no_k'];
					header("location:includes/komite-page1.php");
				}
				else if ($data['jabatan_k'] == "Teller") {
					$_SESSION['teller'] = $data['no_k'];
					header("location:includes/teller-page1.php");
				}
			} else {
				echo "Password Salah";
			}
		} else {
			echo "Email Salah";
		}
	}
?>