<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class home extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Home';
		if (isset($_POST['submit'])) {
			$fname = $_POST['name'];
			$lname = $_POST['last'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$pesan = $_POST['message'];

			$insert = [
				'nama_depan_pesan' => $fname,
				'nama_belakang_pesan' => $lname,
				'email_pesan' => $email,
				'subjek_pesan' => $subject,
				'isi_pesan' => $pesan,
			];
			controller::insert('pesan', $insert);
			$_SESSION['alert'] = [
				'type' => 'Green',
				'value' => 'tambah pesan success.',
			];
			redirect('?c=home');
		} else {
			$data['recordGaleri'] = controller::select('galeri');
			$data['recordFotoBiodata'] = controller::select('biodata', ['tipe_biodata' => 'foto']);
			$data['recordBiodata'] = controller::query('SELECT * FROM biodata WHERE NOT tipe_biodata="foto"');
			$data['recordAnggota'] = controller::select('anggota');
			$data['recordPengalaman'] = controller::query('SELECT * FROM anggota_pengalaman AS ap, anggota AS an WHERE ap.id_anggota=an.id_anggota ORDER BY ap.sampai_tahun_pengalaman');
			$data['recordKontak'] = controller::select('kontak')->fetch_object();
			$data['recordSosial'] = controller::select('anggota_sosial');
			controller::loadView('home_v', $data);
		}
	}		
}
?>
