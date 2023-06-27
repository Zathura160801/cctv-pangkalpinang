<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_model extends Model
{
	public function tampil_konten($tabel)
	{
		$query = $this->db->query("select * from $tabel");
		return $query->getResultArray();
	}

	public function tampil_kontenDsc($tabel, $order)
	{
		$query = $this->db->query("select * from $tabel order by $order desc");
		return $query->getResultArray();
	}

	public function tampil_kontenAsc($tabel, $order)
	{
		$query = $this->db->query("select * from $tabel order by $order asc");
		return $query->getResultArray();
	}

	public function getPertama($tabel)
	{
		$query = $this->db->query("select * from $tabel");
		return $query->getFirstRow('array');
	}

	public function getKonten($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = $id");
		return $query->getResultArray();
	}

	public function getRowArrayKonten($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = $id");
		return $query->getRowArray();
	}

	public function getKontenGroupby($tabel, $group)
	{
		$query = $this->db->query("select * from $tabel groupby $group");
		return $query->getResultArray();
	}

	public function getKontenStr($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = '$id'");
		return $query->getResultArray();
	}

	public function getKontenStr2KondisiORDesc($tabel, $kondisi1, $kondisi2, $id1, $id2, $order)
	{
		$query = $this->db->query("select * from $tabel where $kondisi1 = '$id1' OR $kondisi2 = '$id2' ORDER BY $order DESC");
		return $query->getResultArray();
	}

	public function getKonten4KondisiORDesc($tabel, $kondisi1, $kondisi2, $id1, $id2, $order)
	{
		$query = $this->db->query("select * from $tabel where ($kondisi1 = $id1 AND $kondisi2 = $id2) OR ($kondisi1 = $id2 AND $kondisi2 = $id1) ORDER BY $order DESC");
		return $query->getResultArray();
	}

	public function getKontenRow4KondisiORDesc($tabel, $kondisi1, $kondisi2, $id1, $id2, $order)
	{
		$query = $this->db->query("select * from $tabel where ($kondisi1 = $id1 AND $kondisi2 = $id2) OR ($kondisi1 = $id2 AND $kondisi2 = $id1) ORDER BY $order DESC");
		return $query->getFirstRow('array');
	}

	public function getKontenRow($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = $id");
		return $query->getFirstRow('array');
	}

	public function getKontenRowStr($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = '$id'");
		return $query->getFirstRow('array');
	}

	public function simpan_konten($tabel, $data)
	{
		$query = $this->db->table($tabel)->insert($data);
		return $query;
	}

	public function update_konten($tabel, $data, $id, $kondisi)
	{
		$query = $this->db->table($tabel)->update($data, array($kondisi => $id));
		return $query;
	}

	public function update_seluruh($tabel, $data)
	{
		$query = $this->db->table($tabel)->update($data);
		return $query;
	}

	public function hapus_konten($tabel, $id, $kondisi)
	{
		$query = $this->db->table($tabel)->delete(array($kondisi => $id));
		return $query;
	}

	public function getKontenGroupDesc($tabel, $kondisi, $id, $group, $order)
	{
		$query = $this->db->query("select * from $tabel WHERE $kondisi = $id GROUP BY $group ORDER BY $order DESC");
		return $query->getResultArray();
	}

	public function getKonten2KondisiGroupDesc($tabel, $kondisi1, $kondisi2, $id1, $id2, $group, $order)
	{
		$query = $this->db->query("select * from $tabel WHERE $kondisi1 = $id1 OR $kondisi2 = $id2 GROUP BY $group ORDER BY $order DESC");
		return $query->getResultArray();
	}

	public function getKonten_asc($tabel, $id, $kondisi, $order)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = $id order by $order asc");
		return $query->getResultArray();
	}

	public function getKonten_desc($tabel, $id, $kondisi, $order)
	{
		$query = $this->db->query("select * from $tabel where $kondisi = $id order by $order desc");
		return $query->getResultArray();
	}

	public function getKontenRow2Kondisi($tabel, $kondisi1, $kondisi2, $id1, $id2)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = $id1 AND $kondisi2 = $id2");
		return $query->getFirstRow('array');
	}

	public function getKontenRowStr2Kondisi($tabel, $kondisi1, $kondisi2, $id1, $id2)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = '$id1' AND $kondisi2 = '$id2'");
		return $query->getFirstRow('array');
	}

	public function getKonten2Kondisi($tabel, $kondisi1, $kondisi2, $id1, $id2)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = $id1 AND $kondisi2 = $id2");
		return $query->getResultArray();
	}

	public function getKonten2KondisiOr($tabel, $kondisi1, $kondisi2, $id1, $id2)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = $id1 OR $kondisi2 = $id2");
		return $query->getResultArray();
	}

	public function getKonten2KondisiORDesc($tabel, $kondisi1, $kondisi2, $id1, $id2, $order)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = $id1 OR $kondisi2 = $id2 ORDER BY $order DESC");
		return $query->getResultArray();
	}

	public function getKonten3Kondisi($tabel, $kondisi1, $kondisi2, $kondisi3, $id1, $id2, $id3)
	{
		$query = $this->db->query("select * FROM $tabel WHERE $kondisi1 = $id1 AND $kondisi2 = $id2 AND $kondisi3 = $id3");
		return $query->getResultArray();
	}

	// ----------------------------- COUNT ------------------------------------
	public function count_data($tabel, $kondisi, $id)
	{
		return $this->db->table($tabel)
			->where($kondisi, $id)
			->countAllResults();
	}
	// ----------------------------- END COUNT ------------------------------------


	// ----------------------------- PENCARIAN --------------------------------
	public function PencarianBeranda($tabel1, $tabel2, $id, $ambil, $group)
	{
		$pencarian = $ambil['pencarian'];
		$id_kabupaten = $ambil['id_kabupaten'];
		$id_kecamatan = $ambil['id_kecamatan'];
		$id_kelurahan = $ambil['id_kelurahan'];

		if (empty($pencarian)) {
			if ($id_kabupaten && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "id_kabupaten = $id_kabupaten";
			} elseif ($id_kabupaten && $id_kecamatan && empty($id_kelurahan)) {
				$where = "id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan";
			} elseif ($id_kabupaten && $id_kecamatan && $id_kelurahan) {
				$where = "id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan AND id_kelurahan = $id_kelurahan";
			}
		} else {
			if ($pencarian && empty($id_kabupaten) && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%'";
			} elseif ($pencarian && $id_kabupaten && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten";
			} elseif ($pencarian && $id_kabupaten && $id_kecamatan && empty($id_kelurahan)) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan";
			} elseif ($pencarian && $id_kabupaten && $id_kecamatan && $id_kelurahan) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan AND id_kelurahan = $id_kelurahan";
			}
		}

		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->groupBy($group)
			->get()->getResultArray();
	}

	public function PencarianBeranda2($tabel1, $tabel2, $id, $ambil)
	{
		$pencarian = $ambil['pencarian'];
		$id_kabupaten = $ambil['id_kabupaten'];
		$id_kecamatan = $ambil['id_kecamatan'];
		$id_kelurahan = $ambil['id_kelurahan'];

		if (empty($pencarian)) {
			if ($id_kabupaten && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "id_kabupaten = $id_kabupaten";
			} elseif ($id_kabupaten && $id_kecamatan && empty($id_kelurahan)) {
				$where = "id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan";
			} elseif ($id_kabupaten && $id_kecamatan && $id_kelurahan) {
				$where = "id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan AND id_kelurahan = $id_kelurahan";
			}
		} else {
			if ($pencarian && empty($id_kabupaten) && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%'";
			} elseif ($pencarian && $id_kabupaten && empty($id_kecamatan) && empty($id_kelurahan)) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten";
			} elseif ($pencarian && $id_kabupaten && $id_kecamatan && empty($id_kelurahan)) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan";
			} elseif ($pencarian && $id_kabupaten && $id_kecamatan && $id_kelurahan) {
				$where = "(nama_toko LIKE '%$pencarian%' OR nama_produk LIKE '%$pencarian%') AND id_kabupaten = $id_kabupaten AND id_kecamatan = $id_kecamatan AND id_kelurahan = $id_kelurahan";
			}
		}

		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->get()->getResultArray();
	}

	public function PencarianHeader($tabel1, $tabel2, $id, $kondisi1, $kondisi2, $id1, $id2, $group)
	{
		$where = "$kondisi1 LIKE '%$id1%' OR $kondisi2 LIKE '%$id2%'";

		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->groupBy($group)
			->get()->getResultArray();
	}

	public function PencarianHeader2($tabel1, $tabel2, $id, $kondisi1, $kondisi2, $id1, $id2)
	{
		$where = "$kondisi1 LIKE '%$id1%' OR $kondisi2 LIKE '%$id2%'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->get()->getResultArray();
	}

	public function PencarianData($tabel, $kondisi, $id)
	{
		$query = $this->db->query("select * from $tabel where $kondisi LIKE '%$id%'");
		return $query->getResultArray();
	}

	public function filter_range_tanggal($tabel, $kondisi, $id, $kondisi2, $id2)
	{
		$where = "DATE_FORMAT($kondisi, '%Y-%m-%d') >= '$id' and DATE_FORMAT($kondisi2, '%Y-%m-%d') <= '$id2'";
		return $this->db->table($tabel)
			->where($where)
			->countAllResults();
	}

	public function filter_range_tanggal_desc($tabel, $kondisi, $id, $kondisi2, $id2, $order)
	{
		$where = "DATE_FORMAT($kondisi, '%Y-%m-%d') >= '$id' and DATE_FORMAT($kondisi2, '%Y-%m-%d') <= '$id2'";
		return $this->db->table($tabel)
			->where($where)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}
	// ----------------------------- END PENCARIAN --------------------------------


	// ----------------------------- JOIN 2 TABEL ------------------------------------
	public function Join2Tabel2Kondisi($tabel1, $tabel2, $id, $kondisi1, $kondisi2, $id1, $id2)
	{
		$where = "$kondisi1 = '$id1' AND $kondisi2 = '$id2'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->get()->getResultArray();
	}

	public function Join2Tabel2KondisiDsc($tabel1, $tabel2, $id, $kondisi1, $kondisi2, $id1, $id2)
	{
		$where = "$kondisi1 = '$id1' AND $kondisi2 = '$id2'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->get()->getResultArray();
	}

	public function Join2TabelRow2Kondisi($tabel1, $tabel2, $id, $kondisi1, $kondisi2, $id1, $id2)
	{
		$where = "$kondisi1 = '$id1' AND $kondisi2 = '$id2'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($where)
			->get()->getFirstRow('array');
	}
	// ----------------------------- END JOIN 2 TABEL ------------------------------------


	// ----------------------------- JOIN 2 TABEL ASC ------------------------------------
	public function Join2TabelAsc($tabel1, $tabel2, $id, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'ASC')
			->get()->getResultArray();
	}

	public function Join2Tabel1KondisiAsc($tabel1, $tabel2, $id, $kondisi, $id2, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'ASC')
			->where($kondisi, $id2)
			->get()->getResultArray();
	}

	public function Join2Tabel1KondisiRow($tabel1, $tabel2, $id, $kondisi, $id2)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($kondisi, $id2)
			->get()->getFirstRow('array');
	}

	public function Join2TabelGroupAsc($tabel1, $tabel2, $id, $order, $group)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'ASC')
			->groupBy($group)
			->get()->getResultArray();
	}


	public function Join2TabelRandom($tabel1, $tabel2, $id, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'RANDOM')
			->get()->getResultArray();
	}

	public function Join2Tabel1KondisiRandom($tabel1, $tabel2, $id, $kondisi, $id2, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'RANDOM')
			->where($kondisi, $id2)
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 2 TABEL ASC --------------------------------



	// ----------------------------- JOIN 2 TABEL DESC ------------------------------------
	public function Join2TabelDsc($tabel1, $tabel2, $id, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}

	public function Join2TabelRowDsc($tabel1, $tabel2, $id, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'DESC')
			->get()->getFirstRow('array');
	}

	public function Join2Tabel1KondisiDsc($tabel1, $tabel2, $id, $kondisi, $id2, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'DESC')
			->where($kondisi, $id2)
			->get()->getResultArray();
	}

	public function Join2Tabel1Kondisi2($tabel1, $tabel2, $id, $kondisi, $id2, $order1, $order2)
	{
		$urutan = "$order1 DESC, $order2 DESC";

		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->where($kondisi, $id2)
			->orderBy($urutan)
			->get()->getResultArray();
	}

	public function Join2Tabel1KondisiRowDsc($tabel1, $tabel2, $id, $kondisi, $id2, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'DESC')
			->where($kondisi, $id2)
			->get()->getFirstRow('array');
	}

	public function Join2TabelGroupDsc($tabel1, $tabel2, $id, $order, $group)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id . '=' . $tabel2 . '.' . $id)
			->orderBy($order, 'DESC')
			->groupBy($group)
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 2 TABEL DESC --------------------------------



	// ----------------------------- JOIN 3 TABEL ASC ------------------------------------
	public function Join3TabelAsc($tabel1, $tabel2, $tabel3, $id2, $id3, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'ASC')
			->get()->getResultArray();
	}

	public function CountJoin3TabelAsc($tabel1, $tabel2, $tabel3, $id2, $id3, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'ASC')
			->countAllResults();
	}
	// ----------------------------- END JOIN 3 TABEL ASC --------------------------------



	// ----------------------------- JOIN 3 TABEL DESC ------------------------------------
	public function Join3TabelDsc($tabel1, $tabel2, $tabel3, $id2, $id3, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}

	//only for ulasan dan rating
	public function Join3Tabel($tabel1, $tabel2, $tabel3, $id2, $id3)
	{
		$where = "status_ulasan = 'Selesai'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($where)
			->get()->getResultArray();
	}

	public function Join3Tabel2Kondisi($tabel1, $tabel2, $tabel3, $id1, $id2, $kondisi1, $kondisi2, $id3, $id4)
	{
		$where = "$kondisi1 = '$id3' AND $kondisi2 = '$id4'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id1 . '=' . $tabel2 . '.' . $id1)
			->join($tabel3, $tabel1 . '.' . $id2 . '=' . $tabel3 . '.' . $id2)
			->where($where)
			->get()->getResultArray();
	}

	public function Join3TabelKondisiGroupDsc($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id, $order, $group)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($kondisi, $id)
			->orderBy($order, 'DESC')
			->groupBy($group)
			->get()->getResultArray();
	}

	public function Join3TabelKondisiDsc($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($kondisi, $id)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}

	public function Join3TabelKondisiRowGroup($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id, $group)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($kondisi, $id)
			->groupBy($group)
			->get()->getFirstRow('array');
	}

	public function Join3Tabel3Kondisi($tabel1, $tabel2, $tabel3, $id1, $id2, $kondisi1, $kondisi2, $kondisi3, $id3, $id4, $id5)
	{
		$where = "$kondisi1 = '$id3' AND $kondisi2 = '$id4' AND $kondisi3 = '$id5'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id1 . '=' . $tabel2 . '.' . $id1)
			->join($tabel3, $tabel1 . '.' . $id2 . '=' . $tabel3 . '.' . $id2)
			->where($where)
			->get()->getResultArray();
	}

	public function Join3TabelRowKondisi($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'DESC')
			->where($kondisi, $id1)
			->get()->getFirstRow('array');
	}

	public function Join3TabelKondisi($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'DESC')
			->where($kondisi, $id1)
			->get()->getResultArray();
	}

	public function Join3TabelKondisiAsc($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'Asc')
			->where($kondisi, $id1)
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 3 TABEL DESC --------------------------------



	// ----------------------------- JOIN 4 TABEL DESC ------------------------------------
	public function Join4TabelDsc($tabel1, $tabel2, $tabel3, $tabel4, $id2, $id3, $id4, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 4 TABEL DESC --------------------------------

	public function Join6TabelKondisi($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $id2, $id3, $id4, $id5, $id6, $kondisi, $id1)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->where($kondisi, $id1)
			->get()->getFirstRow('array');
	}

	public function Join6Tabel($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $id2, $id3, $id4, $id5, $id6, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}

	// ----------------------------- JOIN 10 TABEL DESC -> TOKO ------------------------------------
	public function Join10TabelDsc($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $tabel7, $tabel8, $tabel9, $tabel10, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->join($tabel7, $tabel1 . '.' . $id7 . '=' . $tabel7 . '.' . $id7)
			->join($tabel8, $tabel1 . '.' . $id8 . '=' . $tabel8 . '.' . $id8)
			->join($tabel9, $tabel1 . '.' . $id9 . '=' . $tabel9 . '.' . $id9)
			->join($tabel10, $tabel10 . '.' . $id10 . '=' . $tabel1 . '.' . $id10)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 10 TABEL DESC --------------------------------



	// ----------------------------- JOIN 10 TABEL KONDISI DESC -> TOKO ------------------------------------
	public function Join10TabelKondisiDsc($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $tabel7, $tabel8, $tabel9, $tabel10, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->join($tabel7, $tabel1 . '.' . $id7 . '=' . $tabel7 . '.' . $id7)
			->join($tabel8, $tabel1 . '.' . $id8 . '=' . $tabel8 . '.' . $id8)
			->join($tabel9, $tabel1 . '.' . $id9 . '=' . $tabel9 . '.' . $id9)
			->join($tabel10, $tabel10 . '.' . $id10 . '=' . $tabel1 . '.' . $id10)
			->orderBy($order, 'DESC')
			->where($kondisi, $id1)
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 10 TABEL KONDISI DESC --------------------------------



	// ----------------------------- JOIN 10 TABEL ROW KONDISI DESC -> TOKO ------------------------------------
	public function Join10TabelRowKondisiDsc($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $tabel7, $tabel8, $tabel9, $tabel10, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->join($tabel7, $tabel1 . '.' . $id7 . '=' . $tabel7 . '.' . $id7)
			->join($tabel8, $tabel1 . '.' . $id8 . '=' . $tabel8 . '.' . $id8)
			->join($tabel9, $tabel1 . '.' . $id9 . '=' . $tabel9 . '.' . $id9)
			->join($tabel10, $tabel10 . '.' . $id10 . '=' . $tabel1 . '.' . $id10)
			->orderBy($order, 'DESC')
			->where($kondisi, $id1)
			->get()->getFirstRow('array');
	}

	public function Join10TabelOrderDsc($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $tabel7, $tabel8, $tabel9, $tabel10, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10,  $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel1 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel1 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel1 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->join($tabel7, $tabel1 . '.' . $id7 . '=' . $tabel7 . '.' . $id7)
			->join($tabel8, $tabel1 . '.' . $id8 . '=' . $tabel8 . '.' . $id8)
			->join($tabel9, $tabel1 . '.' . $id9 . '=' . $tabel9 . '.' . $id9)
			->join($tabel10, $tabel10 . '.' . $id10 . '=' . $tabel1 . '.' . $id10)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}
	// ----------------------------- END JOIN 10 TABEL ROW KONDISI DESC --------------------------------



	// ----------------------------- JOIN 11 TABEL ROW KONDISI DESC -> PRODUK ------------------------------------
	public function Join11TabelRowKondisiDsc($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $tabel6, $tabel7, $tabel8, $tabel9, $tabel10, $tabel11, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $id11, $kondisi, $id1, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->join($tabel4, $tabel2 . '.' . $id4 . '=' . $tabel4 . '.' . $id4)
			->join($tabel5, $tabel2 . '.' . $id5 . '=' . $tabel5 . '.' . $id5)
			->join($tabel6, $tabel2 . '.' . $id6 . '=' . $tabel6 . '.' . $id6)
			->join($tabel7, $tabel2 . '.' . $id7 . '=' . $tabel7 . '.' . $id7)
			->join($tabel8, $tabel2 . '.' . $id8 . '=' . $tabel8 . '.' . $id8)
			->join($tabel9, $tabel2 . '.' . $id9 . '=' . $tabel9 . '.' . $id9)
			->join($tabel10, $tabel2 . '.' . $id10 . '=' . $tabel10 . '.' . $id10)
			->join($tabel11, $tabel11 . '.' . $id11 . '=' . $tabel2 . '.' . $id11)
			->orderBy($order, 'DESC')
			->where($kondisi, $id1)
			->get()->getFirstRow('array');
	}
	// ----------------------------- END JOIN 11 TABEL ROW KONDISI DESC --------------------------------



	public function JoinPercakapanDesc($tabel1, $tabel2, $tabel3, $order)
	{
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.id_pengirim=' . $tabel2 . '.id_users')
			->join($tabel3, $tabel1 . '.id_penerima=' . $tabel3 . '.id_users')
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}



	//--------------------------------- SUM RATING & TERJUAL -------------------------------------
	public function sum($tabel, $sum, $group)
	{
		$query = $this->db->query("select *, SUM($sum) as sum FROM $tabel group by $group");
		return $query->getResultArray();
	}

	public function sum_kondisi($tabel, $sum, $kondisi, $id)
	{
		$query = $this->db->query("select *, SUM($sum) as sum FROM $tabel where $kondisi = '$id'");
		return $query->getFirstRow('array');
	}

	//dipake buat terjual produk di satu toko
	public function sum_join2tabel($tabel1, $tabel2, $id2, $sum, $kondisi, $id)
	{
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->where($kondisi, $id)
			->get()->getFirstRow('array');
	}
	public function sum_join3tabel2kondisi($tabel1, $tabel2, $tabel3, $id2, $id3, $sum, $kondisi1, $kondisi2, $id11, $id12)
	{
		$where = "$kondisi1 = '$id11' and $kondisi2 != '$id12'";
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($where)
			->get()->getFirstRow('array');
	}

	//dipake buat terjual produk tiap produk & sum rating tiap produk
	public function sum_join2tabel_groupby_orderbyDesc($tabel1, $tabel2, $id2, $sum, $group, $order)
	{
		$where = "status_ulasan = 'Selesai'";
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->where($where)
			->groupBy($group)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}
	public function sum_join3tabelkondisi_groupby_orderbyDesc($tabel1, $tabel2, $tabel3, $id2, $id3, $sum,  $kondisi, $id, $group, $order)
	{
		$where = "$kondisi != '$id'";
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel1 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($where)
			->groupBy($group)
			->orderBy($order, 'DESC')
			->get()->getResultArray();
	}

	//dipake buat dptin sum rating di satu toko
	public function sum_join3tabel($tabel1, $tabel2, $tabel3, $id2, $id3, $sum, $kondisi, $id)
	{
		$where = "$kondisi = '$id' && status_ulasan = 'Selesai'";
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($where)
			->get()->getFirstRow('array');
	}

	public function SumJoin3TabelGroupBy($tabel1, $tabel2, $tabel3, $id2, $id3, $sum, $group)
	{
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->groupBy($group)
			->get()->getFirstRow('array');
	}

	//only for ulasan dan rating
	public function SumJoin3TabelGroupByArray($tabel1, $tabel2, $tabel3, $id2, $id3, $sum, $group)
	{
		$where = "status_ulasan = 'Selesai'";
		return $this->db->table($tabel1)
			->select('*, SUM(' . $sum . ') as sum')
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->where($where)
			->groupBy($group)
			->get()->getResultArray();
	}

	//dipake buat dptin banyak yg ngerating produk di tuh toko
	public function UlasanJoin3TabelKondisi($tabel1, $tabel2, $tabel3, $id2, $id3, $kondisi, $id, $order)
	{
		$where = "$kondisi = '$id' && status_ulasan = 'Selesai'";
		return $this->db->table($tabel1)
			->join($tabel2, $tabel1 . '.' . $id2 . '=' . $tabel2 . '.' . $id2)
			->join($tabel3, $tabel2 . '.' . $id3 . '=' . $tabel3 . '.' . $id3)
			->orderBy($order, 'DESC')
			->where($where)
			->get()->getResultArray();
	}
	//--------------------------------- END SUM RATING & TERJUAL -------------------------------------




	//--------------------------------- NANTI GAK DIPAKAI -------------------------------------

	public function count_tanggal($tabel, $kondisi1, $id1, $kondisi2, $id2)
	{
		$where = "$kondisi1 = '$id1' and DATE_FORMAT($kondisi2, '%Y-%m-%d') = '$id2'";
		return $this->db->table($tabel)
			->where($where)
			->countAllResults();
	}

	public function count_filter_tanggal($tabel, $kondisi1, $id1, $kondisi2, $id2, $kondisi3, $id3)
	{
		$where = "$kondisi1 = '$id1' and DATE_FORMAT($kondisi2, '%Y-%m-%d') >= '$id2' and DATE_FORMAT($kondisi3, '%Y-%m-%d') <= '$id3'";
		return $this->db->table($tabel)
			->where($where)
			->countAllResults();
	}

	public function sum_tanggal($tabel, $sum, $kondisi, $id)
	{
		$query = $this->db->query("select *, SUM($sum) as sum_total FROM $tabel where DATE_FORMAT($kondisi, '%Y-%m-%d') = '$id'");
		return $query->getFirstRow('array');
	}

	public function sum_filter_tanggal($tabel, $sum, $kondisi1, $id1, $kondisi2, $id2)
	{
		$query = $this->db->query("select *, SUM($sum) as sum_total FROM $tabel where DATE_FORMAT($kondisi1, '%Y-%m-%d') >= '$id1' and DATE_FORMAT($kondisi2, '%Y-%m-%d') <= '$id2'");
		return $query->getFirstRow('array');
	}
}
