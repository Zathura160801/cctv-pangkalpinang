   <style>
      .zoom {
         transition: transform .2s;
         /* Animation */
         margin: 0 auto;
      }

      .zoom:hover {
         transform: scale(1.10);
         /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }
   </style>

   <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
         <div class="container">

            <div class="d-flex justify-content-between align-items-center">
               <h2>Kawasan Kota Pangkalpinang</h2>
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
               <p>CCTV <span>PANGKALPINANG</span></p>
            </div>

            <form class="text-center" method="post" action="<?php echo base_url() ?>/Cctv/filter_cctv" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="id_kecamatan" id="kecamatan" class="form-select form-select mb-3" aria-label=".form-select-lg example" data-width="100%" required>
                           <option value="">Pilih Kecamatan</option>
                           <?php foreach ($data_kecamatan as $kecamatan) : ?>
                              <option value="<?= $kecamatan['id_kecamatan'] ?>"><?= ucwords($kecamatan['nama_kecamatan']) ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="id_kelurahan" id="kelurahan" class="form-select form-select mb-3" aria-label=".form-select-lg example" data-width="100%" required>
                           <option value=""></option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <button type="submit" class="btn btn-block btn-danger"><i class="bi bi-search"></i> <b> Filter </b></button>
                  </div>
               </div>
            </form>

            <div class="row gy-4">
               <div class="col-lg-12 col d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                  <div class="content ps-0 ps-lg-12"></div>
               </div>
               <div class="row">
                  <?php if ($data_cctv) : ?>
                     <?php foreach ($data_cctv as $cctv) : ?>
                        <div class="col-lg-4 col-md-6 d-flex zoom">
                           <div class="position-relative mt-4">
                              <?php if (empty($cctv['frame_cctv'])) : ?>
                                 <img src="<?php echo base_url() ?>/public/berkas/uploads/frame-video/frame-1.jpeg" class="img-fluid" alt="">
                              <?php else : ?>
                                 <img src="<?php echo base_url() ?>/public/berkas/uploads/frame-video/<?= $cctv['frame_cctv'] ?>" class="img-fluid" alt="">
                              <?php endif ?>
                              <a href="<?= $cctv['url_cctv'] ?>" class="glightbox play-btn"></a>
                           </div>
                        </div>
                     <?php endforeach ?>
                  <?php else : ?>
                     <section id="contact" class="contact">
                        <div class="col-lg-12">
                           <div class="info-item d-flex align-items-center">
                              <i class="icon bi bi-camera-video-off flex-shrink-0"></i>
                              <div>
                                 <strong class="text-center">Tidak ada CCTV yang Ditemukan</strong>
                              </div>
                           </div>
                        </div>
                     </section>
                  <?php endif ?>
               </div>
            </div>
         </div>
      </section><!-- End About Section -->

   </main><!-- End #main -->


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
               url: "<?php echo base_url() ?>/Cctv/actionKecamatanKelurahan",
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