<!DOCTYPE html>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>CCTV | Pangkalpinang - <?= " - " . date('Y-m-d') ?></title>
   <link rel="icon" type="image/png" href="<?php echo base_url() ?>/public/berkas/logo/BaksoPakdeTardi.png">
   <style type="text/css" media="print">
      body {
         font-size: 13px;
         size: a4;
         ;
      }

      .noborder,
      .noborder tr,
      .noborder table,
      .noborder th,
      .noborder td {
         border: none;
      }

      table,
      th,
      td {
         border-collapse: collapse;
      }

      h1 {
         text-align: center;
      }
   </style>

   <style>
      .depan {
         color: #000000;
         font-size: 25px;
         font-weight: bold;
         text-align: center;
         background-color: #ffffff;
         margin-top: 200px;
         padding-bottom: 20px;
         margin-right: 200px;
         margin-left: 200px;
         font-family: 'Times New Roman', Times, serif;
      }

      .logo {
         color: black;
         font-size: 36px;
         font-weight: bold;
         font-family: 'Times New Roman', Times, serif;
         padding-right: 10px;
         text-align: center;
      }

      .logo2 {
         color: black;
         font-size: 24px;
         font-family: 'Times New Roman', Times, serif;
         padding-right: 10px;
         text-align: center;
      }

      .logo3 {
         color: black;
         font-size: 20px;
         font-family: 'Times New Roman', Times, serif;
         padding-right: 10px;
         text-align: center;
      }

      .isi {
         color: black;
         font-size: 18px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 50px;
         padding-top: 20px;
         padding-right: 50px;

      }


      .isi2 {
         color: black;
         font-size: 21px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 30px;
         padding-right: 30px;
         text-align: center;
      }

      .isi4 {
         color: black;
         font-size: 21px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 5px;
         padding-right: 5px;
         text-align: center;
      }

      .isi3 {
         color: black;
         font-size: 18px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 500px;
         padding-top: 20px;
      }

      .dlm1 {
         color: black;
         font-size: 20px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 10px;
      }

      .dlm2 {
         color: black;
         font-size: 20px;
         font-family: 'Times New Roman', Times, serif;
         text-align: center;
      }

      .tg {
         color: black;
         font-size: 25px;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 22px;
         padding-bottom: 10px;
      }

      .jd {
         color: black;
         font-size: 25px;
         font-family: 'Times New Roman', Times, serif;
         text-align: center;
      }


      .gbr {
         width: AUTO;
         height: 210px;
         padding-left: 30px;
         padding-top: 20px;
         text-align: center;
      }

      .hr {
         border: 0;
         height: 5px;
         border-style: solid;
         border-color: #000000;
         border-width: 1px 0 0 0;
         border-radius: 20px;

      }

      .hr:before {
         display: block;
         content: "";
         height: 15px;
         margin-top: -31px;
         border-style: solid;
         border-color: #000000;
         border-width: 0 0 1px 0;
         border-radius: 20px;
      }

      .antrian {
         color: black;
         font-size: 22px;
         font-weight: bold;
         text-decoration: underline;
         font-family: Calibri;
      }

      .nomor {
         color: #006b05;
         font-size: 80px;
         font-weight: bold;
         font-family: arial black;
      }

      .border {
         border-width: 3px;
         border-style: ridge;
         border-color: black;
         margin-top: 5px;
      }

      .catatan {
         color: black;
         font-size: 15px;
         text-decoration: underline;
         font-weight: bold;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 50px;
         padding-right: 50px;
      }

      .catatan2 {
         color: black;
         font-size: 15px;
         font-weight: bold;
         font-family: 'Times New Roman', Times, serif;
         padding-left: 50px;
         padding-right: 50px;
      }

      .tanggaltes {
         text-align: center;
      }
   </style>

</head>

<body>

   <?php $level = session()->get('level_users')['nama_lev'] ?>
   <?php $request = \Config\Services::request() ?>


   <table align="center" cellspacing="0">
      <tr>
         <td>
            <table align="center" cellspacing="0" cellpadding="0">
               <tr align="center">
                  <td rowspan="7" width="100">
                     <img src="<?= base_url() ?>/public/berkas/uploads/logo/pemkot_pkp.png" class="gbr " alt="" />
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" width="1000">
                     <br><br>
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" class="logo2">
                     PEMERINTAH KOTA PANGKALPINANG
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" class="logo">
                     DINAS KOMUNIKASI DAN INFORMATIKA
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" class="logo3">
                     Jalan Terminal Girimaya, Kecamatan Girimaya, Pangkalpinang (33143)
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" class="logo3">
                     Telepon (0717) 423473, Fax (0717) 423473
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="4" class="logo3">
                     <u>Web: https://diskominfo.pangkalpinangkota.go.id</u> . e-mail: diskominfo@pangkalpinangkota.go.id
                  </td>
               </tr>
               <tr align="center">
                  <td colspan="5" class="logo3">
                     <hr class="hr" width="100%" color="black"><br>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
   <p>
   <h3 align="center">LAPORAN CCTV PANGKALPINANG</h3>
   </p>
   <br>

   <table width="100%">
      <tr>
         <td width="15%">Nama</td>
         <td> : <?= session()->get('level_users')['nama_u'] ?></td>
      </tr>
      <tr>
         <td> Tanggal Cetak </td>
         <td> : <?= DateToIndo(date('Y-m-d')) . " - " . date("H:i:s") ?></td>
      </tr>
      <tr>
         <td> Cetak </td>
         <td>
            <?php if ($simpan_filter['id_kecamatan'] == "" && $simpan_filter['id_kelurahan'] == "") : ?>
               : Seluruh Area Kota Pangkalpinang
            <?php elseif ($simpan_filter['id_kecamatan'] && $simpan_filter['id_kelurahan'] == "") : ?>
               : Kecamatan :
               <?php foreach ($data_kecamatan as $kecamatan) : ?>
                  <?php if ($simpan_filter['id_kecamatan'] == $kecamatan['id_kecamatan']) : ?>
                     <?php $kec_low = strtolower($kecamatan['nama_kecamatan']); ?>
                     <?= ucfirst($kec_low) ?>
                  <?php endif ?>
               <?php endforeach ?>
            <?php elseif ($simpan_filter['id_kecamatan'] && $simpan_filter['id_kelurahan']) : ?>
               : Kecamatan :
               <?php foreach ($data_kecamatan as $kecamatan) : ?>
                  <?php if ($simpan_filter['id_kecamatan'] == $kecamatan['id_kecamatan']) : ?>
                     <?php $kec_low = strtolower($kecamatan['nama_kecamatan']); ?>
                     <?= ucfirst($kec_low) ?>
                  <?php endif ?>
               <?php endforeach ?>
               | Kelurahan :
               <?php foreach ($data_kelurahan as $kelurahan) : ?>
                  <?php if ($simpan_filter['id_kelurahan'] == $kelurahan['id_kelurahan']) : ?>
                     <?php $kel_low = strtolower($kelurahan['nama_kelurahan']); ?>
                     <?= ucfirst($kel_low) ?>
                  <?php endif ?>
               <?php endforeach ?>
            <?php endif ?>
         </td>
      </tr>
   </table>

   <br><br>

   <table width="100%" border="1" cellpadding="8" cellspacing="0" align="center">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama CCTV</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Alamat</th>
            <th>Latitude</th>
            <th>Longitude</th>
         </tr>
      </thead>
      <tbody>
         <?php if ($data_cctv == null) : ?>
            <tr class="text-center">
               <td colspan="8" align="center">
                  Tidak Ada Data
               </td>
            </tr>
         <?php else : ?>
            <?php
            $i = 1;
            foreach ($data_cctv as $cctv) : ?>
               <?php $kec_low = strtolower($cctv['nama_kecamatan']); ?>
               <?php $kel_low = strtolower($cctv['nama_kelurahan']); ?>
               <tr>
                  <td style="width:1px;white-space:nowrap;"> <?= $i++ ?> </td>
                  <td style="width:1px;white-space:nowrap;"> <?= $cctv['nama_cctv'] ?> </td>
                  <td style="width:1px;white-space:nowrap;"> <?= ucfirst($kec_low) ?> </td>
                  <td style="width:1px;white-space:nowrap;"> <?= ucfirst($kel_low) ?> </td>
                  <td> <?= $cctv['alamat_cctv'] ?> </td>
                  <td style="width:1px;white-space:nowrap;"> <?= $cctv['latitude'] ?> </td>
                  <td style="width:1px;white-space:nowrap;"> <?= $cctv['longitude'] ?> </td>
               </tr>
            <?php endforeach ?>
         <?php endif; ?>
      </tbody>
   </table>

</body>

</html>