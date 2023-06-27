<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\BaseController;

class Home extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
      $this->db = db_connect();
   }

   public function index()
   {
      $ambil = $this->request->getPost();

      if ($ambil) {
         if ($ambil['filter_grafik'] == "") {
            $data['target'] = 'Kecamatan';
         } else {
            if ($ambil) {
               $data['target'] = $ambil['filter_grafik'];
            } else {
               $data['target'] = 'Kecamatan';
            }
         }
      } else {
         $data['target'] = 'Kecamatan';
      }


      $data['data_cctv'] = $this->Data_model->tampil_kontenDsc('cctv', 'id_cctv');
      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');
      $data['data_kelurahan'] = $this->Data_model->tampil_kontenDsc('kelurahan', 'id_kelurahan');
      // $data['grafik'] = $this->Data_model->Join3TabelDsc('cctv', 'kelurahan', 'kecamatan', 'id_kelurahan', 'id_kecamatan', 'id_cctv');

      echo view('template/admin/header');
      echo view('template/admin/home', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function filter_cctv()
   {
      $ambil = $this->request->getPost();

      if (empty($ambil['id_kecamatan']) && empty($ambil['id_kabupaten'])) {
         $url = session()->get('level_users')['nama_lev'] . "/Home";
         return redirect()->to(base_url($url));
      } elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
         $data['target'] = 'Kecamatan';
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
      } elseif ($ambil['id_kecamatan'] && $ambil['id_kelurahan']) {
         $data['target'] = 'Kelurahan';
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'] . " AND id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
      }
      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');
      $data['data_kelurahan'] = $this->Data_model->tampil_kontenDsc('kelurahan', 'id_kelurahan');

      echo view('template/admin/header');
      echo view('template/admin/home', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }
}
