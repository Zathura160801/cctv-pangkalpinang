<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\Administrator;
use App\Controllers\BaseController;

class Konfigurasi extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
   }

   public function tampil_konfigurasi()
   {
      $data['data_konfigurasi'] = $this->Data_model->tampil_kontenDsc('konfigurasi', 'id_konfigurasi');

      echo view('template/admin/header');
      echo view('page/konfigurasi/tampil-konfigurasi', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function simpan_kecamatan()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'nama_kecamatan'   => $ambil['nama_kecamatan'],
      );
      $this->Data_model->simpan_konten('kecamatan', $data);

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil ditambahkan
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kecamatan/tampil_kecamatan";
      return redirect()->to(base_url($url));
   }

   public function update_kecamatan()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'nama_kecamatan' => $ambil['nama_kecamatan'],
      );
      $this->Data_model->update_konten('kecamatan', $data, $ambil['id_kecamatan'], 'id_kecamatan');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil diperbaharui
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kecamatan/tampil_kecamatan";
      return redirect()->to(base_url($url));
   }

   public function hapus_kecamatan($id)
   {
      $this->Data_model->hapus_konten('kecamatan', $id, 'id_kecamatan');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil dihapus
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Kecamatan/tampil_kecamatan";
      return redirect()->to(base_url($url));
   }
}
