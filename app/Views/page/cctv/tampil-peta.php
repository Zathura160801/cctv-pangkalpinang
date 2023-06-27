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
               <p>PETA <span>PANGKALPINANG</span></p>
            </div>

            <form class="text-center" method="post" action="<?php echo base_url() ?>/Cctv/filter_peta" enctype="multipart/form-data">
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
               <div id="map" class="position-relative" data-aos="fade-up" data-aos-delay="150" style="height: 650px;"></div>
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