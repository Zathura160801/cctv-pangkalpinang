<?php
function tgl_indo($tanggal)
{
	$tgl = explode("-", $tanggal);
	$bln["01"] = "Januari";
	$bln["02"] = "Februari";
	$bln["03"] = "Maret";
	$bln["04"] = "April";
	$bln["05"] = "Mei";
	$bln["06"] = "Juni";
	$bln["07"] = "Juli";
	$bln["08"] = "Agustus";
	$bln["09"] = "September";
	$bln["10"] = "Oktober";
	$bln["11"] = "November";
	$bln["12"] = "Desember";
	if ($tgl[0] == "0000") {
		return $tanggal;
	} else {
		return $tgl[2] . " " . $bln[$tgl[1]] . " " . $tgl[0];
	}
}

function tgl_indo1($tanggal)
{
	$tgl = explode("-", $tanggal);
	$bln["01"] = "01";
	$bln["02"] = "02";
	$bln["03"] = "03";
	$bln["04"] = "04";
	$bln["05"] = "05";
	$bln["06"] = "06";
	$bln["07"] = "07";
	$bln["08"] = "08";
	$bln["09"] = "09";
	$bln["10"] = "10";
	$bln["11"] = "11";
	$bln["12"] = "12";
	if ($tgl[0] == "0000") {
		return $tanggal;
	} else {
		return $tgl[2] . "/" . $bln[$tgl[1]] . "/" . $tgl[0];
	}
}

function tgl_indo2($tanggal)
{
	$tgl = explode("/", $tanggal);
	$bln["01"] = "01";
	$bln["02"] = "02";
	$bln["03"] = "03";
	$bln["04"] = "04";
	$bln["05"] = "05";
	$bln["06"] = "06";
	$bln["07"] = "07";
	$bln["08"] = "08";
	$bln["09"] = "09";
	$bln["10"] = "10";
	$bln["11"] = "11";
	$bln["12"] = "12";
	if ($tgl[0] == "0000") {
		return $tanggal;
	} else {
		return $tgl[2] . "-" . $bln[$tgl[1]] . "-" . $tgl[0];
	}
}

function hari_ini()
{
	$hari = date("D");

	switch ($hari) {
		case 'Sun':
			$hari_ini = "Minggu";
			break;

		case 'Mon':
			$hari_ini = "Senin";
			break;

		case 'Tue':
			$hari_ini = "Selasa";
			break;

		case 'Wed':
			$hari_ini = "Rabu";
			break;

		case 'Thu':
			$hari_ini = "Kamis";
			break;

		case 'Fri':
			$hari_ini = "Jumat";
			break;

		case 'Sat':
			$hari_ini = "Sabtu";
			break;

		default:
			$hari_ini = "Tidak di ketahui";
			break;
	}

	return $hari_ini;
}

function rp($harga)
{
	return "Rp. " . number_format($harga, 0, ',', '.');
}

function rp1($harga)
{
	return number_format($harga, 0, ',', '.');
}

function selisih1($begin, $end)
{
	$begin = new DateTime($begin);
	$end = new DateTime($end);

	$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
	//mendapatkan range antara dua tanggal dan di looping
	$i = 0;
	$x     =    0;
	$end     =    1;

	foreach ($daterange as $date) {
		$daterange     = $date->format("dd/mm/yyyy");
		$datetime     = DateTime::createFromFormat('dd/mm/yyyy', $daterange);

		//Convert tanggal untuk mendapatkan nama hari
		$day         = $datetime->format('D');

		//Check untuk menghitung yang bukan hari sabtu dan minggu
		if ($day != "Sun" && $day != "Sat") {
			//echo $i;
			$x    +=    $end - $i;
		}
		$end++;
		$i++;
	}
	return $x + 1;
}

function selisih($begin, $end)
{
	$tgl1 = new DateTime($begin);
	$tgl2 = new DateTime($end);
	$difference = $tgl1->diff($tgl2);
	return $difference->days + 1;
}

function rupiah($nilai_rupiah)
{
	$nilai = str_replace(".", "", $nilai_rupiah);
	if ($nilai == "") {
		$nilai = 0;
		return $nilai;
	} else {
		$nilai = $nilai;
		return $nilai;
	}
}

function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " Belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " Seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " Seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "Minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai) . " " . "Rupiah");
	}
	return $hasil;
}

function DateToIndo($date)
{ // fungsi atau method untuk mengubah tanggal ke format indonesia
	// variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
	$BulanIndo = array(
		"Januari", "Februari", "Maret",
		"April", "Mei", "Juni",
		"Juli", "Agustus", "September",
		"Oktober", "November", "Desember"
	);

	$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
	$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
	$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring

	$result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
	return ($result);
}

function tglbatas($tgl_terima)
{
	$thn1 = substr($tgl_terima, 10, 4);
	$bln1 = substr($tgl_terima, 5, 2);
	$tgl1 = substr($tgl_terima, 0, 2);
	$date1 = $thn1 . '-' . $bln1 . '-' . $tgl1;

	$adddays = date('Y-m-d', strtotime('+30 days', strtotime($date1)));

	$thn2 = substr($adddays, 0, 4);
	$bln2 = substr($adddays, 5, 2);
	$tgl2 = substr($adddays, 8, 2);

	$tgl_batas = $tgl2 . ' / ' . $bln2 . ' / ' . $thn2;

	return $tgl_batas;
}

//	2020-11-09
function dmY($Ymd)
{
	$newDate = date('d-m-Y', strtotime($Ymd));
	return $newDate;
}

function format_hp($nomorhp)
{
	//Terlebih dahulu kita trim dl
	$nomorhp = trim($nomorhp);
	//bersihkan dari karakter yang tidak perlu
	$nomorhp = strip_tags($nomorhp);
	// Berishkan dari spasi
	$nomorhp = str_replace(" ", "", $nomorhp);
	// kadang ada penulisan no hp (0274) 778787
	$nomorhp = str_replace("(", "", $nomorhp);
	// kadang ada penulisan no hp (0274) 778787
	$nomorhp = str_replace(")", "", $nomorhp);
	// bersihkan dari format yang ada titik seperti 0811.222.333.4
	$nomorhp = str_replace(".", "", $nomorhp);

	//cek apakah mengandung karakter + dan 0-9
	if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
		// cek apakah no hp karakter 1-3 adalah +62
		if (substr(trim($nomorhp), 0, 3) == '+62') {
			$nomorhp = trim($nomorhp);
		}
		// cek apakah no hp karakter 1 adalah 0
		elseif (substr($nomorhp, 0, 1) == '0') {
			$nomorhp = '+62' . substr($nomorhp, 1);
		}
	}
	return $nomorhp;
}

function nama_hari($tanggal)
{
	$day = date('D', strtotime($tanggal));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	$result = $dayList[$day];
	return ($result);
}

function get_first_row($tabel)
{
	$db = db_connect();
	$data = $db->query('select * from ' . $tabel)->getFirstRow('array');
	return ($data);
}
