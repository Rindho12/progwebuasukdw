<?php
defined('PATH') or exit('No direct script.');
/**
* 
*/
class transportation extends controller
{
	
	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Transportation';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$idType = $_POST['type'];
				$code = $_POST['code'];

				if (controller::select('transportation', ['codeTransportation' => $code])->num_rows == 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Transportation with that code is already exist.',
					];
					redirect('?c=transportation');
				} else {
					$insert = [
						'idType' => $idType,
						'codeTransportation' => $code,
					];
					controller::insert('transportation', $insert);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Adding transportation success.',
					];
					redirect('?c=transportation');
				}
			} else {
				$data['recordTransportation'] = controller::query('SELECT *
					FROM transportation AS tran, transportation_type AS trty
					WHERE tran.idType=trty.idType
					ORDER BY trty.idType');
				$data['recordType'] = controller::select('transportation_type');

				controller::loadView('_header', $data);
				controller::loadView('transportation_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function edit()
	{
		$data['title'] = 'Transportation';
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
				redirect('?c=transportation');
			} else {
				if (isset($_POST['submit'])) {
					$idType = $_POST['type'];
					$code = $_POST['code'];
					$id = $_GET['i'];

					if (controller::select('transportation', ['codeTransportation' => $code])->num_rows == 1) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'Transportation with that code is already exist.',
						];
						redirect('?c=transportation&m=edit&i='.$id);
					} else {
						$insert = [
							'idType' => $idType,
							'codeTransportation' => $code,
						];
						controller::update('transportation', $insert, ['idTransportation' => $id]);
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Editing transportation success.',
						];
						redirect('?c=transportation');
					}
				} else {
					$id = $_GET['i'];
					$data['recordType'] = controller::select('transportation_type');
					$data['recordTransportation'] = controller::select('transportation', ['idTransportation' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('transportation_edit_v', $data);
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
				redirect('?c=transportation');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'idTransportation' => $idTransportation,
				];
				controller::deleteRecord('transportation', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting transportation success.',
				];
				redirect('?c=transportation');
			}
		}
	}
}
?>