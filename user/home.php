<?php
	require_once('../config/connection.php');
	require_once('../config/global_function.php');
    $nomor=0;
	$getUrl=$_SERVER['REQUEST_URI'];
	$kembali=getCountbyStatus('Kembali',$_SESSION['no_identitas']);
	$belumkembali=getCountbyStatus('Belum Kembali',$_SESSION['no_identitas']);
	$pinjaman=getPinjmanUser($_SESSION['nama']);
?>
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Dashboard</h4>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6">
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
			<div class="col-sm-6 col-md-6">
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
		<div class="row">
		<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Peminjaman</div>
							<div class="card-tools">
								<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link" id="pills-today" data-toggle="pill" href="" role="tab" aria-selected="true">History</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
                    <div class="table-responsive">
                            <table id="tb_aneh" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>No Identitas</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Keperluan</th>
                                        <th style="width: 10%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pinjaman as $pinjam) : ?>
                                        <?php $nomor++; ?>
                                        <tr>
                                            <td><?php echo "$nomor"; ?></td>
                                            <td><?php echo date("j F Y", strtotime("$pinjam[tgl_pinjam]")); ?></td>
                                            <td><?php echo "$pinjam[no_identitas]"; ?></td>
                                            <td><?php echo "$pinjam[nama]"; ?></td>
                                            <td><?php echo "$pinjam[kode_brg]"; ?></td>
                                            <td><?php echo "$pinjam[nama_brg]"; ?></td>
                                            <td><?php echo "$pinjam[jumlah]"; ?></td>
                                            <td><?php echo "$pinjam[keperluan]"; ?></td>
                                            <!-- <td><?php echo "$pinjam[status]"; ?></td> -->
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal<?php echo "$pinjam[id]"; ?>">Detail</a>
                                                    &nbsp;
                                                    <?php if ($pinjam['status'] == 'Belum Kembali') { ?>
                                                    <a href="" class="btn btn-default" data-toggle="modal" data-target="">Belum Kembali</a>
                                                    <?php }else{ ?>
                                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="" >Sudah Kembali</a>
                                                    <?php } ?>
                                                </div>
                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="modal<?php echo "$pinjam[id]"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <h3 class="modal-title">
                                                                    <span class="fw-mediumbold">
                                                                        Detail</span>
                                                                    <span class="fw-light">
                                                                        Peminjaman Barang
                                                                    </span>
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-group-default">
                                                                                <input id="id" type="hidden" name="id" class="form-control" value="<?php echo $pinjam['id']; ?>">
                                                                            </div>
                                                                            <div class="form-group form-group-default">
                                                                                <label>No Identitas</label>
                                                                                <input id="NoIdentitas" type="text" name="NoIdentitas" class="form-control" placeholder="No Identitas" value="<?php echo $pinjam['no_identitas']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Nama Lengkap</label>
                                                                                <input id="namaMember" name="namaMember" type="text" class="form-control" placeholder="Nama Member" value="<?php echo $pinjam['nama']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Jabatan</label>
                                                                                <input id="role" name="role" type="text" class="form-control" placeholder="Role" value="<?php echo $pinjam['jabatan']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Kode Barang</label>
                                                                                <input id="kode_brg" name="kode_brg" type="text" class="form-control" placeholder="Kode Barang" value="<?php echo $pinjam['kode_brg']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Nama Barang</label>
                                                                                <input id="nama_brg" name="nama_brg" type="text" class="form-control" placeholder="Nama Barang" value="<?php echo $pinjam['nama_brg']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                        <div class="form-group form-group-default">
                                                                                <label>Tanggal Pinjam</label>
                                                                                <input id="tgl_pinjam" name="tgl_pinjam" type="text" class="form-control" placeholder="Tanggal Pinjam" value="<?php echo $pinjam['tgl_pinjam']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Tanggal Kembali</label>
                                                                                <input id="ggl_kembali" name="tgl_kembali" type="text" class="form-control" placeholder="Tanggal Kembali" value="<?php echo $pinjam['tgl_kembali']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <!-- <button type="submit" id="updateRowButton" class="btn btn-primary">Update</button> -->
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Detail -->
                                            </td>
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
