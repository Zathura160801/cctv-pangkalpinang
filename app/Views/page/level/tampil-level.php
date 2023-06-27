		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-12">
							<h2>Level</h2>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="float-left"><b>Tampil Level</b></h5>
									<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-level">
										<i class="fa fa-plus"> Tambah </i>
									</button>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<?= session()->get('pesan') ?>
									<table id="example1" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Level</th>
												<th>Alias Level</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;
											foreach ($data_level as $baris) : ?>
												<tr>
													<td align="center"><?php echo $i++ ?></td>
													<td><?= $baris['nama_lev'] ?></td>
													<td><?= $baris['alias_lev'] ?></td>
													<td class="text-center py-0 align-middle">
														<div class="btn-group btn-group-sm">
															<a href="" class="btn btn-warning" data-toggle="modal" title="Ubah" data-target="#ubah-level<?= $baris['id_level']; ?>"><i class="fas fa-edit"></i></a>
															<a href="" class="btn btn-rounded btn-danger" data-toggle="modal" title="Hapus" data-target="#modal-hapus-level<?= $baris['id_level'] ?>"><i class="fas fa-trash"></i></a>
														</div>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->

				<div class="modal fade" id="tambah-level">
					<div class="modal-dialog">
						<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Level/simpan_level">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Level</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<label class="control-label"> Nama Level </label>
									<input type="text" name="nama_lev" class="form-control" placeholder="Nama Level">
									<label class="control-label"> Alias Level </label>
									<input type="text" name="alias_lev" class="form-control" placeholder="Alias Level">
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

				<?php foreach ($data_level as $ubah_level) : ?>
					<div class="modal fade" id="ubah-level<?= $ubah_level['id_level'] ?>">
						<div class="modal-dialog modal-lg">
							<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Level/update_level" enctype="multipart/form-data">
								<input type="hidden" name="id_level" value="<?= $ubah_level['id_level'] ?>">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Ubah Data Level</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label"> Nama Level <code>*</code> </label>
													<input type="text" name="nama_lev" class="form-control" value="<?php echo $ubah_level['nama_lev'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label"> Alias Level </label>
													<input type="text" name="alias_lev" class="form-control" value="<?php echo $ubah_level['alias_lev'] ?>">
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

				<!-------------------------------------- MODAL HAPUS DATA LEVEL ---------------------------------------->

				<?php foreach ($data_level as $hapus_level) : ?>
					<div class="modal fade" id="modal-hapus-level<?= $hapus_level['id_level'] ?>">
						<div class="modal-dialog" role="document">
							<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Level/hapus_level/<?= $hapus_level['id_level'] ?>" enctype="multipart/form-data">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Peringatan</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Apakah anda yakin akan menghapus data level <?= $hapus_level['alias_lev'] ?> ?
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

			</section>
			<!-- /.content -->

			<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
				<i class="fas fa-chevron-up"></i>
			</a>
		</div>
		<!-- /.content-wrapper -->