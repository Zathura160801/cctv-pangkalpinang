<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\Administrator;
use App\Controllers\BaseController;

class Users extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
   }

   public function tampil_users()
   {
      $data['tampil_users'] = $this->Data_model->Join2TabelDsc('users', 'level', 'id_level', 'id_users');
      $data['data_level'] = $this->Data_model->tampil_kontenAsc('level', 'alias_lev');

      echo view('template/admin/header');
      echo view('page/users/tampil-users', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function simpan_users()
   {
      $ambil = $this->request->getPost();
      $file = $this->request->getFile('foto_u');
      $tanggal_now = date('Y-m-d');

      $get_email = $this->Data_model->getKontenStr('users', 'email_u', $ambil['email_u']);
      $get_user = $this->Data_model->getKontenStr('users', 'username_u', $ambil['username_u']);

      if ($get_user == TRUE) {
         session()->setFlashdata(
            'pesan',
            '<div class="alert alert-danger">
               <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
               <strong>Mohon Maaf</strong>, username tersebut telah terdaftar
               </div>'
         );
         $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
         return redirect()->to(base_url($url))->withInput();
      }
      if ($get_email == TRUE) {
         session()->setFlashdata(
            'pesan',
            '<div class="alert alert-danger">
               <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
               <strong>Mohon Maaf</strong>, email tersebut telah terdaftar
               </div>'
         );
         $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
         return redirect()->to(base_url($url))->withInput();
      }

      $password_asli = $ambil['password_u'];
      $ambil['password_u'] = sha1($ambil['password_u']);

      if ($file->getError() == 4) {
         $file = "users.png";
      } else {
         if (!$this->validate([
            'foto_u' => [
               'uploaded[foto_u]',
               'mime_in[foto_u,image/jpg,image/jpeg,image/png]',
               'max_size[foto_u,2048]',
            ]
         ])) {
            session()->setFlashdata(
               'pesan',
               '<div class="alert alert-danger">
                  <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                  <strong>Mohon Maaf</strong>, foto yang anda upload tidak memenuhi syarat
                  </div>'
            );
            $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
            return redirect()->to(base_url($url))->withInput();
         }

         $file = $this->request->getFile('foto_u');
         $file->move(ROOTPATH . 'public/berkas/users');
         $file = $file->getName();
      }

      $data = array(
         'id_level'          => $ambil['id_level'],
         'nama_u'            => $ambil['nama_u'],
         'username_u'        => $ambil['username_u'],
         'password_u'        => $ambil['password_u'],
         'no_hp_u'           => $ambil['no_hp_u'],
         'email_u'           => $ambil['email_u'],
         'foto_u'            => $file,
         'tgl_buat_u'        => $tanggal_now,
         'status_u'          => "1",
      );
      $this->Data_model->simpan_konten('users', $data);

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Users berhasil ditambahkan
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
      return redirect()->to(base_url($url));
   }

   public function hapus_users($id)
   {
      $cek_data = $this->Data_model->getKontenRow('users', $id, 'id_users');

      if ($cek_data['foto_u'] != "users.png") {
         $data_kon = $this->Data_model->getKonten('users', $id, 'id_users');
         $delete_file = $data_kon[0]['foto_u'];
         if (!empty($delete_file)) {
            if (file_exists("public/berkas/users/$delete_file")) {
               unlink("public/berkas/users/$delete_file");
            }
         }
      }

      $this->Data_model->hapus_konten('users', $id, 'id_users');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Users berhasil dihapus
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
      return redirect()->to(base_url($url));
   }

   public function update_users()
   {
      $ambil = $this->request->getPost();
      $file = $this->request->getFile('foto_u');

      $get_user = $this->Data_model->getKontenStr('users', 'username_u', $ambil['username_u']);
      $cek_data = $this->Data_model->getKontenRow('users', $ambil['id_users'], 'id_users');

      if ($cek_data['username_u'] == $ambil['username_u']) {
         $ambil['username_u'] == $ambil['username_u'];
      } else {
         if ($get_user == TRUE) {
            session()->setFlashdata(
               'pesan',
               '<div class="alert alert-danger">
                  <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                  <strong>Mohon Maaf</strong>, username anda telah digunakan
                  </div>'
            );
            $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users/" . $ambil['id_users'];
            return redirect()->to(base_url($url))->withInput();
         }
      }

      if ($file->getError() == 4) {
         if ($cek_data['foto_u'] == "users.png") {
            $file = "users.png";
         } else {
            $file = $cek_data['foto_u'];
         }
      } else {
         if (!$this->validate([
            'foto_d_d' => [
               'uploaded[foto_u]',
               'mime_in[foto_u,image/jpg,image/jpeg,image/png]',
               'max_size[foto_u,2048]',
            ]
         ])) {
            session()->setFlashdata(
               'pesan',
               '<div class="alert alert-danger">
                  <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                  <strong>Mohon Maaf</strong>, foto yang anda upload tidak memenuhi syarat
                  </div>'
            );
            $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users/" . $ambil['id_users'];
            return redirect()->to(base_url($url))->withInput();
         }

         if ($cek_data['foto_u'] != "users.png") {
            $data_kon = $this->Data_model->getKonten('users', $ambil['id_users'], 'id_users');
            $delete_file = $data_kon[0]['foto_u'];
            if (!empty($delete_file)) {
               if (file_exists("public/berkas/users/$delete_file")) {
                  unlink("public/berkas/users/$delete_file");
               }
            }
         }

         $file = $this->request->getFile('foto_u');
         $file->move(ROOTPATH . 'public/berkas/users');
         $file = $file->getName();
      }

      $data = array(
         'id_level'          => $ambil['id_level'],
         'nama_u'            => $ambil['nama_u'],
         'username_u'        => $ambil['username_u'],
         'no_hp_u'           => $ambil['no_hp_u'],
         'email_u'           => $ambil['email_u'],
         'foto_u'            => $file,
      );
      $this->Data_model->update_konten('users', $data, $ambil['id_users'], 'id_users');

      if (!empty($ambil['password_u'])) {
         $password_asli = $ambil['password_u'];
         $ambil['password_u'] = sha1($ambil['password_u']);
         $data = array(
            'password_u' => $ambil['password_u'],
            'password_asli_u' => $password_asli,
         );
         $this->Data_model->update_konten('users', $data, $ambil['id_users'], 'id_users');
      }

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data Users berhasil diperbaharui
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
      return redirect()->to(base_url($url));
   }

   public function reset_password_users($id)
   {
      $ambil['password_u'] = sha1('password');
      $data = array(
         'password_u'        => $ambil['password_u'],
         'password_asli_u'   => 'password',
      );
      $this->Data_model->update_konten('users', $data, $id, 'id_users');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, password telah berhasil di ubah. Password default adalah <b>password</b>
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
      return redirect()->to(base_url($url));
   }

   public function ubah_status_users($id)
   {
      $ambil = $this->request->getPost();

      $status = '';

      if (isset($ambil['Nonaktif'])) {
         unset($ambil['Nonaktif']);
         $status = '0';
      } elseif (isset($ambil['Aktif'])) {
         unset($ambil['Aktif']);
         $status = '1';
      }

      $data = array(
         'status_u'     => $status,
      );
      $this->Data_model->update_konten('users', $data, $id, 'id_users');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            Status pengguna berhasil diubah
            </div>'
      );

      $url = session()->get('level_users')['nama_lev'] . "/Users/tampil_users";
      return redirect()->to(base_url($url));
   }
}
