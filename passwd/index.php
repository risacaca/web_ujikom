<?php
	session_start();
	
	require_once('../config/connection.php');
	require_once('../config/global_function.php');
	
	$getURL=$_SERVER['REQUEST_URI'];
	if ($_SESSION['status']!="login") {
		header("location:../index.php?error=loginfirst");
	}else{
		
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Change Password</title>
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
    <link rel="stylesheet" type="text/css" href="../assets/datatables/lib/css/dataTables.bootstrap.min.css"/>

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
            <!-- Start -->

            <div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Ganti Password</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Ganti Password</div>
									<div class="card-category">Untuk Keamanan masukan Username dan Password lama anda</div>
								</div>
								<form id="changepass" action="changepass.php" method="POST">
									<div class="card-body">
										<div class="form-group form-show-validation row">
											<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama <span class="required-label">*</span></label>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengguna" value="<?php echo $_SESSION['nama'];?>" readonly>
											</div>
										</div>
										<div class="form-group form-show-validation row">
											<label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username <span class="required-label">*</span></label>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="username-addon">@</span>
													</div>
													<input type="email" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon" id="username" name="username" required>
												</div>
											</div>
										</div>
										<div class="form-group form-show-validation row">
											<label for="oldpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password Lama <span class="required-label">*</span></label>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Masukan Password Lama" required>
											</div>
										</div>
										<div class="form-group form-show-validation row">
											<label for="newpass" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password Baru<span class="required-label">*</span></label>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Masukan Password Baru min 8 karakter" minlength="8" required>
											</div>
										</div>
										<div class="form-group form-show-validation row">
											<label for="newpass2" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password Baru<span class="required-label">*</span></label>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Masukan Password Baru min 8 karakter" minlength="8" required>
											</div>
										</div>
									</div>
									<div class="card-action">
										<div class="row" align="right">
											<div class="col-md-12">
												<input class="btn btn-success" type="submit" value="Ganti Password">
												<button class="btn btn-danger" onclick="history.back()" type="button";>Batal</button>
											</div>										
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

            <!-- End -->
		</div>
	</div>
	</div>
<?php include('../view/script.php'); ?>
<?php include('../view/datatable.php'); ?>
</body>
</html>