<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h2 class="float-left">CCTV</h2>
					<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#filter-cctv">
						<i class="fa fa-search"> Filter </i>
					</button>
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
							<h5 class="float-left"><b>Tampil CCTV</b></h5>
							<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah-cctv">
								<i class="fa fa-plus"> Tambah </i>
							</button>
							<form class="float-right" method="post" action="<?= base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Cctv/cetak_laporan_cctv_pdf" enctype="multipart/form-data">
								<input type="hidden" name="id_kecamatan" value="<?= $simpan_filter['id_kecamatan'] ?>">
								<input type="hidden" name="id_kelurahan" value="<?= $simpan_filter['id_kelurahan'] ?>">
								<button type="submit" class="btn btn-danger" formtarget="_blank">
									<i class="fa fa-file-pdf"> PDF </i>
								</button>
							</form>
							<form class="float-right" method="post" action="<?= base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Cctv/cetak_laporan_cctv_excel" enctype="multipart/form-data">
								<input type="hidden" name="id_kecamatan" value="<?= $simpan_filter['id_kecamatan'] ?>">
								<input type="hidden" name="id_kelurahan" value="<?= $simpan_filter['id_kelurahan'] ?>">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-file-excel"> EXCEL </i>
								</button>
							</form>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<?= session()->get('pesan') ?>
							<table id="example1" class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Nama CCTV</th>
										<th>Kecamatan</th>
										<th>Kelurahan</th>
										<th>Alamat</th>
										<th>Latitude</th>
										<th>Longitude</th>
										<th>CCTV</th>
										<th>Deskripsi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($data_cctv as $cctv) : ?>
										<?php $kec_low = strtolower($cctv['nama_kecamatan']); ?>
										<?php $kel_low = strtolower($cctv['nama_kelurahan']); ?>
										<tr>
											<td class="py-0 align-middle" align="center"><?php echo $i++ ?></td>
											<td class="py-0 align-middle"><?= $cctv['nama_cctv'] ?></td>
											<td class="py-0 align-middle"><?= ucfirst($kec_low) ?></td>
											<td class="py-0 align-middle"><?= ucfirst($kel_low) ?></td>
											<td class="py-0 align-middle"><?= $cctv['alamat_cctv'] ?></td>
											<td class="py-0 align-middle"><?= $cctv['latitude'] ?></td>
											<td class="py-0 align-middle"><?= $cctv['longitude'] ?></td>
											<td class="text-center py-0 align-middle">
												<!-- <iframe src="<?php $cctv['url_cctv'] ?>" width="auto" height="200" style="border:0px; overflow:hidden;"> -->
												<!-- </iframe> -->
												<embed src="<?= $cctv['url_cctv'] ?>" height="160" width="auto"></embed>
												<!-- <video controls height="200px"> -->
												<!-- <source src="https://www.youtube.com/embed/wdbF3WjnDbI" type="video/mp4"> -->
												<!-- <source src="https://ecommerce-babel.site/public/berkas/uploads/video-toko/Facebook_3.mp4" type="video/mp4"> -->
												<!-- </video> -->
											</td>
											<td class="py-0 align-middle"><?= $cctv['deskripsi_cctv'] ?></td>
											<td class="text-center py-0 align-middle">
												<div class="btn-group btn-group-sm">
													<a href="<?= base_url(); ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Cctv/ubah_cctv/<?= $cctv['id_cctv']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
													<a href="" class="btn btn-rounded btn-danger" data-toggle="modal" title="Hapus" data-target="#modal-hapus-cctv<?= $cctv['id_cctv'] ?>"><i class="fas fa-trash"></i></a>
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


		<div class="modal fade" id="tambah-cctv">
			<div class="modal-dialog modal-lg" role="document">
				<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Cctv/simpan_cctv" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Lokasi CCTV</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"> Nama CCTV <code>*</code> </label>
										<input type="text" name="nama_cctv" class="form-control" placeholder="Nama CCTV" value="<?= old('nama_cctv') ?>" required>
									</div>
									<div class="form-group">
										<div id="map" style="height: 300px;">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" value="" name="lat" id="lat" value="<?= old('lat') ?>" placeholder="Latitude" required readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" value="" name="long" id="long" value="<?= old('long') ?>" placeholder="Longitude" required readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md 6">
											<div class="form-group">
												<label class="control-label"> Kecamatan <code>*</code> </label>
												<select name="id_kecamatan" id="kecamatan" class="form-control" data-width="100%" required>
													<option value="">Pilih Kecamatan</option>
													<?php foreach ($data_kecamatan as $kecamatan) : ?>
														<option value="<?= $kecamatan['id_kecamatan'] ?>"><?= ucwords($kecamatan['nama_kecamatan']) ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="col-md 6">
											<div class="form-group">
												<label class="control-label"> Kelurahan <code>*</code> </label>
												<select name="id_kelurahan" id="kelurahan" class="form-control" data-width="100%" required>
													<option value=""></option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label"> URL CCTV <code>*</code> </label>
										<textarea class="form-control" rows="2" name="url_cctv" placeholder="Masukan URL CCTV" required><?= old('url_cctv') ?></textarea>
									</div>
									<div class="form-group">
										<label class="control-label"> Alamat <code>*</code> </label>
										<textarea class="form-control" rows="2" name="alamat_cctv" placeholder="Masukan Alamat" required><?= old('alamat_cctv') ?></textarea>
									</div>
									<div class="form-group">
										<label class="control-label"> Deskripsi </label>
										<textarea class="form-control" rows="2" name="deskripsi_cctv" placeholder="Masukan Deskripsi"><?= old('deskripsi_cctv') ?></textarea>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label"> Upload Frame <code>*</code> </label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" name="frame_cctv" class="custom-file-input" id="exampleInputFile" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
														<label class="custom-file-label" for="exampleInputFile">Pilih File Disini</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<img id="blah" alt="your image" class="profile-user-img img-fluid img-lg img-square" />
										</div>
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

		<!-------------------------------------- MODAL HAPUS DATA LEVEL ---------------------------------------->

		<?php foreach ($data_cctv as $hapus_cctv) : ?>
			<div class="modal fade myModal" id="modal-hapus-cctv<?= $hapus_cctv['id_cctv'] ?>">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Cctv/hapus_cctv/<?= $hapus_cctv['id_cctv'] ?>" enctype="multipart/form-data">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Peringatan</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Apakah anda yakin akan menghapus data CCTV <?= $hapus_cctv['nama_cctv'] ?> ?
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

		<!-------------------------------------- MODAL END HAPUS DATA LEVEL ---------------------------------------->

		<div class="modal fade" id="filter-cctv">
			<div class="modal-dialog" role="document">
				<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Cctv/tampil_cctv" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Filter CCTV</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"> Kecamatan <code>*</code> </label>
										<select name="id_kecamatan" id="kecamatan2" class="form-control" data-width="100%">
											<option value="">Pilih Kecamatan</option>
											<?php foreach ($data_kecamatan as $kecamatan) : ?>
												<option value="<?= $kecamatan['id_kecamatan'] ?>"><?= ucwords($kecamatan['nama_kecamatan']) ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"> Kelurahan <code>*</code> </label>
										<select name="id_kelurahan" id="kelurahan2" class="form-control" data-width="100%">
											<option value=""></option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="tambah">FILTER</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</form>
			</div>
			<!-- /.modal-dialog -->
		</div>

	</section>
	<!-- /.content -->

	<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
		<i class="fas fa-chevron-up"></i>
	</a>
</div>
<!-- /.content-wrapper -->

<!-- PETA -->

<script>
	var myIcon = L.icon({
		iconUrl: "<?php echo base_url() ?>/public/berkas/uploads/logo/pin-marker.gif",
		iconSize: [30, 70], // size of the icon
		shadowSize: [50, 64],
		iconAnchor: [22, 94],
		shadowAnchor: [4, 62],
		popupAnchor: [-3, -76]
	});

	var curLocation = [0, 0];
	if (curLocation[0] == 0 && curLocation[1] == 0) {
		curLocation = [-2.13145, 106.1108053];
	}

	var map = L.map('map', {
		fullscreenControl: {
			pseudoFullscreen: false
		}
	}).setView([-2.13145, 106.1108053], 13);

	//=============== MENGAMBIL KOORDINAT ===============
	map.attributionControl.setPrefix(false);

	var marker = new L.marker(curLocation, {
		icon: myIcon,
		draggable: 'true'
	});

	marker.on('dragend', function(event) {
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			draggable: 'true'
		}).bindPopup(position).update();
		$("#lat").val(position.lat);
		$("#long").val(position.lng).keyup();
	});

	map.addLayer(marker);

	//=============== END MENGAMBIL KOORDINAT ===============


	// ===================== JENIS JENIS MAP ====================

	//Map Default
	openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '<span style="color: red;">Harap menekan tombol Fullscreen pada peta</span>'
	});

	//Google Map Layer
	googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
		attribution: '<span style="color: red;">Harap menekan tombol Fullscreen pada peta</span>'
	});

	//Google Hybird
	googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
		maxZoom: 20,
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
		attribution: '<span style="color: red;">Harap menekan tombol Fullscreen pada peta</span>'
	});
	googleHybrid.addTo(map);

	//Google Satellite
	googleSat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
		attribution: '<span style="color: red;">Harap menekan tombol Fullscreen pada peta</span>'
	});

	//Google Terrain
	googleTerrain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
		maxZoom: 20,
		subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
		attribution: '<span style="color: red;">Harap menekan tombol Fullscreen pada peta</span>'
	});


	//Control Layer
	var baseLayers = {
		"Open Street Map": openStreetMap,
		"Google Satellite": googleSat,
		"Google Terrain": googleTerrain,
		"Google Hybrid": googleHybrid,
		"Google Streets": googleStreets,

	};

	var overlays = {};

	L.control.layers(baseLayers, overlays).addTo(map);

	L.control.locate().addTo(map);

	// ===================== END JENIS JENIS MAP ====================

	$('#tambah-cctv').on('shown.bs.modal', function() {
		map.invalidateSize();
	});
</script>
<!-- END PETA -->

<!-- <script src="<?php echo base_url(); ?>/public/Assets/AdminLTE/dist/js/jquery.min.js"></script> -->

<!-- LINKED 3 SELECT OPTION LOKASI -->
<script type=text/javascript>
	// when kecamatan dropdown changes
	$('#kecamatan').on('change', function() {
		var id_kecamatan = $(this).val();
		var action = 'getKelurahan';

		if (id_kecamatan) {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Cctv/actionKecamatanKelurahan",
				data: {
					id_kecamatan: id_kecamatan,
					action: action
				},
				success: function(res) {
					var data = JSON.parse(res);
					if (res) {
						$("#kelurahan").empty();
						$("#kelurahan").append('<option selected disabled>- Pilih Kelurahan-</option>');
						$.each(data, function(key, value) {
							$("#kelurahan").append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan +
								'</option>');
						});
					} else {
						$("#kelurahan").empty();
					}
				}
			});
		} else {
			$("#kelurahan").empty();
		}
	});
</script>
<!-- END 3 SELECT OPTION LOKASI -->


<!-- LINKED 3 SELECT OPTION LOKASI -->
<script type=text/javascript>
	// when kecamatan dropdown changes
	$('#kecamatan2').on('change', function() {
		var id_kecamatan = $(this).val();
		var action = 'getKelurahan';

		if (id_kecamatan) {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Cctv/actionKecamatanKelurahan",
				data: {
					id_kecamatan: id_kecamatan,
					action: action
				},
				success: function(res) {
					var data = JSON.parse(res);
					if (res) {
						$("#kelurahan2").empty();
						$("#kelurahan2").append('<option selected disabled>- Pilih Kelurahan-</option>');
						$.each(data, function(key, value) {
							$("#kelurahan2").append('<option value="' + value.id_kelurahan + '">' + value.nama_kelurahan +
								'</option>');
						});
					} else {
						$("#kelurahan2").empty();
					}
				}
			});
		} else {
			$("#kelurahan2").empty();
		}
	});
</script>
<!-- END 3 SELECT OPTION LOKASI -->