<?php
	session_start();
	$getURL=$_SERVER['REQUEST_URI'];
	if ($_SESSION['status']!="login") {
		header("location:../index.php?error=loginfirst");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sisfo Peminjaman Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header" data-background-color="purple">
			<?php
			include('../view/header.php');
			?>
		</div>
		<div class="sidebar">
			<?php include('../view/sidebar.php'); ?>
		</div>
		<div class="main-panel">
			<?php
			echo"$getURL";
			include('dashboard.php'); 
			?>
		</div>
	</div>
	</div>
<?php include('../view/script.php'); ?>
</body>
</html>