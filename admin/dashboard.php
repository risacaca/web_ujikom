<?php
	require_once('../config/connection.php');
	require_once('../config/global_function.php');
	$getUrl=$_SERVER['REQUEST_URI'];
	$barangCount=getCount('barang');
	$userCount=getCountmember('user');
	$kembali=getCountStatus('peminjaman','Kembali');
	$belumkembali=getCountStatus('peminjaman','Belum Kembali');
	$today=getTodayPeminjaman();
	$tops=getTopPinjam();
?>
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Dashboard</h4>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="far fa-newspaper"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Jumlah Asset</p>
									<h4 class="card-title"><?php echo $barangCount; ?> Unit</h4>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Jumlah Pengguna</p>
									<h4 class="card-title"><?php echo $userCount; ?> User</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="far fa-check-circle"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Sudah Kembali</p>
									<h4 class="card-title"><?php echo $kembali; ?> Transaksi</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="far fa-chart-bar"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Belum Kembali</p>
									<h4 class="card-title"><h4 class="card-title"><?php echo $belumkembali; ?> Transaksi</h4></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">User Statistics</div>
							<div class="card-tools">
								<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
									<span class="btn-label">
										<i class="fa fa-pencil"></i>
									</span>
									Export
								</a>
								<a href="#" class="btn btn-info btn-border btn-round btn-sm">
									<span class="btn-label">
										<i class="fa fa-print"></i>
									</span>
									Print
								</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="chart-container" style="min-height: 375px">
							<canvas id="statisticsChart"></canvas>
						</div>
						<div id="myChartLegend"></div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
		<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Peminjaman</div>
							<div class="card-tools">
								<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
					<?php foreach ($today as $hari) : ?>
						<div class="d-flex">
							<div class="avatar avatar-online">
								<span class="avatar-title rounded-circle border border-white bg-info">P</span>
							</div>
							<div class="flex-1 ml-3 pt-1">
								<h5 class="text-uppercase fw-bold mb-1"><?php echo $hari['nama']; ?> <span class="text-warning pl-3"><?php echo $hari['status']; ?></span></h5>
								<span class="text-muted"><?php echo $hari['kode_brg']; ?>| <?php echo $hari['nama_brg']; ?>| <?php echo $hari['jumlah']; ?> Unit</span>
							</div>
							<div class="float-right pt-1">
								<small class="text-muted"><?php echo $hari['Jam']; ?></small>
							</div>
						</div>
						<div class="separator-dashed"></div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Paling Banyak Dipinjam</div>
					</div>
					<div class="card-body pb-0">
							<?php foreach ($tops as $items) : ?>
							<div class="d-flex">
							<div class="avatar">
								<img src="../assets/img/logoproduct2.svg" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="flex-1 pt-1 ml-2">
								<h5 class="fw-bold mb-1"><?php echo $items['nama_brg']; ?></h5>
								<small class="text-muted"><?php echo $items['kode_brg']; ?></small>
							</div>
							<div class="d-flex ml-auto align-items-center">
								<h3 class="text-info fw-bold"><?php echo $items['Jumlah']; ?> Kali</h3>
							</div>
						</div>
						<div class="separator-dashed"></div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
