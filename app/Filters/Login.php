<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Login implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (!session()->get('level_users')) {
			return redirect()->to(base_url('/'));
		} else {
			$request = \Config\Services::request();
			$menu = $request->uri->getSegment(1);
			if (session()->get('level_users')['nama_lev'] == $menu) {
				return true;
			} else {
				return redirect()->to(base_url('/'));
			}
		}
	}

	//--------------------------------------------------------------------

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}
