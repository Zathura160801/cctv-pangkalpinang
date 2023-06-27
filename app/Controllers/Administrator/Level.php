<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\Administrator;
use App\Controllers\BaseController;

class Level extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
   }

   public function tampil_level()
   {
      $data['data_level'] = $this->Data_model->tampil_kontenDsc('level', 'id_level');

      echo view('template/admin/header');
      echo view('page/level/tampil-level', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function simpan_level()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'nama_lev'   => $ambil['nama_lev'],
         'alias_lev'  => $ambil['alias_lev'],
      );
      $this->Data_model->simpan_konten('level', $data);

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil ditambahkan
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Level/tampil_level";
      return redirect()->to(base_url($url));
   }

   public function update_level()
   {
      $ambil = $this->request->getPost();

      $data = array(
         'id_level'   => $ambil['id_level'],
         'nama_lev'   => $ambil['nama_lev'],
         'alias_lev'  => $ambil['alias_lev'],
      );
      $this->Data_model->update_konten('level', $data, $ambil['id_level'], 'id_level');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil diperbaharui
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Level/tampil_level";
      return redirect()->to(base_url($url));
   }

   public function hapus_level($id)
   {
      $this->Data_model->hapus_konten('level', $id, 'id_level');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Level berhasil dihapus
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Level/tampil_level";
      return redirect()->to(base_url($url));
   }
}
