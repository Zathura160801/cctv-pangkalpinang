<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                Identitas Users
                            </h3>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-data-users">
                                <i class="fa fa-plus"> Tambah </i>
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-above-identitas" role="tabpanel" aria-labelledby="custom-content-above-identitas-tab">
                                    <div class="card-body">
                                        <?= session()->get('pesan') ?>
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama User</th>
                                                    <th>Level</th>
                                                    <th>Nomor Hp</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($tampil_users as $baris) : ?>
                                                    <tr>
                                                        <td align="center"><?= $i++ ?></td>
                                                        <td><?= $baris['nama_u'] ?></td>
                                                        <td><?= $baris['alias_lev'] ?></td>
                                                        <td><?= $baris['no_hp_u'] ?></td>
                                                        <td><?= $baris['email_u'] ?></td>
                                                        <td class="project-state text-center">
                                                            <?php if ($baris['status_u'] == '1') : ?>
                                                                <span class="badge badge-success" style="font-size: 12px"> Aktif </span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger" style="font-size: 12px"> Tidak </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center py-0 align-middle">
                                                            <div class="btn-group btn-group-sm">
                                                                <a href="" class="btn btn-rounded btn-info" data-toggle="modal" title="Edit" data-target="#ubah-data-users<?= $baris['id_users'] ?>"><i class="fas fa-edit"></i></a>
                                                                <a href="" class="btn btn-rounded btn-danger" data-toggle="modal" title="Hapus" data-target="#modal-hapus-users<?= $baris['id_users'] ?>"><i class="fas fa-trash"></i></a>
                                                                <a href="" class="btn btn-rounded btn-primary" data-toggle="modal" title="Detail Users" data-target="#detail-users<?= $baris['id_users'] ?>"><i class="fas fa-id-card"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-------------------------------------- MODAL HAPUS DATA USERS ---------------------------------------->

                                <?php foreach ($tampil_users as $hapus_users) : ?>
                                    <div class="modal fade" id="modal-hapus-users<?= $hapus_users['id_users'] ?>">
                                        <div class="modal-dialog" role="document">
                                            <form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Users/hapus_users/<?= $hapus_users['id_users'] ?>" enctype="multipart/form-data">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Peringatan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus data user <?= $hapus_users['nama_u'] ?> ?
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" id="tambah">Hapus</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach ?>
                                <!-- /.container-fluid -->


                                <!-------------------------------------- MODAL TAMBAH DATA USERS ---------------------------------------->

                                <div class="modal fade" id="tambah-data-users">
                                    <div class="modal-dialog modal-lg">
                                        <form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Users/simpan_users" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data Users</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Nama Lengkap <code>*</code> </label>
                                                                <input type="text" name="nama_u" class="form-control" placeholder="Nama Lengkap" required="" value="<?= old('nama_u') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Email </label>
                                                                <input type="text" name="email_u" class="form-control" placeholder="Email" value="<?= old('email_u') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Nomor HP </label>
                                                                <input type="text" name="no_hp_u" class="form-control" placeholder="Nomor Hp" value="<?= old('tempat_lahir_d') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Level <code>*</code> </label>
                                                                <select name="id_level" class="form-control select2" data-width="100%" required="">
                                                                    <option value="">Pilih Level</option>
                                                                    <?php foreach ($data_level as $level) : ?>
                                                                        <option value="<?= $level['id_level'] ?>"><?= $level['alias_lev'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Status Users <code>*</code> </label>
                                                                <select name="status_u" class="form-control select2" data-width="100%" required="">
                                                                    <option value="">Pilih Opsi</option>
                                                                    <option value="0">Tidak Aktif</option>
                                                                    <option value="1">Aktif</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Upload Foto <code>*</code> </label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="foto_u" class="custom-file-input" id="exampleInputFile" required="">
                                                                        <label class="custom-file-label" for="exampleInputFile">Pilih File Disini</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <div class="text-center text-bold">
                                                                <h4> Buat Akun </h4>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Username </label>
                                                                <input type="text" name="username_u" class="form-control" placeholder="Username" required="true" value="<?= old('username_u') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label"> Password <code>*</code> </label>
                                                                <input type="password" name="password_u" class="form-control" placeholder="Password" required="true" value="<?= old('password_u') ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="tambah">Tambahkan Data</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </form>
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <!--------------------- END MODAL TAMBAH USERS ------------------->


                                <!-------------------------- MODAL UBAH DATA USERS ---------------------->
                                <?php foreach ($tampil_users as $ubah_users) : ?>
                                    <div class="modal fade" id="ubah-data-users<?= $ubah_users['id_users'] ?>">
                                        <div class="modal-dialog modal-lg">
                                            <form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Users/update_users/<?= $ubah_users['id_users'] ?>" enctype="multipart/form-data">
                                                <input type="hidden" name="id_users" value="<?= $ubah_users['id_users'] ?>">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Users</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Nama Lengkap <code>*</code> </label>
                                                                    <input type="text" name="nama_u" class="form-control" placeholder="Nama Lengkap" required="" value="<?= $ubah_users['nama_u'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Email </label>
                                                                    <input type="text" name="email_u" class="form-control" placeholder="Email" value="<?= $ubah_users['email_u'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Nomor HP </label>
                                                                    <input type="text" name="no_hp_u" class="form-control" placeholder="Nomor Hp" value="<?= $ubah_users['no_hp_u'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Level <code>*</code> </label>
                                                                    <select name="id_level" class="form-control select2" data-width="100%" required="">
                                                                        <option value="">Pilih Level</option>
                                                                        <?php foreach ($data_level as $level) : ?>
                                                                            <?php if ($ubah_users['id_level'] == $level['id_level']) : ?>
                                                                                <option value="<?= $level['id_level'] ?>" selected><?= $level['alias_lev'] ?></option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $level['id_level'] ?>"><?= $level['alias_lev'] ?></option>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Status Users <code>*</code> </label>
                                                                    <select name="status_u" class="form-control select2" data-width="100%" required="">
                                                                        <option value="">Pilih Opsi</option>
                                                                        <?php if ($ubah_users['status_u'] == 0) : ?>sssssssss rama busuk kayak ayam
                                                                        <option value="0" selected>Tidak Aktif</option>
                                                                        <option value="1">Aktif</option>
                                                                    <?php else : ?>
                                                                        <option value="0">Tidak Aktif</option>
                                                                        <option value="1" selected>Aktif</option>
                                                                    <?php endif ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Upload Foto <code>*</code> </label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="foto_u" class="custom-file-input" id="exampleInputFile">
                                                                            <label class="custom-file-label" for="exampleInputFile"><?= $ubah_users['foto_u'] ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <div class="text-center text-bold">
                                                                    <h4> Buat Akun </h4>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Username </label>
                                                                    <input type="text" name="username_u" class="form-control" placeholder="Username" required="true" value="<?= $ubah_users['username_u'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label"> Password <code>*</code> </label>
                                                                    <input type="password" name="password_u" class="form-control" placeholder="Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="tambah">Ubah</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach ?>
                                <!-- /.container-fluid -->

                                <!--------------------- END MODAL UBAH USERS ------------------->


                                <!----------------------------- MODALS DETAIL USERS ------------------------>
                                <?php foreach ($tampil_users as $detail_users) : ?>
                                    <div class="modal fade" id="detail-users<?= $detail_users['id_users'] ?>">
                                        <div class="modal-dialog" role="document">
                                            <input type="hidden" name="id_users" value="<?= $detail_users['id_users'] ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Users</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- Profile Image -->
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-body box-profile">
                                                                    <div class="text-center">
                                                                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/public/berkas/users/<?= $detail_users['foto_u']; ?>" alt="User profile picture">
                                                                    </div>
                                                                    <h3 class="profile-username text-center"><?= $detail_users['nama_u'] ?></h3>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->

                                                            <!-- About Me Box -->
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title text-bold">Informasi</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <strong><i class="fas fa-address-card mr-1"></i> Nama </strong>
                                                                            <p class="text-muted"><?= $detail_users['nama_u'] ?></p>

                                                                            <strong><i class="fas fa-calendar-week mr-1"></i> Username</strong>
                                                                            <p class="text-muted"><?= $detail_users['username_u'] ?></p>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <strong><i class="fa fa-phone-square mr-1"></i> No Handphone</strong>
                                                                            <p class="text-muted"><?= $detail_users['no_hp_u'] ?></p>
                                                                            <strong><i class="fa fa-envelope mr-1"></i> Email </strong>
                                                                            <p class="text-muted"><?= $detail_users['email_u'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach ?>
                                <!-- /.container-fluid -->



                                <?php foreach ($tampil_users as $detail_users) : ?>
                                    <div class="modal fade" id="modal-detail<?= $detail_users['id_users'] ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Dosen</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- Profile Image -->
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-body box-profile">
                                                                    <div class="text-center">
                                                                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/public/berkas/users/<?= $detail_users['foto_u']; ?>" alt="User profile picture">
                                                                    </div>
                                                                    <h3 class="profile-username text-center"><?= $detail_users['nama_u'] ?></h3>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->

                                                            <!-- About Me Box -->
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title text-bold">Informasi</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <strong><i class="fas fa-calendar-week mr-1"></i> NIP / NIK</strong>
                                                                            <p class="text-muted"></p>

                                                                            <strong><i class="fas fa-address-card mr-1"></i> NIDN </strong>
                                                                            <p class="text-muted"></p>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <strong><i class="fa fa-phone-square mr-1"></i> No Handphone</strong>
                                                                            <p class="text-muted"><?= $detail_users['no_hp_u'] ?></p>
                                                                            <strong><i class="fa fa-envelope mr-1"></i> Email </strong>
                                                                            <p class="text-muted"><?= $detail_users['email_u'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <strong> Jurusan </strong>
                                                                        <p class="text-muted"></p>
                                                                        <strong> Program Studi </strong>
                                                                        <p class="text-muted"></p>
                                                                        <strong> Jenjang Pendidikan </strong>
                                                                        <p class="text-muted"></p>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach ?>
                                <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- /.content-wrapper -->

<script src="<?php echo base_url(); ?>/public/AdminLTE/dist/js/jquery.min.js"></script>