<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

   <div class="container">
      <div class="row gy-3">
         <div class="col-lg-4 col-md-6 d-flex">
            <i class="bi bi-geo-alt icon"></i>
            <div>
               <h4>Alamat</h4>
               <p>
                  <?= get_first_row('konfigurasi')['alamat'] ?>
               </p> <br>
               <h4>Sosial Media</h4>
               <div class="social-links d-flex">
                  <a href="<?= get_first_row('konfigurasi')['url_facebook'] ?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="<?= get_first_row('konfigurasi')['url_instagram'] ?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="<?= get_first_row('konfigurasi')['url_youtube'] ?>" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                  <a href="<?= get_first_row('konfigurasi')['url_website'] ?>" target="_blank" class="globe"><i class="bi bi-globe"></i></a>
               </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 footer-links d-flex">
            <i class="bi bi-telephone icon"></i>
            <div>
               <h4>Kontak</h4>
               <p>
                  <strong>Telepon/Fax:</strong> <?= get_first_row('konfigurasi')['telepon']; ?> <br>
                  <strong>Email:</strong> <?= get_first_row('konfigurasi')['email']; ?><br>
                  <strong>Website:</strong> <a href="<?= get_first_row('konfigurasi')['url_website']; ?>" style="color: white;">www.diskominfo.pangkalpinangkota.go.id</a><br>
               </p>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 footer-links">
            <h4>Ikuti Kami</h4>
            <iframe style="border:0; width: 100%; height: 200px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15052.926080660338!2d106.12099892590363!3d-2.1518266580181007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22c725684d66a9%3A0x203b85ebff1ff63e!2sDinas%20Komunikasi%20Dan%20Informatika%20Kota%20Pangkalpinang!5e0!3m2!1sid!2sid!4v1677842234937!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>

      </div>
   </div>

   <div class="container">
      <div class="copyright">
         &copy; Copyright <strong><span>E.R.A</span></strong>. All Rights Reserved 2023 | Designed by <a href="">E.R.A</a>
      </div>
   </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/aos/aos.js"></script>
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url() ?>/public/Assets/Beranda/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>/public/Assets/Beranda/js/main.js"></script>

</body>

</html>