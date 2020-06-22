<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class biodata extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Biodata';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$tipe = $_POST['tipe'];
				$insert = [
					'tipe_biodata' => $tipe,
				];
				controller::insert('biodata', $insert);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Tambah biodata berhasil.',
				];
				redirect('?c=biodata');
			} else {
				$data['recordBiodata'] = controller::select('biodata');

				controller::loadView('_header', $data);
				controller::loadView('biodata_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function edit()
	{
		$data['title'] = 'Biodata';
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
				redirect('?c=city');
			} else {
				if (isset($_POST['submit'])) {
					$tipe = $_POST['tipe'];
					$id = $_GET['i'];
					if($tipe == 'judul') {
						$judul = $_POST['judul'];
						$isi = $_POST['isi'];
						$insert = [
							'judul_biodata' => $judul,
							'isi_biodata' => $isi,
						];
					} elseif ($tipe == 'foto') {
						$target_dir = "./uploads/";
						$target_file = $target_dir . basename($_FILES["isi"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
							$_SESSION['alert'] = [
								'type' => 'Red',
								'value' => 'Ekstensi upload file gagal.',
							];
							redirect('?c=biodata');
						}

						if (move_uploaded_file($_FILES["isi"]["tmp_name"], $target_file)) {
							$insert = [
								'isi_biodata' => $_FILES["isi"]["name"],
							];
						} else {
							$_SESSION['alert'] = [
								'type' => 'Red',
								'value' => 'Upload file gagal.',
							];
							redirect('?c=biodata');
						}
					} elseif($tipe == 'panjang') {
						$isi = $_POST['isi'];
						$insert = [
							'isi_biodata' => $isi,
						];
					} elseif($tipe == 'pendek') {
						$judul = $_POST['judul'];
						$isi = $_POST['isi'];
						$insert = [
							'judul_biodata' => $judul,
							'isi_biodata' => $isi,
						];
					}
					controller::update('biodata', $insert, ['id_biodata' => $id]);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Edit biodata berhasil.',
					];
					redirect('?c=biodata');
				} else {
					$id = $_GET['i'];
					$data['record_biodata'] = controller::select('biodata', ['id_biodata' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('biodata_edit_v', $data);
					controller::loadView('_footer', $data);
				}
			}
		}
	}
}
?>
