		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-12">
							<h2>Kelurahan</h2>
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
									<h5 class="float-left"><b>Tampil Kelurahan</b></h5>
									<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-kelurahan">
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
												<th>Kelurahan</th>
												<th>Kecamatan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;
											foreach ($data_kelurahan as $kelurahan) : ?>
												<tr>
													<td align="center"><?php echo $i++ ?></td>
													<td><?= $kelurahan['nama_kelurahan'] ?></td>
													<td><?= $kelurahan['nama_kecamatan'] ?></td>
													<td class="text-center py-0 align-middle">
														<div class="btn-group btn-group-sm">
															<a href="" class="btn btn-warning" data-toggle="modal" title="Ubah" data-target="#ubah-kelurahan<?= $kelurahan['id_kelurahan']; ?>"><i class="fas fa-edit"></i></a>
															<a href="" class="btn btn-rounded btn-danger" data-toggle="modal" title="Hapus" data-target="#modal-hapus-kelurahan<?= $kelurahan['id_kelurahan'] ?>"><i class="fas fa-trash"></i></a>
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

				<div class="modal fade" id="tambah-kelurahan">
					<div class="modal-dialog">
						<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Kelurahan/simpan_kelurahan">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Kelurahan</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<label class="control-label"> Kelurahan </label>
									<input type="text" name="nama_kelurahan" class="form-control" placeholder="Kelurahan">
									<label class="control-label"> Kecamatan </label>
									<select name="id_kecamatan" class="form-control select2" data-width="100%" required="">
										<option value="">Pilih Kecamatan</option>
										<?php foreach ($data_kecamatan as $kecamatan) : ?>
											<option value="<?= $kecamatan['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
										<?php endforeach ?>
									</select>
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

				<?php foreach ($data_kelurahan as $ubah_kelurahan) : ?>
					<div class="modal fade" id="ubah-kelurahan<?= $ubah_kelurahan['id_kelurahan'] ?>">
						<div class="modal-dialog modal-lg">
							<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Kelurahan/update_kelurahan" enctype="multipart/form-data">
								<input type="hidden" name="id_kelurahan" value="<?= $ubah_kelurahan['id_kelurahan'] ?>">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Ubah Data Kelurahan</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label"> Kelurahan <code>*</code> </label>
													<input type="text" name="nama_kelurahan" class="form-control" value="<?php echo $ubah_kelurahan['nama_kelurahan'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label"> Kecamatan </label>
													<select name="id_kecamatan" class="form-control select2" data-width="100%" required="">
														<option value="<?php echo $ubah_kelurahan['nama_kecamatan'] ?>"><?php echo $ubah_kelurahan['nama_kecamatan'] ?></option>
														<?php foreach ($data_kecamatan as $kecamatan) : ?>
															<option value="<?= $kecamatan['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
														<?php endforeach ?>
													</select>
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

				<!-------------------------------------- MODAL HAPUS DATA KELURAHAN ---------------------------------------->

				<?php foreach ($data_kelurahan as $hapus_kelurahan) : ?>
					<div class="modal fade" id="modal-hapus-kelurahan<?= $hapus_kelurahan['id_kelurahan'] ?>">
						<div class="modal-dialog" role="document">
							<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/kelurahan/hapus_kelurahan/<?= $hapus_kelurahan['id_kelurahan'] ?>" enctype="multipart/form-data">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Peringatan</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Apakah anda yakin akan menghapus data kelurahan <?= $hapus_kelurahan['nama_kelurahan'] ?> ?
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