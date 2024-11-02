<?php
require_once('../config/connection.php');
require_once('../config/global_function.php');
ini_set('date.timezone', 'Asia/Jakarta');
$data = getPinjaman();
$nomor = 0;
?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Peminjaman Barang</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!-- <h4 class="card-title">Add Row</h4> -->
                            <a href="barang.php" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Daftar Barang
                                </button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Add -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h3 class="modal-title">
                                            <span class="fw-mediumbold">Peminjaman Barang</span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <p class="small">Tambah data barang baru</p> -->
                                        <form action="/config/global_function.php?action=insert&table=peminjaman" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Identitas</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Lengkap</label>
                                                        <input id="namaMember" name="namaMember" type="text" class="form-control" placeholder="Masukkan Nama Member" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Status</label>
                                                        <select class="form-control input-square" id="status" name="status">
                                                            <option>Coach</option>
                                                            <option>Student</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Username</label>
                                                        <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Role</label>
                                                        <select class="form-control input-square" id="role" name="role">
                                                            <option>Admin</option>
                                                            <option>User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>kontak</label>
                                                        <input id="kontak" name="kontak" type="text" class="form-control" placeholder="Masukkan no kontak" required>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                        <div class="table-responsive">
                            <table id="tb_aneh" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>No Identitas</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Keperluan</th>
                                        <!-- <th>Status</th> -->
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $pinjam) : ?>
                                        <?php $nomor++; ?>
                                        <tr>
                                            <td><?php echo "$nomor"; ?></td>
                                            <td><?php echo date("j F Y", strtotime("$pinjam[tgl_pinjam]")); ?></td>
                                            <td><?php echo date("j F Y", strtotime("$pinjam[tgl_skembali]")); ?></td>
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
                                                    <a href="" class="btn btn-default" data-toggle="modal" data-target="#kembali<?php echo "$pinjam[id]"; ?>">Kembalikan</a>
                                                    <?php }else{ ?>
                                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="" >Sudah Kembali</a>
                                                    <?php } ?>
                                                    &nbsp;
                                                    <!-- Form -->
                                                    <form action="/config/global_function.php?action=delete&table=peminjaman" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo "$pinjam[id]"; ?>">
                                                        <?php if ($pinjam['status'] == 'Belum Kembali') : ?>
                                                       
                                                        <?php else : ?>
                                                            
                                                        <?php endif ?>
                                                    </form>

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
                                                                    <?php
                                                                      $tglpinjam  = date_create($pinjam['tgl_skembali']);
                                                                      $kembaliin = date_create(); 
                                                                      $diff  = date_diff( $tglpinjam,$kembaliin );
                                                                      
                                                                      
                                                                    ?>
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
                                                <!-- End Modal Edit -->

                                                <!-- Modal Peminjaman -->
                                                <div class="modal fade" id="kembali<?php echo "$pinjam[id]"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Kembalikan Barang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin? pastikan barang yang dikembalikan sudah sesuai dengan data peminjaman
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <!-- <form action="/config/global_function.php?id=action=update&table=peminjaman" method="post"> -->
                                                                <form action="/config/global_function.php?action=update&table=peminjaman" method="post">
                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $pinjam['id']; ?>">
                                                                     
                                                                    <button type="submit" class="btn btn-primary">Kembalikan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Peminjaman -->
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
</div>