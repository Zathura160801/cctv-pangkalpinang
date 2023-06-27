<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_User;

class Login extends BaseController
{
   protected $M_user;
   public function __construct()
   {
      $this->M_user = new M_user();
   }

   public function index()
   {
      $data = $this->request->getPost();
      if ($data) {

         // Validation
         $input = $this->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|verifyrecaptcha',
         ], [
            'g-recaptcha-response' => [
               'required' => 'Please verify captcha',
            ],
         ]);

         if (!$input) { // Not valid
            $data['validation'] = $this->validator;

            return redirect()->to(base_url('Login'))->withInput()->with('validation', $this->validator);
            // return redirect()->back()->withInput()->with('validation', $this->validator);
         } else {
            // Set Session
            session()->setFlashdata('pesan', 'Login Berhasil');
         }

         $data['password'] = sha1($data['password']);
         $account = $this->M_user->login($data);

         if ($account > 0) {
            if ($account['status_u'] == '0') {
               session()->setFlashdata(
                  'pesan',
                  '<div class="container-alert-danger alert-danger">
						<strong>Akun tidak aktif,</strong> periksa email anda atau hubungi pihak Administrasi untuk mengaktifkan akun 
						</div>'
               );
               return redirect()->to(base_url('Login'))->withInput();
            } else {
               $level = $account['nama_lev'];
               session()->set('level_users', $account);
               return redirect()->to(base_url("$level/Home"));
            }
         } else {
            session()->setFlashdata(
               'pesan',
               '<div class="container-alert-danger alert-danger">
					<strong>Mohon Maaf,</strong> Username atau Password anda salah
					</div>'
            );
            return redirect()->to(base_url('Login'))->withInput();
         }
      }

      if (!session()->get('level_users')) {
         return view('template/login');
      } else {
         $level = session()->get('level_users')['nama_lev'];
         return redirect()->to(base_url("$level/Home"));
      }
   }
}
