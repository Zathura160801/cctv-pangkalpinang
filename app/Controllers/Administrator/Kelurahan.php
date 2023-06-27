<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\Administrator;
use App\Controllers\BaseController;

class Kelurahan extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
   }

   public function tampil_kelurahan()
   {
      $data['data_kelurahan'] = $this->Data_model->Join2TabelDsc('kelurahan', 'kecamatan', 'id_kecamatan', 'id_kelurahan');
      $data['data_kecamatan'] = $this->Data_model->tampil_kontenAsc('kecamatan', 'nama_kecamatan');

      echo view('template/admin/header');
      echo view('page/kelurahan/tampil-kelurahan', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function simpan_kelurahan()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'id_kecamatan' => $ambil['id_kecamatan'],
         'nama_kelurahan'   => $ambil['nama_kelurahan'],
      );
      $this->Data_model->simpan_konten('kelurahan', $data);

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Kelurahan berhasil ditambahkan
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kelurahan/tampil_kelurahan";
      return redirect()->to(base_url($url));
   }

   public function update_kelurahan()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'id_kecamatan'   => $ambil['id_kecamatan'],
         'nama_kelurahan' => $ambil['nama_kelurahan'],
      );
      $this->Data_model->update_konten('kelurahan', $data, $ambil['id_kelurahan'], 'id_kelurahan');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Kelurahan berhasil diperbaharui
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kelurahan/tampil_kelurahan";
      return redirect()->to(base_url($url));
   }

   public function hapus_kelurahan($id)
   {
      $this->Data_model->hapus_konten('kelurahan', $id, 'id_kelurahan');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil dihapus
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kelurahan/tampil_kelurahan";
      return redirect()->to(base_url($url));
   }
}
