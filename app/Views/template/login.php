<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png">
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

    <!-- <link rel="stylesheet" media="screen" href="<?php echo base_url() ?>/public/Assets/Particles/demo/css/style.css"> -->

    <!-- reCAPTCHA JS-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/css">
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
    </script>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>
</head>

<body>

    <?php $request = \Config\Services::request() ?>
    <?php $validation = \Config\Services::validation(); ?>

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

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" id="logo_login" data-tilt style=" display:flex; align-items:center;">
                    <img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png" alt="IMG">
                </div>

                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        Login
                    </span>

                    <?= session()->get('pesan') ?>

                    <form method="post" action="<?php echo base_url() ?>/Login" enctype="multipart/form-data">
                        <div class="wrap-input100 validate-input" data-validate="Valid username is required">
                            <input class="input100" type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password" id="myInput" value="<?= old('password') ?>">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <span class="txt1">
                            <input type="checkbox" class="m-l-32" onclick="myFunction()"> Tampilkan Password
                        </span>

                        <!-- reCAPTCHA -->
                        <div class="m-t-15">
                            <div class="g-recaptcha" data-sitekey="<?= getenv('GOOGLE_RECAPTCHA_SITEKEY') ?>"></div>
                            <!-- Error -->
                            <?php if ($validation->getError('g-recaptcha-response')) { ?>
                                <div class='text-danger mt-2 txt1'>
                                    * <?= $validation->getError('g-recaptcha-response'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="container-login100-form-btn">
                        <a href="<?php echo base_url() ?>/" class="register100-form-btn">
                            Beranda
                        </a>
                    </div>

                    <!-- <div class="text-center p-t-12">
                        <a class="txt2" href="<?php echo base_url() ?>/LupaPassword">
                            <span class="txt1">
                                Lupa
                            </span>
                            <span class="txt2">
                                Password
                            </span>
                        </a>
                    </div> -->
                </div>
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
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <!-- scripts -->
    <script src="<?php echo base_url() ?>/public/Assets/Particles/particles.js"></script>
    <script src="<?php echo base_url() ?>/public/Assets/Particles/demo/js/app.js"></script>

    <!-- stats.js -->
    <!-- <script src="<?php echo base_url() ?>/public/Assets/Particles/demo/js/lib/stats.js"></script>
    <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script> -->

</body>

</html>