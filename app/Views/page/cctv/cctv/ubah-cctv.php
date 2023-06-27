		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-12">
							<h2>CCTV</h2>
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
									<h5 class="float-left"><b>Ubah CCTV</b></h5>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<?= session()->get('pesan') ?>
									<form method="post" action="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Cctv/update_cctv" enctype="multipart/form-data">
										<input type="hidden" class="form-control" name="id_cctv" required="" value="<?= $get_cctv['id_cctv'] ?>">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label"> Nama CCTV <code>*</code> </label>
													<input type="text" name="nama_cctv" class="form-control" value="<?= $get_cctv['nama_cctv'] ?>" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label"> Letakkan Titik Lokasi Untuk Mendapatkan Koordinat </label>
													<div id="map" style="height: 400px;">
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" value="<?= $get_cctv['latitude'] ?>" name="lat" id="lat" required readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" class="form-control" value="<?= $get_cctv['longitude'] ?>" name="long" id="long" required readonly>
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
																	<?php if ($get_cctv['id_kecamatan'] == $kecamatan['id_kecamatan']) : ?>
																		<option value="<?= $kecamatan['id_kecamatan'] ?>" selected><?= $kecamatan['nama_kecamatan'] ?></option>
																	<?php else : ?>
																		<option value="<?= $kecamatan['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
																	<?php endif ?>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="col-md 6">
														<div class="form-group">
															<label class="control-label"> Kelurahan <code>*</code> </label>
															<select name="id_kelurahan" id="kelurahan" class="form-control" data-width="100%" required>
																<option value="<?= $get_cctv['id_kelurahan'] ?>"><?= $get_cctv['nama_kelurahan'] ?></option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label"> URL CCTV <code>*</code> </label>
													<textarea class="form-control" rows="2" name="url_cctv" required><?= $get_cctv['url_cctv'] ?></textarea>
												</div>
												<div class="form-group">
													<label class="control-label"> Alamat <code>*</code> </label>
													<textarea class="form-control" rows="2" name="alamat_cctv"> <?= $get_cctv['alamat_cctv'] ?></textarea>
												</div>
												<div class="form-group">
													<label class="control-label"> Deskripsi </label>
													<textarea class="form-control" rows="2" name="deskripsi_cctv"> <?= $get_cctv['deskripsi_cctv'] ?></textarea>
												</div>
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label"> Upload Frame <code>*</code> </label>
															<div class="input-group">
																<div class="custom-file">
																	<input type="file" name="frame_cctv" class="custom-file-input" id="exampleInputFile">
																	<label class="custom-file-label" for="exampleInputFile"><?= $get_cctv['frame_cctv'] ?></label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<a href="<?= base_url() ?>/public/berkas/uploads/frame-video/<?= $get_cctv['frame_cctv']; ?>" data-toggle="lightbox" data-title="">
															<img class="profile-user-img img-fluid img-lg img-square" src="<?= base_url() ?>/public/berkas/uploads/frame-video/<?= $get_cctv['frame_cctv']; ?>" alt="User profile picture">
														</a>
													</div>
												</div>
											</div>
										</div>
										<br>
										<a href="<?= base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Cctv/tampil_cctv" class="btn btn-default bg-gradient-danger btn-sm text-bold"><i class="fa fa-chevron-circle-left"></i> Kembali </a>
										<button class="btn btn-default bg-gradient-success btn-sm text-bold btn btn-success toastrDefaultSuccess"><i class="fa fa-plus-circle"></i> Simpan </button>
									</form>
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
				curLocation = [<?= $get_cctv['latitude'] ?>, <?= $get_cctv['longitude'] ?>];
			}

			var map = L.map('map', {
				fullscreenControl: {
					pseudoFullscreen: false
				}
			}).setView([<?= $get_cctv['latitude'] ?>, <?= $get_cctv['longitude'] ?>], 13);


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
		</script>
		<!-- END PETA -->

		<script src="<?php echo base_url(); ?>/public/Assets/AdminLTE/dist/js/jquery.min.js"></script>

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