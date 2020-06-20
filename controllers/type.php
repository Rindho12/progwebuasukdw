<?php
defined('PATH') or exit('No direct script.');
/**
* 
*/
class type extends controller
{
	
	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Transportation Type';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$type = $_POST['type'];
				$name = $_POST['name'];

				if (controller::select('transportation_type', ['type' => $type, 'nameType' => $name])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Type is already exist.',
					];
					redirect('?c=type');
				} else {
					$insert = [
						'type' => $type,
						'nameType' => $name,
					];
					controller::insert('transportation_type', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Adding type success.',
					];
					redirect('?c=type');
				}
			} else {
				$data['recordType'] = controller::select('transportation_type');

				controller::loadView('_header', $data);
				controller::loadView('type_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	// public function add()
	// {
	// 	$data['title'] = 'Transportation Type';
	// 	if (!isset($_SESSION['logged_in'])) {
	// 		$_SESSION['alert'] = [
	// 			'type' => 'red',
	// 			'value' => 'No direct access.',
	// 		];
	// 		redirect();
	// 	} else {
	// 		if (isset($_POST['submit'])) {
	// 			$type = $_POST['type'];
	// 			$name = $_POST['name'];

	// 			if (controller::select('transportation_type', ['type' => $type, 'nameType' => $name])->num_rows == 1) {
	// 				$_SESSION['alert'] = [
	// 					'type' => 'red',
	// 					'value' => 'Type is already exist.',
	// 				];
	// 				redirect('?c=type&m=add');
	// 			} else {
	// 				$insert = [
	// 					'type' => $type,
	// 					'nameType' => $name,
	// 				];
	// 				controller::insert('transportation_type', $insert);
	// 				$_SESSION['alert'] = [
	// 					'type' => 'Green',
	// 					'value' => 'Adding type success.',
	// 				];
	// 				redirect('?c=type');
	// 			}
	// 		} else {
	// 			controller::loadView('_header', $data);
	// 			controller::loadView('type_add_v', $data);
	// 			controller::loadView('_footer', $data);
	// 		}
	// 	}
	// }

	public function edit()
	{
		$data['title'] = 'Transportation Type';
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
				redirect('?c=type');
			} else {
				if (isset($_POST['submit'])) {
					$type = $_POST['type'];
					$name = $_POST['name'];
					$id = $_GET['i'];

					if (controller::select('transportation_type', ['type' => $type, 'nameType' => $name])->num_rows == 1) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'Type with that name is already exist.',
						];
						redirect('?c=type&m=edit&i='.$id);
					} else {
						$insert = [
							'type' => $type,
							'nameType' => $name,
						];
						controller::update('transportation_type', $insert, ['idType' => $id]);
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Editing type success.',
						];
						redirect('?c=type');
					}
				} else {
					$id = $_GET['i'];
					$data['recordType'] = controller::select('transportation_type', ['idType' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('type_edit_v', $data);
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
				redirect('?c=type');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'idType' => $idTransportation,
				];
				controller::deleteRecord('transportation_type', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting type success.',
				];
				redirect('?c=type');
			}
		}
	}
}
?>