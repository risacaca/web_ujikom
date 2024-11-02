<?php
session_start();
$getURL = $_SERVER['REQUEST_URI'];
if ($_SESSION['status'] != "login") {
	header("location:../index.php?error=loginfirst");
}
require_once('../config/connection.php');
require_once('../config/global_function.php');
$data = getData('barang');
$nomor = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sisfo Peminjaman Barang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

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
		<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Daftar Barang</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb_aneh" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>ID</th> -->
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th align="center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $items) : ?>
                                        <?php $nomor++; ?>
                                        <tr>
                                            <td><?php echo "$nomor"; ?></td>
                                            <!-- <td><?php echo "$items[id]"; ?></td> -->
                                            <td><?php echo "$items[kode_brg]"; ?></td>
                                            <td><?php echo "$items[nama_brg]"; ?></td>
                                            <td><?php echo "$items[kategori]"; ?></td>
                                            <td><?php echo "$items[merk]"; ?></td>
                                            <td align="center"><?php echo "$items[jumlah]"; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		</div>
	</div>
	</div>
	
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="../assets/js/plugin/moment/moment.min.js"></script>
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<script src="../assets/js/plugin/gmaps/gmaps.js"></script>
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="../assets/js/ready.min.js"></script>
	<script src="../assets/js/setting-demo.js"></script>
	<?php include('../view/datatable.php'); ?>
</body>

</html>