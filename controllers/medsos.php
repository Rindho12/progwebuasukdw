<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class medsos extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Medsos';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$nama = $_POST['nama'];
				$url = $_POST['url'];

				if (controller::select('anggota_sosial', ['nama_sosial' => $nama])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Media sosial sudah ada.',
					];
					redirect('?c=medsos');
				} else {
					$insert = [
						'id_anggota' => $_SESSION['logged_in']['id'],
						'nama_sosial' => $nama,
						'url_sosial' => $url,
					];
					controller::insert('anggota_sosial', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Media sosial berhasil ditambahkan.',
					];
					redirect('?c=medsos');
				}
			} else {
				$data['recordMedsos'] = controller::select('anggota_sosial', ['id_anggota' => $_SESSION['logged_in']['id']]);

				controller::loadView('_header', $data);
				controller::loadView('medsos_v', $data);
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
				redirect('?c=medsos');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'id_as' => $idTransportation,
				];
				controller::deleteRecord('anggota_sosial', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Menghapus Media sosial berhasil.',
				];
				redirect('?c=medsos');
			}
		}
	}
}
?>
