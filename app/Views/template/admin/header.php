<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CCTV | Pangkalpinang</title>

	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/dist/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" src="<?php echo base_url(); ?>/public/Assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/toastr/toastr.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Ekko Lightbox -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/ekko-lightbox.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
	<!-- BS Stepper -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
	<!-- dropzonejs -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/dropzone/min/dropzone.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/dist/css/adminlte.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">
	<!-- CodeMirror -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/codemirror/codemirror.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/codemirror/theme/monokai.css">
	<!-- dropzonejs -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/dropzone/min/dropzone.min.css">
	<!-- SimpleMDE -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/simplemde/simplemde.min.css">
	<!-- BS Stepper -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/public/Assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">

	<!---------------------------- LEAFLET -------------------------------->
	<link href="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.fullscreen.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.js"></script>
	<script src="<?php echo base_url() ?>/public/Assets/Leaflet/leaflet.fullscreen.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		.preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: #ffffff;
			background: -webkit-linear-gradient(-160deg, #ffffff, #969696);
			background: -o-linear-gradient(-160deg, #ffffff, #969696);
			background: -moz-linear-gradient(-160deg, #ffffff, #969696);
			background: linear-gradient(-160deg, #ffffff, #969696);
		}

		.preloader .loading {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			font: 14px arial;
		}

		.shake {
			animation: shake 0.5s;
			animation-iteration-count: infinite;
		}

		@keyframes shake {
			0% {
				transform: translate(1px, 1px) rotate(0deg);
			}

			10% {
				transform: translate(-1px, -2px) rotate(-1deg);
			}

			20% {
				transform: translate(-3px, 0px) rotate(1deg);
			}

			30% {
				transform: translate(3px, 2px) rotate(0deg);
			}

			40% {
				transform: translate(1px, -1px) rotate(1deg);
			}

			50% {
				transform: translate(-1px, 2px) rotate(-1deg);
			}

			60% {
				transform: translate(-3px, 1px) rotate(0deg);
			}

			70% {
				transform: translate(3px, 1px) rotate(-1deg);
			}

			80% {
				transform: translate(-1px, -1px) rotate(1deg);
			}

			90% {
				transform: translate(1px, 2px) rotate(0deg);
			}

			100% {
				transform: translate(1px, -2px) rotate(-1deg);
			}
		}
	</style>
	<script>
		$(document).ready(function() {
			$(".preloader").fadeOut();
		})
	</script>

</head>

<body id="change-color" class="hold-transition sidebar-mini layout-fixed accent-danger">

	<!-- Site wrapper -->
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader">
			<div class="loading">
				<div class="text-center shake" style="background: #fff; border-radius: 25px; padding: 20px;">
					<div class="container">
						<img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK-min.png" width="80">
						<br>
						<p style="color: black">Harap Tunggu</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url(); ?>/Beranda" class="nav-link btn btn-outline-warning"><i class="fa fa-eye"></i> Lihat Website</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url() ?>/public/berkas/users/<?php echo session()->get('level_users')['foto_u'] ?>" class="user-image img-circle elevation-2" alt="<?php echo session()->get('level_users')['nama_u'] ?>">
						<span><?php echo session()->get('level_users')['nama_u'] ?></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<!-- User image -->
						<li class="user-header bg-danger">
							<img src="<?php echo base_url() ?>/public/berkas/users/<?php echo session()->get('level_users')['foto_u'] ?>" class="img-circle elevation-2" alt="<?php echo session()->get('level_users')['nama_u'] ?>">

							<p>
								<?php echo session()->get('level_users')['nama_u'] ?>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<a href="<?php echo base_url() ?>/<?php echo session()->get('level_users')['nama_lev'] ?>/Datadosen/detail_identitas_dosen/<?php echo session()->get('level_users')['id_users'] ?>" class="btn btn-default btn-flat">Profile</a>
							<a href="<?php echo base_url() ?>/Logout" class="btn btn-default btn-flat float-right">Logout</a>
						</li>
					</ul>
				</li>
				<!-- Notifications Dropdown Menu -->

				<li class="nav-item mt-1">
					<label class="icon" onclick="darkMode()" id="darkSwitch" style="color: white;">🌑</label>
					<label for="darkSwitch" id="lblDark" style="color: white;"></label>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->