<?php

namespace App\Controllers\Administrator;

$request = \Config\Services::request();

use App\Controllers\Administrator;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cctv extends BaseController
{
   protected $Data_model;
   public function __construct()
   {
      $this->Data_model = new \App\Models\Data_model();
      $this->db = db_connect();
   }

   // -------------------------- LINKED SELECT KECAMATAN & KELURAHAN ------------------------------
   public function actionKecamatanKelurahan()
   {
      $ambil = $this->request->getVar();
      if ($ambil) {
         if ($ambil['action'] == 'getKelurahan') {
            $kelurahan = $this->Data_model->getKonten_asc('kelurahan', $ambil['id_kecamatan'], 'id_kecamatan', 'nama_kelurahan');
            echo json_encode($kelurahan);
         }
      }
   }
   // ------------------------ END LINKED SELECT KECAMATAN & KELURAHAN ----------------------------

   public function tampil_cctv()
   {
      $ambil = $this->request->getPost();


      if ($ambil) {
         if (empty($ambil['id_kecamatan'])) {
            $ambil['id_kecamatan'] = "";
         }
         if (empty($ambil['id_kelurahan'])) {
            $ambil['id_kelurahan'] = "";
         }

         if (empty($ambil['id_kecamatan']) && empty($ambil['id_kelurahan'])) {
            $url = session('level_users')['nama_lev'] . "/Cctv/tampil_cctv";
            return redirect()->to(base_url($url));
         } elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
            $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
         } elseif ($ambil['id_kecamatan'] && $ambil['id_kelurahan']) {
            $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'] . " AND cctv.id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
         }

         $data['simpan_filter'] = array(
            'id_kecamatan'     => $ambil['id_kecamatan'],
            'id_kelurahan'     => $ambil['id_kelurahan'],
         );
      } else {
         $data['data_cctv'] = $this->Data_model->Join3TabelDsc('cctv', 'kelurahan', 'kecamatan', 'id_kelurahan', 'id_kecamatan', 'id_cctv');

         $data['simpan_filter'] = array(
            'id_kecamatan'     => "",
            'id_kelurahan'     => "",
         );
      }
      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');
      $data['data_kelurahan'] = $this->Data_model->tampil_kontenDsc('kelurahan', 'id_kelurahan');

      echo view('template/admin/header');
      echo view('page/cctv/cctv/tampil-cctv', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function simpan_cctv()
   {
      $ambil = $this->request->getPost();
      $file = $this->request->getFile('frame_cctv');

      if (!$this->validate([
         'frame_cctv' => [
            'uploaded[frame_cctv]',
            'mime_in[frame_cctv,image/jpg,image/jpeg,image/png]',
            'max_size[frame_cctv,2048]',
         ]
      ])) {
         session()->setFlashdata(
            'pesan',
            '<div class="alert alert-danger">
                  <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                  <strong>Mohon Maaf</strong>, Frame CCTV yang anda upload tidak memenuhi syarat
                  </div>'
         );
         $url = session()->get('level_users')['nama_lev'] . "/Cctv/tampil_cctv";
         return redirect()->to(base_url($url))->withInput();
      }

      $file = $this->request->getFile('frame_cctv');
      $file->move(ROOTPATH . 'public/berkas/uploads/frame-video');
      $file = $file->getName();

      $data = array(
         'id_kecamatan'    => $ambil['id_kecamatan'],
         'id_kelurahan'    => $ambil['id_kelurahan'],
         'nama_cctv'       => $ambil['nama_cctv'],
         'url_cctv'        => $ambil['url_cctv'],
         'alamat_cctv'     => $ambil['alamat_cctv'],
         'latitude'        => $ambil['lat'],
         'longitude'       => $ambil['long'],
         'deskripsi_cctv'  => $ambil['deskripsi_cctv'],
         'frame_cctv'      => $file
      );
      $this->Data_model->simpan_konten('cctv', $data);

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data CCTV berhasil ditambahkan
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Cctv/tampil_cctv";
      return redirect()->to(base_url($url))->withInput();
   }

   public function ubah_cctv($id_cctv)
   {
      $data['get_cctv'] = $this->Data_model->Join3TabelRowKondisi('cctv', 'kecamatan', 'kelurahan', 'id_kecamatan', 'id_kelurahan', 'id_cctv', $id_cctv, 'id_cctv');
      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');

      echo view('template/admin/header');
      echo view('page/cctv/cctv/ubah-cctv', $data);
      echo view('template/admin/sidebar');
      echo view('template/admin/footer');
   }

   public function update_cctv()
   {
      $ambil = $this->request->getPost();
      $file = $this->request->getFile('frame_cctv');

      $cek_data = $this->Data_model->getKontenRow('cctv', $ambil['id_cctv'], 'id_cctv');

      if ($file->getError() == 4) {
         $file = $cek_data['frame_cctv'];
      } else {
         if (!$this->validate([
            'frame_cctv' => [
               'uploaded[frame_cctv]',
               'mime_in[frame_cctv,image/jpg,image/jpeg,image/png]',
               'max_size[frame_cctv,2048]',
            ]
         ])) {
            session()->setFlashdata(
               'pesan',
               '<div class="alert alert-danger">
                  <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                  <strong>Mohon Maaf</strong>, Frame CCTV yang anda upload tidak memenuhi syarat
                  </div>'
            );
            $url = session()->get('level_users')['nama_lev'] . "/Cctv/tampil_cctv/" . $ambil['id_cctv'];
            return redirect()->to(base_url($url))->withInput();
         }

         $data_kon = $this->Data_model->getKonten('cctv', $ambil['id_cctv'], 'id_cctv');
         $delete_file = $data_kon[0]['frame_cctv'];
         if (!empty($delete_file)) {
            if (file_exists("public/berkas/uploads/frame-video/$delete_file")) {
               unlink("public/berkas/uploads/frame-video/$delete_file");
            }
         }

         $file = $this->request->getFile('frame_cctv');
         $file->move(ROOTPATH . 'public/berkas/uploads/frame-video');
         $file = $file->getName();
      }

      $data = array(
         'id_kecamatan'    => $ambil['id_kecamatan'],
         'id_kelurahan'    => $ambil['id_kelurahan'],
         'nama_cctv'       => $ambil['nama_cctv'],
         'url_cctv'        => $ambil['url_cctv'],
         'alamat_cctv'     => $ambil['alamat_cctv'],
         'latitude'        => $ambil['lat'],
         'longitude'       => $ambil['long'],
         'deskripsi_cctv'  => $ambil['deskripsi_cctv'],
         'frame_cctv'      => $file
      );
      $this->Data_model->update_konten('cctv', $data, $ambil['id_cctv'], 'id_cctv');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data CCTV berhasil diperbaharui
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Cctv/tampil_cctv";
      return redirect()->to(base_url($url));
   }

   public function hapus_cctv($id)
   {
      $data_kon = $this->Data_model->getKonten('cctv', $id, 'id_cctv');
      $delete_file = $data_kon[0]['frame_cctv'];
      if (!empty($delete_file)) {
         if (file_exists("public/berkas/uploads/frame-video/$delete_file")) {
            unlink("public/berkas/uploads/frame-video/$delete_file");
         }
      }

      $this->Data_model->hapus_konten('cctv', $id, 'id_cctv');

      session()->setFlashdata(
         'pesan',
         '<div class="alert alert-success">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Selamat</strong>, Data CCTV berhasil dihapus
            </div>'
      );
      $url = session()->get('level_users')['nama_lev'] . "/Cctv/tampil_cctv";
      return redirect()->to(base_url($url));
   }

   function cetak_laporan_cctv_pdf()
   {
      $ambil = $this->request->getPost();
      $id_users = session()->get('level_users')['id_users'];

      $data['simpan_filter'] = array(
         'id_kecamatan'     => $ambil['id_kecamatan'],
         'id_kelurahan'     => $ambil['id_kelurahan'],
      );

      if ($ambil['id_kecamatan'] != "" && $ambil['id_kelurahan'] != "") {
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'] . " AND cctv.id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
      } elseif ($ambil['id_kecamatan'] == "" && $ambil['id_kelurahan'] == "") {
         $data['data_cctv'] = $this->Data_model->Join3TabelDsc('cctv', 'kelurahan', 'kecamatan', 'id_kelurahan', 'id_kecamatan', 'id_cctv');
      } elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
      }

      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');
      $data['data_kelurahan'] = $this->Data_model->tampil_kontenDsc('kelurahan', 'id_kelurahan');

      ob_end_clean();
      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
      $html = view('page/cctv/cetak/cetak-laporan-cctv-pdf', $data);
      $mpdf->WriteHTML($html);
      $mpdf->debug = true;
      return redirect()->to($mpdf->Output('Laporan CCTV Pangkalpinang - ' . DateToIndo(date("Y-m-d")) . " - " . date("H:i:s") . '.pdf', 'I'));
   }

   function cetak_laporan_cctv_excel()
   {
      $ambil = $this->request->getPost();

      $data['data_cctv'] = $this->Data_model->Join3TabelDsc('cctv', 'kelurahan', 'kecamatan', 'id_kelurahan', 'id_kecamatan', 'id_cctv');

      $data['simpan_filter'] = array(
         'id_kecamatan'     => $ambil['id_kecamatan'],
         'id_kelurahan'     => $ambil['id_kelurahan'],
      );

      if ($ambil['id_kecamatan'] != "" && $ambil['id_kelurahan'] != "") {
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'] . " AND cctv.id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
      } elseif ($ambil['id_kecamatan'] == "" && $ambil['id_kelurahan'] == "") {
         $data['data_cctv'] = $this->Data_model->Join3TabelDsc('cctv', 'kelurahan', 'kecamatan', 'id_kelurahan', 'id_kecamatan', 'id_cctv');
      } elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
         $data['data_cctv'] = $this->db->query("SELECT * FROM cctv JOIN kecamatan ON cctv.id_kecamatan = kecamatan.id_kecamatan JOIN kelurahan ON cctv.id_kelurahan = kelurahan.id_kelurahan WHERE cctv.id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
      }

      $data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');
      $data['data_kelurahan'] = $this->Data_model->tampil_kontenDsc('kelurahan', 'id_kelurahan');

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $header = 1;

      $sheet->setCellValue('A' . $header, 'No');
      $sheet->setCellValue('B' . $header, 'Nama CCTV');
      $sheet->setCellValue('C' . $header, 'Alamat');
      $sheet->setCellValue('D' . $header, 'Kecamatan');
      $sheet->setCellValue('E' . $header, 'Kelurahan');
      $sheet->setCellValue('F' . $header, 'Latitude');
      $sheet->setCellValue('G' . $header, 'Longitude');
      $sheet->setCellValue('H' . $header, 'Deskripsi');

      $column = 2;
      if ($data['data_cctv'] == null) {
         $sheet->setCellValue('A' . $column, 'Tidak Ada Data');
         $sheet->mergeCells('A2:H2');
         $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
      } else {
         foreach ($data['data_cctv'] as $data_cctv) {
            $kec_low = strtolower($data_cctv['nama_kecamatan']);
            $kel_low = strtolower($data_cctv['nama_kelurahan']);

            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $data_cctv['nama_cctv']);
            $sheet->setCellValue('C' . $column, $data_cctv['alamat_cctv']);
            $sheet->setCellValue('D' . $column, ucfirst($kec_low));
            $sheet->setCellValue('E' . $column, ucfirst($kel_low));
            $sheet->setCellValue('F' . $column, $data_cctv['latitude']);
            $sheet->setCellValue('G' . $column, $data_cctv['longitude']);
            $sheet->setCellValue('H' . $column, $data_cctv['deskripsi_cctv']);
            $column++;
         }
      }


      $sheet->getColumnDimension('A')->setAutoSize(true);
      $sheet->getColumnDimension('B')->setAutoSize(true);
      $sheet->getColumnDimension('C')->setAutoSize(true);
      $sheet->getColumnDimension('D')->setAutoSize(true);
      $sheet->getColumnDimension('E')->setAutoSize(true);
      $sheet->getColumnDimension('F')->setAutoSize(true);
      $sheet->getColumnDimension('G')->setAutoSize(true);
      $sheet->getColumnDimension('H')->setAutoSize(true);

      $sheet->getStyle('A1:H1')->getFont()->setBold(true);
      $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');
      $styleArray = [
         'borders' => [
            'allBorders'   => [
               'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
               'color'     => ['argb'  => 'FF000000']
            ],
         ],
      ];
      $sheet->getStyle('A1:H' . ($column - 1))->applyFromArray($styleArray);

      $writer = new Xlsx($spreadsheet);
      header('Content-Disposition: attachment; filename=Laporan CCTV Pangkalpinang - ' . DateToIndo(date("Y-m-d")) . " - " . date("H:i:s") . '.xlsx');
      $writer->save('php://output');
      exit();
   }
}
