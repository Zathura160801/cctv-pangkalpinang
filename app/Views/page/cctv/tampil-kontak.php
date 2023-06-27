   <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
         <div class="container">

            <div class="d-flex justify-content-between align-items-center">
               <h2>Tentang Kami</h2>
               <ol>
                  <li>
                     <div id="clock"></div>
                  </li>
               </ol>
            </div>

         </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= About Section ======= -->
      <section id="cctv" class="about">
         <div class="container" data-aos="fade-up">

            <div class="section-header">
               <p>TENTANG <span>KAMI</span></p>
            </div>

            <div class="row gy-4">
               <div class="row gy-4 col-lg-6">
                  <img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png" class="img-fluid position-relative about-img align-items-center" style="width:auto; height: 160px;" alt="" data-aos="fade-up" data-aos-delay="300">
               </div>
               <div class="col-lg-6">
                  <div class="d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                     <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic text-justify">
                           Sistem ini dibuat oleh Dinas Komunikasi dan Informasi Kota Pangkalpinang dan merupakan sistem yang diperuntukkan untuk memantau / memonitoring dengan menggunakan CCTV yang berada di pemerintah Kota Pangkalpinang.
                        </p>
                        <p class="text-justify">
                           Diharapkan dengan adanya sistem ini, masyarakat dapat lebih mengenal area-area yang terpantau oleh CCTV di Kota Pangkalpinang.
                        </p>
                     </div>
                  </div>
                  <section id="contact" class="contact ps-0 ps-lg-5 pt-2">
                     <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                           <strong class="text-center">E-mail : <?= get_first_row('konfigurasi')['email']; ?></strong>
                        </div>
                     </div>
                     <br>
                     <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                           <strong class="text-center">Phone / Fax : <?= get_first_row('konfigurasi')['telepon']; ?></strong>
                        </div>
                     </div>
                     <br>
                     <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-laptop flex-shrink-0"></i>
                        <div>
                           <strong class="text-center" style="overflow-wrap: break-word;">Website : <a href="<?= get_first_row('konfigurasi')['url_website']; ?>">www.diskominfo.pangkalpinangkota.go.id</a></strong>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </section><!-- End About Section -->

   </main><!-- End #main -->