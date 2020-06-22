<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class pengalaman extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Pengalaman';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$dari = $_POST['dari'];
				$sampai = $_POST['sampai'];
				$tempat = $_POST['tempat'];
				$deskripsi = $_POST['deskripsi'];

				if (controller::select('anggota_pengalaman', ['nama_pengalaman' => $nama])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Pengalaman sudah ada.',
					];
					redirect('?c=pengalaman');
				} else {
					$insert = [
						'id_anggota' => $_SESSION['logged_in']['id'],
						'nama_keahlian' => $nama,
						'dari_tahun_keahlian' => $dari,
						'sampai_tahun_keahlian' => $sampai,
						'tempat_keahlian' => $tempat,
						'teks_keahlian' => $deskripsi,
					];
					controller::insert('anggota_keahlian', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Pengalaman berhasil ditambahkan.',
					];
					redirect('?c=pengalaman');
				}
			} else {
				$data['recordPengalaman'] = controller::select('anggota_pengalaman', ['id_anggota' => $_SESSION['logged_in']['id']]);

				controller::loadView('_header', $data);
				controller::loadView('pengalaman_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function delete($value='')
	{
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (!isset($_GET['i'])) {
				$_SESSION['alert'] = [
					'type' => 'red',
					'value' => 'No direct access.',
				];
				redirect('?c=pengalaman');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'id_ap' => $idTransportation,
				];
				controller::deleteRecord('anggota_pengalaman', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Menghapus Pengalaman berhasil.',
				];
				redirect('?c=pengalaman');
			}
		}
	}
}
?>
