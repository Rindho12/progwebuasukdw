<?php
defined('PATH') or exit('No direct script.');
/**
* 
*/
class users extends controller
{
	
	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Users';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$name = $_POST['name'];
				$pass1 = $_POST['pass1'];
				$pass2 = $_POST['pass2'];
				$level = $_POST['level'];
				if ($pass1 !== $pass2) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Confirm password wrong.',
					];
					redirect('?c=type');
				} else {
					if (controller::select('user', ['usernameUser' => $username])->num_rows == 1) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'User already exist.',
						];
						redirect('?c=users');
					} else {
						$insert = [
							'usernameUser' => $username,
							'passwordUser' => sha1($pass1),
							'fullNameUser' => $name,
							'levelUser' => $level,
						];
						controller::insert('user', $insert);
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Adding user success.',
						];
						redirect('?c=users');
					}
				}

			} else {
				$data['recordUser'] = controller::query('SELECT * FROM user WHERE NOT levelUser="0"');

				controller::loadView('_header', $data);
				controller::loadView('users_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function edit()
	{
		$data['title'] = 'Users';
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
				redirect('?c=users');
			} else {
				if (isset($_POST['submit'])) {
					$username = $_POST['username'];
					$username1 = $_POST['username1'];
					$name = $_POST['name'];
					$level = $_POST['level'];
					$id = $_GET['i'];

					if ($username !== $username1) {
						if (controller::select('user', ['usernameUser' => $username])->num_rows == 1) {
							$_SESSION['alert'] = [
								'type' => 'red',
								'value' => 'Username is already exist.',
							];
							redirect('?c=users&m=edit&i='.$id);
						}
					}
					if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
						$pass1 = $_POST['pass1'];
						$pass2 = $_POST['pass2'];
						if ($pass1 !== $pass2) {
							$_SESSION['alert'] = [
								'type' => 'red',
								'value' => 'Confirm password wrong.',
							];
							redirect('?c=users&m=edit&i='.$id);
						} else {
							$insert = [
								'usernameUser' => $username,
								'fullNameUser' => $name,
								'levelUser' => $level,
								'passwordUser' => sha1($pass1),
							];
						}
					} else {
						$insert = [
							'usernameUser' => $username,
							'fullNameUser' => $name,
							'levelUser' => $level,
						];
					}
					controller::update('user', $insert, ['idUser' => $id]);

					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Editing user success.',
					];
					redirect('?c=users');

				} else {
					$id = $_GET['i'];
					$data['recordUser'] = controller::select('user', ['idUser' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('users_edit_v', $data);
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
				redirect('?c=users');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'idUser' => $idTransportation,
				];
				controller::deleteRecord('user', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting type success.',
				];
				redirect('?c=users');
			}
		}
	}
}
?>