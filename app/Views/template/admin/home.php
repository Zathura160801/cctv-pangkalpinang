		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<!-- Default box -->
							<!-- <div class="card elevation-3" style="background-color: #ffc107"> -->
							<div class="card elevation-3 bg-danger">
								<div class="card-body">
									<div class="text-center text-white h4 text-bold">
										Selamat Datang <?php echo session()->get('level_users')['nama_u'] ?>
									</div>
									<div class="text-center text-white h3 	text-bold">
										CCTV PANGKALPINANG
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="float-left"><b>
											FILTER GRAFIK
											<?php if ($target != "") : ?>
												BERDASARKAN <?= strtoupper($target) ?>
											<?php endif ?>
										</b></h5>
									<a href="" class="btn btn-rounded btn-primary float-right" data-toggle="modal" title="Filter" data-target="#filter-grafik"><i class="fa fa-search"></i> FILTER </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="content">
				<div class="container-fluid">
					<!-- solid sales graph -->
					<div class="card bg-gradient-danger">
						<div class="card-header border-0">
							<h3 class="card-title">
								<i class="fas fa-th mr-1"></i>
								Grafik CCTV
							</h3>

							<div class="card-tools">
								<button type="button" class="btn bg-danger btn-sm" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
						</div>

						<?php $total = 0;
						foreach ($data_cctv as $cctv) {
							$total += 1;
						} ?>

						<?php $total_kecamatan = 0;
						$total_kelurahan = 0;
						foreach ($data_kecamatan as $kecamatan) {
							$total_kecamatan += 1;
							foreach ($data_kelurahan as $kelurahan) {
								if ($kecamatan['id_kecamatan'] == $kelurahan['id_kecamatan']) {
									$total_kelurahan += 1;
								}
							}
						} ?>

						<!-- /.card-body -->
						<div class="card-footer bg-transparent">
							<div class="row">
								<div class="col-4 text-center">
									<input type="text" class="knob" data-readonly="true" value="<?= $total ?>" data-width="60" data-height="60" data-fgColor="#000000">

									<div class="text-white">Total CCTV</div>
								</div>
								<!-- ./col -->
								<div class="col-4 text-center">
									<input type="text" class="knob" data-readonly="true" value="<?= $total_kecamatan ?>" data-width="60" data-height="60" data-fgColor="#000000">

									<div class="text-white">Kecamatan</div>
								</div>
								<!-- ./col -->
								<div class="col-4 text-center">
									<input type="text" class="knob" data-readonly="true" value="<?= $total_kelurahan ?>" data-width="60" data-height="60" data-fgColor="#000000">

									<div class="text-white">Kelurahan</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
			</section>

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="float-left"><b>PETA CCTV</b></h5>
									<a href="" class="btn btn-rounded btn-primary float-right" data-toggle="modal" title="Filter" data-target="#filter-cctv"><i class="fa fa-search"></i> FILTER </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div id="map" style="height: 500px;"></div>
				</div>
			</section>
			<!-- /.content-wrapper -->


			<div class="modal fade" id="filter-cctv">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Home/filter_cctv" enctype="multipart/form-data">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Filter CCTV</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md 6">
										<div class="form-group">
											<label class="control-label"> Kecamatan <code>*</code> </label>
											<select name="id_kecamatan" id="kecamatan" class="form-control" data-width="100%">
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
											<select name="id_kelurahan" id="kelurahan" class="form-control" data-width="100%">
												<option value=""></option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="tambah">Filter</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</form>
				</div>
				<!-- /.modal-dialog -->
			</div>

			<div class="modal fade" id="filter-grafik">
				<div class="modal-dialog" role="document">
					<form method="post" action="<?php echo base_url() ?>/<?= session()->get('level_users')['nama_lev'] ?>/Home" enctype="multipart/form-data">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Filter GRAFIK</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label"> Select Filter <code>*</code> </label>
									<select name="filter_grafik" id="filter_grafik" class="form-control select2" data-width="100%" required="">
										<option value="">Pilih Opsi</option>
										<option value="Kecamatan">Kecamatan</option>
										<option value="Kelurahan">Kelurahan</option>
									</select>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="tambah">Filter</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</form>
				</div>
				<!-- /.modal-dialog -->
			</div>


		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/plugins/jquery/jquery.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/dist/js/adminlte.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- FLOT CHARTS -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/plugins/flot/jquery.flot.js"></script>
		<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/plugins/flot/plugins/jquery.flot.resize.js"></script>
		<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
		<script src="<?php echo base_url(); ?>/public/AdminLTE/plugins/flot/plugins/jquery.flot.pie.js"></script>

		<script>
			var map = L.map('map', {
				fullscreenControl: {
					pseudoFullscreen: false
				}
			}).setView([-2.13145, 106.1108053], 12);

			//=============== END MENGAMBIL KOORDINAT ===============

			var myIcon = L.icon({
				iconUrl: "<?php echo base_url() ?>/public/berkas/uploads/logo/pin-marker.gif",
				iconSize: [30, 70], // size of the icon
				shadowSize: [50, 64],
				iconAnchor: [22, 94],
				shadowAnchor: [4, 62],
				popupAnchor: [-3, -76]
			});

			<?php foreach ($data_cctv as $cctv) : ?>
				L.marker([<?= $cctv['latitude'] ?>, <?= $cctv['longitude'] ?>], {
						icon: myIcon
					}).addTo(map)
					.bindPopup(
						`
					<div class="text-center">
						<b><?= $cctv['nama_cctv'] ?></b><br>
						<embed src="<?= $cctv['url_cctv'] ?>" height="160" width="auto"></embed>
					</div>
					`
					);
				// .openPopup();
			<?php endforeach ?>


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

		<script>
			$(function() {
				'use strict'

				/* jQueryKnob */
				$('.knob').knob()

				// Sales graph chart
				var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
				// $('#revenue-chart').get(0).getContext('2d');

				var salesGraphChartData = {
					labels: [
						<?php if ($target == 'Kecamatan') : ?>
							<?php foreach ($data_kecamatan as $kecamatan) : ?> '<?= $kecamatan['nama_kecamatan'] ?>', <?php endforeach ?>
						<?php elseif ($target == 'Kelurahan') : ?>
							<?php foreach ($data_kelurahan as $kelurahan) : ?> '<?= $kelurahan['nama_kelurahan'] ?>', <?php endforeach ?>
						<?php endif ?>
					],
					datasets: [{
						label: 'CCTV',
						fill: false,
						borderWidth: 2,
						lineTension: 0,
						spanGaps: true,
						borderColor: '#efefef',
						pointRadius: 3,
						pointHoverRadius: 7,
						pointColor: '#efefef',
						pointBackgroundColor: '#efefef',
						data: [
							<?php if ($target == 'Kecamatan') : ?>
								<?php foreach ($data_kecamatan as $kecamatan) : ?>
									<?php $count = 0;
									foreach ($data_cctv as $cctv) {
										if ($kecamatan['id_kecamatan'] == $cctv['id_kecamatan']) {
											$count++;
										}
									} ?>
									<?= $count ?>,
								<?php endforeach ?>
							<?php elseif ($target == 'Kelurahan') : ?>
								<?php foreach ($data_kelurahan as $kelurahan) : ?>
									<?php $count = 0;
									foreach ($data_cctv as $cctv) {
										if ($kelurahan['id_kelurahan'] == $cctv['id_kelurahan']) {
											$count++;
										}
									} ?>
									<?= $count ?>,
								<?php endforeach ?>
							<?php endif ?>
						]
					}]
				}

				var salesGraphChartOptions = {
					maintainAspectRatio: false,
					responsive: true,
					legend: {
						display: false
					},
					scales: {
						xAxes: [{
							ticks: {
								fontColor: '#efefef'
							},
							gridLines: {
								display: false,
								color: '#efefef',
								drawBorder: false
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 5000,
								fontColor: '#efefef'
							},
							gridLines: {
								display: true,
								color: '#efefef',
								drawBorder: false
							}
						}]
					}
				}

				// This will get the first returned node in the jQuery collection.
				// eslint-disable-next-line no-unused-vars
				var salesGraphChart = new Chart(salesGraphChartCanvas, {
					type: 'line',
					data: salesGraphChartData,
					options: salesGraphChartOptions
				})
			})
		</script>

		<script>
			$(document).ready(function() {
				$('#filter_grafik option[value=<?= $target ?>]').attr('selected', 'selected');
			})
		</script>