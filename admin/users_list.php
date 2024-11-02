<?php
require_once('../config/connection.php');
require_once('../config/global_function.php');
// $data = getData('user');
$data = getUser();

$nomor = 0;
?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Manajemen Pengguna</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!-- <h4 class="card-title">Add Row</h4> -->
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Member
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
                                                Data Member
                                            </span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <p class="small">Tambah data barang baru</p> -->
                                        <form action="../config/global_function.php?action=insert&table=user" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Identitas</label>
                                                        <input id="NoIdentitas" type="text" name="NoIdentitas" class="form-control" placeholder="Masukan No Identitas" required>
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
                                        <th>No Identitas</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Kontak</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $user) : ?>
                                        <?php $nomor++; ?>
                                        <tr>
                                            <td><?php echo "$nomor"; ?></td>
                                            <td><?php echo "$user[no_identitas]"; ?></td>
                                            <td><?php echo "$user[nama]"; ?></td>
                                            <td><?php echo "$user[jabatan]"; ?></td>
                                            <td><?php echo "$user[username]"; ?></td>
                                            <td><?php echo "$user[role]"; ?></td>
                                            <td><?php echo "$user[kontak]"; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal<?php echo "$user[id]"; ?>">Edit</a>
                                                    &nbsp;

                                                    <!-- Form -->
                                                    <form action="../config/global_function.php?action=delete&table=user" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo "$user[id]"; ?>">
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove">Remove</button>
                                                    </form>

                                                </div>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modal<?php echo "$user[id]"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                <form action="../config/global_function.php?action=update&table=user" method="POST" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-group-default">
                                                                                <input id="id" type="hidden" name="id" class="form-control" value="<?php echo $user['id']; ?>">
                                                                            </div>
                                                                            <div class="form-group form-group-default">
                                                                                <label>No Identitas</label>
                                                                                <input id="NoIdentitas" type="text" name="NoIdentitas" class="form-control" placeholder="Masukkan No Identitas" value="<?php echo $user['no_identitas']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Nama Lengkap</label>
                                                                                <input id="namaMember" name="namaMember" type="text" class="form-control" placeholder="Masukkan Nama Member" value="<?php echo $user['nama']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Status</label>
                                                                                <select class="form-control input-square" id="role" name="status" value="<?php echo $user['status']; ?>">
                                                                                    <option>Coach</option>
                                                                                    <option>Student</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Username</label>
                                                                                <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username" value="<?php echo $user['username']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Password</label>
                                                                                <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password" value="<?php echo $user['password']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>Role</label>
                                                                                <select class="form-control input-square" id="role" name="role" value="<?php echo $user['role']; ?>">
                                                                                    <option>Admin</option>
                                                                                    <option>User</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pr-0">
                                                                            <div class="form-group form-group-default">
                                                                                <label>kontak</label>
                                                                                <input id="kontak" name="kontak" type="text" class="form-control" placeholder="Masukkan no kontak" value="<?php echo $user['kontak']; ?>" required>
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