   <main id="main">

      <section id="hero" class="hero d-flex align-items-center section-bg">
         <div class="container">
            <div class="row justify-content-between gy-5">
               <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                  <h2 data-aos="fade-up">Selamat Datang di<br>CCTV Pangkalpinang</h2>
                  <p data-aos="fade-up" data-aos-delay="100">Tempat pemantauan area Pangkalpinang yang memiliki CCTV.</p>
                  <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                     <a href="<?= base_url() ?>/" class="btn-book-a-table">Home</a>
                     <a href="https://senyum.pangkalpinangkota.go.id" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-display"></i><span>Web <b style="color:red">SENYUM</b> </span></a>
                     <a class="btn-watch-video d-flex align-items-center"><i class="bi bi-clock"></i>
                        <div id="clock"></div>
                     </a>
                     </span></a>
                  </div>
               </div>
               <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                  <br><br>
                  <img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
                  <br><br><br> <br>
               </div>
            </div>
         </div>

      </section><!-- End Hero Section -->


      <!-- ======= About Section ======= -->
      <section id="about" class="about">
         <div class="container" data-aos="fade-up">

            <div class="section-header">
               <p>Tentang <span>Kami</span></p>
               CCTV PANGKALPINANG
            </div>

            <div class="row gy-4">
               <div id="map" class="col-lg-6 position-relative" data-aos="fade-up" data-aos-delay="150" style="height: 650px;"></div>
               <div class="col-lg-1"></div>
               <div class="col-lg-5">
                  <div class="row gy-4">
                     <div class="col-lg-12 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="content">
                           <p class="fst-italic">
                              Website ini memuat informasi mengenai :
                           </p>
                           <ul>
                              <li><i class="bi bi-check2-all"></i> LiveStreaming CCTV Wilayah Pangkalpinang CCTV Wilayah Pangkalpinang </li>
                              <li><i class="bi bi-check2-all"></i> Titik Lokasi Kawasan Ber-CCTV </li>
                           </ul>
                        </div>
                     </div>

                     <div class="col-lg-12 position-relative about-img" style="background-image: url(public/berkas/uploads/foto/beranda-1.jpg); border: 2px solid orange; border-radius: 25px;" data-aos="fade-up" data-aos-delay="150">
                        <div class="call-us position-absolute" style="border: 2px solid orange; border-radius: 25px;">
                           <h4>KAWASAN PANGKALPINANG</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </section><!-- End About Section -->

   </main><!-- End #main -->

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

   <!-------------- JUMLAH PENGUNJUNG --------------->
   <script>
      $(document).ready(function() {
         $.ajax({
            url: "<?php echo base_url() ?>/Beranda/hitung_pengunjung",
            dataType: "json",
            success: function(res) {
               $(".pengunjung").html(res)
            }
         })
      })
   </script>
   <!-------------- END JUMLAH PENGUNJUNG --------------->