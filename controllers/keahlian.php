<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class keahlian extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Keahlian';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$presentase = $_POST['presentase'];

				if (controller::select('anggota_keahlian', ['nama_keahlian' => $nama])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Keahlian sudah ada.',
					];
					redirect('?c=keahlian');
				} else {
					$insert = [
						'id_anggota' => $_SESSION['logged_in']['id'],
						'nama_keahlian' => $nama,
						'persentase_keahlian' => $presentase,
					];
					controller::insert('anggota_keahlian', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Keahlian berhasil ditambahkan.',
					];
					redirect('?c=keahlian');
				}
			} else {
				$data['recordKeahlian'] = controller::select('anggota_keahlian', ['id_anggota' => $_SESSION['logged_in']['id']]);

				controller::loadView('_header', $data);
				controller::loadView('keahlian_v', $data);
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
				redirect('?c=keahlian');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'id_ak' => $idTransportation,
				];
				controller::deleteRecord('anggota_keahlian', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Menghapus Keahlian berhasil.',
				];
				redirect('?c=keahlian');
			}
		}
	}
}
?>
