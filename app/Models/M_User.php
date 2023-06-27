<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
	function login($data)
	{
		return $this->db->table('users')
			->join('level', 'users.id_level = level.id_level')
			->where('username_u', $data['username'])
			->where('password_u', $data['password'])
			->get()->getRowArray();
	}
}
