<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/public/berkas/logo/Logo Babel.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/Assets/Login/css/main.css">
	<!--===============================================================================================-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		.preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: #5369C7;
			background: -webkit-linear-gradient(-160deg, #00A5EA, #033E51);
			background: -o-linear-gradient(-160deg, #00A5EA, #033E51);
			background: -moz-linear-gradient(-160deg, #00A5EA, #033E51);
			background: linear-gradient(-160deg, #00A5EA, #033E51);
		}

		.preloader .loading {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			font: 14px arial;
		}
	</style>
	<script>
		$(document).ready(function() {
			$(".preloader").fadeOut();
		})
	</script>
</head>

<body>

	<?php $request = \Config\Services::request() ?>

	<div class="preloader">
		<div class="loading">
			<div class="text-center" style="background: #fff; border-radius: 25px; padding: 20px;">
				<div class="container">
					<img src="<?php echo base_url() ?>/public/berkas/logo/GIF-UMKM.gif" width="80">
					<br>
					<p style="color: black">Harap Tunggu</p>
				</div>
			</div>
		</div>
	</div>

	<div class="limiter">
		<div class="container-login100">
			<!-- <div class="wrap-login200">
				<div class="container-judul">
					IMKM & UMKM Kabupaten Bangka
				</div>
				<div class="container-back100-btn">
					<button type="button" class="register100-form-btn">
						Kembali
					</button>
				</div>
			</div>
		-->
			<div class="wrap-login100">

				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url() ?>/public/Assets/Login/images/img-01.png" alt="IMG">
				</div>

				<?php if ($request->uri->getSegment(2) == "") : ?>
					<div class="login100-form validate-form">
						<span class="login100-form-title">
							Register
						</span>

						<?= session()->get('pesan') ?>

						<form method="post" action="<?php echo base_url() ?>/Register/buat_akun" enctype="multipart/form-data">
							<div class="wrap-input100 validate-input" data-validate="Masukkan nama dengan benar!">
								<input class="input100" type="text" name="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Masukan username dengan benar!">
								<input class="input100" type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-vcard" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Valid email is required, example@mail.com">
								<input class="input100" type="text" name="email" placeholder="Email" value="<?= old('email') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Valid phone number is required, 081234567890">
								<input class="input100" type="number" name="no_hp" placeholder="Nomor Telepon" value="<?= old('no_hp') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<input class="input100" type="password" name="password" placeholder="Password" id="myInput" value="<?= old('password') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Re-Password is required">
								<input class="input100" type="password" name="repassword" placeholder="Re-Password" id="myInput2" value="<?= old('repassword') ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>

							<span class="txt1">
								<input type="checkbox" class="m-l-32" onclick="myFunction()"> Show Password
							</span>

							<div class="container-login100-form-btn">
								<button type="submit" class="login100-form-btn">
									Register
								</button>
							</div>
						</form>

						<div class="container-login100-form-btn">
							<a href="<?php echo base_url() ?>/Login" class="register100-form-btn">
								Login
							</a>
						</div>

						<div class="text-center p-t-12">
							<a class="txt2" href="<?php echo base_url() ?>/LupaPassword">
								<span class="txt1">
									Lupa
								</span>
								<span class="txt2">
									Password
								</span>
							</a>
						</div>
					</div>

				<?php elseif ($request->uri->getSegment(2) == "buat_akun") : ?>
					<div class="login100-form validate-form">
						<span class="login100-form-title">
							Perhatian
						</span>

						<?= session()->get('pesan') ?>

						<p style="text-align: justify;"> <b>Selamat Datang di UMKM Bangka Belitung</b> </p><br>

						<p style="text-align: justify;"> Untuk membantu melindungi akun Anda, Anda mungkin perlu membuktikan diri Anda saat login atau mencoba melakukan tindakan sensitif sehingga harus memverifikasi diri anda. <br>
							Diharapkan anda telah mengisi data dengan benar agar kami dapat mengirimkan pesan untuk mengkonfirmasi bahwa itu adalah anda. </p><br>

						<p style="text-align: justify;"> Konfirmasikan alamat email Anda atau konfirmasikan nomor telepon anda dengan mengklik tombol di bawah ini </p>

						<div class="container-login100-form-btn">
							<a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="login100-form-btn">
								Aktivasi Email
							</a>
						</div>

						<div class="container-login100-form-btn">
							<a href="<?= $url ?>" target="_blank" class="register100-form-btn">
								Aktivasi Whatsapp
							</a>
						</div>

						<div class="container-login100-form-btn">
							<a href="<?php echo base_url() ?>/Login" class="login100-form-btn">
								Login
							</a>
						</div>
					</div>

				<?php elseif ($request->uri->getSegment(2) == "aktivasi_akun") : ?>
					<div class="login100-form validate-form">
						<span class="login100-form-title">
							Perhatian
						</span>

						<?= session()->get('pesan') ?>

						<p style="text-align: justify;"> <b>Selamat Datang di UMKM Bangka Belitung</b> </p><br>

						<p style="text-align: justify;"> Anda telah melakukan tahap verifikasi melalui Email atau Nomor Whatsapp. Apabila jika ini memang anda maka lakukan tahap selanjutnya untuk mengaktifkan akun UMKM Bangka Belitung </p><br>

						<p style="text-align: justify;"> Silahkan untuk menekan tombol LOGIN untuk mengaktifkan akun anda dan anda dapat login menggunakan akun ini </p>

						<div class="container-login100-form-btn">
							<a href="<?php echo base_url() ?>/Login" class="login100-form-btn">
								Login
							</a>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/public/Assets/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/public/Assets/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>/public/Assets/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/public/Assets/Login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/public/Assets/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/public/Assets/Login/js/main.js"></script>

	<script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("myInput");
			var y = document.getElementById("myInput2");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}

			if (y.type === "password") {
				y.type = "text";
			} else {
				y.type = "password";
			}
		}
	</script>

</body>

</html>