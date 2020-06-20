<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class city extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'City';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];

				if (controller::select('city', ['nameCity' => $name])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'City is already exist.',
					];
					redirect('?c=city');
				} else {
					$insert = [
						'nameCity' => $name,
					];
					controller::insert('city', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Adding city success.',
					];
					redirect('?c=city');
				}
			} else {
				$data['recordCity'] = controller::select('city');

				controller::loadView('_header', $data);
				controller::loadView('city_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function edit()
	{
		$data['title'] = 'City';
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
					$name = $_POST['name'];
					$id = $_GET['i'];

					if (controller::select('city', ['nameCity' => $name])->num_rows == 1) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'City with that name is already exist.',
						];
						redirect('?c=city&m=edit&i='.$id);
					} else {
						$insert = [
							'nameCity' => $name,
						];
						controller::update('city', $insert, ['idCity' => $id]);
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Editing city success.',
						];
						redirect('?c=city');
					}
				} else {
					$id = $_GET['i'];
					$data['recordCity'] = controller::select('city', ['idCity' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('city_edit_v', $data);
					controller::loadView('_footer', $data);
				}
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
				redirect('?c=city');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'idCity' => $idTransportation,
				];
				controller::deleteRecord('city', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting city success.',
				];
				redirect('?c=city');
			}
		}
	}
}
?>
