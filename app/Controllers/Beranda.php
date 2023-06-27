<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Data_model;

class Beranda extends BaseController
{
	protected $Data_model;
	public function __construct()
	{

		$this->Data_model = new Data_model();
	}

	public function index()
	{
		$data['data_cctv'] = $this->Data_model->tampil_kontenDsc('cctv', 'id_cctv');

		echo view('template/beranda/header');
		echo view('template/beranda/beranda', $data);
		echo view('template/beranda/footer');
	}
}
