<?php
require_once('../config/connection.php');
require_once('../config/global_function.php');
$data = getData('barang');
$nomor = 0;
?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Daftar Barang</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!-- <h4 class="card-title">Add Row</h4> -->
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Barang
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Add-->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h3 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Tambah</span>
                                            <span class="fw-light">
                                                Data Barang BARU
                                            </span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <p class="small">Tambah data barang baru</p> -->
                                        <form action="/config/global_function.php?action=insert&table=barang" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Kode Barang</label>
                                                        <input id="kodeBarang" type="text" name="kodeBarang" class="form-control" placeholder="Masukkan Kode Barang" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Barang</label>
                                                        <input id="namaBarang" name="namaBarang" type="text" class="form-control" placeholder="Masukkan Nama Barang" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori</label>
                                                        <input id="kategori" name="kategori" type="text" class="form-control" placeholder="Masukkan Kategori" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Merk</label>
                                                        <input id="merk" name="merk" type="text" class="form-control" placeholder="Masukkan Merk" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Jumlah</label>
                                                        <input id="jumlah" name="jumlah" type="number" class="form-control" placeholder="Masukkan Jumlah" required>
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
                                        <!-- <th>ID</th> -->
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th align="center">Jumlah</th>
                                        <th style="width: 10%"></th>
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
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal<?php echo "$items[id]"; ?>">Edit</a>
                                                    &nbsp;
                                                    <!-- Form -->
                                                    <form action="/config/global_function.php?action=delete&table=barang" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo "$items[id]"; ?>">
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove">Remove</button>
                                                    </form>
                                                    &nbsp;
                                                    <?php if ($items['jumlah'] > 0) { ?>
                                                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#pinjam<?php echo "$items[id]"; ?>">Pinjam</a>
                                                    <?php } else { ?>
                                                        <a href="" class="btn btn-default" data-toggle="modal" data-target="" <?php echo "$items[id]"; ?>">Kosong</a>
                                                    <?php } ?>
                                                </div>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modal<?php echo "$items[id]"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <h3 class="modal-title">
                                                                    <span class="fw-mediumbold">
                                                                        Update</span>
                                                                    <span class="fw-light">
                                                                        Data Barang
                                                                    </span>
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/config/global_function.php?action=update&table=barang" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-group-default">
                                                                                <input id="id" type="hidden" name="id" class="form-control" value="<?php echo $items['id']; ?>">
                                                                            </div>
                                                                            <div class="form-group form-group-default">
                                                                                <label>Kode Barang</label>
                                                                                <input id="kodeBarang" type="text" name="kodeBarang" class="form-control" placeholder="Masukkan Kode Barang" value="<?php echo $items['kode_brg']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Nama Barang</label>
                                                                                <input id="namaBarang" name="namaBarang" type="text" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo $items['nama_brg']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Kategori</label>
                                                                                <input id="kategori" name="kategori" type="text" class="form-control" placeholder="Masukkan Kategori" value="<?php echo $items['kategori']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Merk</label>
                                                                                <input id="merk" name="merk" type="text" class="form-control" placeholder="Masukkan Merk" value="<?php echo $items['merk']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Jumlah</label>
                                                                                <input id="jumlah" name="jumlah" type="number" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo $items['jumlah']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <button type="submit" id="updateRowButton" class="btn btn-primary">Update</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit -->

                                                <!-- Modal Pinjam -->

                                                <div class="modal fade" id="pinjam<?php echo "$items[id]"; ?>" tabindex="-1" role="dialog" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header no-bd">
                                                                <h3 class="modal-title">
                                                                    <span class="fw-mediumbold">
                                                                        Peminjaman</span>
                                                                    <span class="fw-light">
                                                                        Barang
                                                                    </span>
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/config/global_function.php?action=insert&table=peminjaman" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-group-default">
                                                                                <input id="id" type="hidden" name="id" class="form-control" value="<?php echo $items['id']; ?>">
                                                                            </div>

                                                                            <div class="form-group form-group-default">
                                                                                <label>No Identitas</label>
                                                                                <input id="no_identitas" type="text" name="no_identitas" placeholder="Masukkan No Identitas" value="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Kode Barang</label>
                                                                                <input id="kodeBarang" name="kodeBarang" type="text" class="form-control" placeholder="MMasukkan Kode Barang" value="<?php echo $items['kode_brg']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Nama Barang</label>
                                                                                <input id="namaBarang" name="namaBarang" type="text" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo $items['nama_brg']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Merk</label>
                                                                                <input id="merk" name="merk" type="text" class="form-control" placeholder="Masukkan Merk" value="<?php echo $items['merk']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Jumlah Pinjam</label>
                                                                                <input id="jumlah" name="jumlah" type="number" class="form-control" placeholder="Masukkan Jumlah" value="<?php echo $items['jumlah']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Keperluan</label>
                                                                                <textarea class="form-control" id="keperluan" name="keperluan" rows="5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <button type="submit" id="updateRowButton" class="btn btn-success">Pinjam</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Pinjam -->
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