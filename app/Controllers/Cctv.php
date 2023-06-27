<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data_model;

class Cctv extends BaseController
{
	protected $Data_model;
	public function __construct()
	{
		$this->Data_model = new Data_model();
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

	public function index()
	{
		$data['data_cctv'] = $this->Data_model->tampil_kontenDsc('cctv', 'id_cctv');
		$data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');

		echo view('template/beranda/header');
		echo view('page/cctv/tampil-cctv', $data);
		echo view('template/beranda/footer');
	}

	public function tampil_peta()
	{
		$data['data_cctv'] = $this->Data_model->tampil_kontenDsc('cctv', 'id_cctv');
		$data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');

		echo view('template/beranda/header');
		echo view('page/cctv/tampil-peta', $data);
		echo view('template/beranda/footer');
	}

	public function tampil_kontak()
	{
		$data['data_cctv'] = $this->Data_model->tampil_kontenDsc('cctv', 'id_cctv');

		echo view('template/beranda/header');
		echo view('page/cctv/tampil-kontak', $data);
		echo view('template/beranda/footer');
	}

	public function filter_cctv()
	{
		$ambil = $this->request->getPost();

		if (empty($ambil['id_kecamatan']) && empty($ambil['id_kabupaten'])) {
			return redirect()->to(base_url("/Cctv/tampil_cctv"));
		} elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
			$data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
		} elseif ($ambil['id_kecamatan'] && $ambil['id_kelurahan']) {
			$data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'] . " AND id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
		}
		$data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');

		echo view('template/beranda/header');
		echo view('page/cctv/tampil-cctv', $data);
		echo view('template/beranda/footer');
	}

	public function filter_peta()
	{
		$ambil = $this->request->getPost();

		if (empty($ambil['id_kecamatan']) && empty($ambil['id_kabupaten'])) {
			return redirect()->to(base_url("/Cctv/tampil_peta"));
		} elseif ($ambil['id_kecamatan'] && empty($ambil['id_kelurahan'])) {
			$data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'])->getResultArray();
		} elseif ($ambil['id_kecamatan'] && $ambil['id_kelurahan']) {
			$data['data_cctv'] = $this->db->query("SELECT * FROM cctv WHERE id_kecamatan =  " . $ambil['id_kecamatan'] . " AND id_kelurahan =  " . $ambil['id_kelurahan'])->getResultArray();
		}
		$data['data_kecamatan'] = $this->Data_model->tampil_kontenDsc('kecamatan', 'id_kecamatan');

		echo view('template/beranda/header');
		echo view('page/cctv/tampil-peta', $data);
		echo view('template/beranda/footer');
	}
}
