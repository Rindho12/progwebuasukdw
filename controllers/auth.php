<?php 
defined('PATH') or exit('No direct script.');
/**
* 
*/
class auth extends controller
{
	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Login';
		if (isset($_SESSION['logged_in'])) {
			redirect('?c=dashboard');
		} else {
			if (isset($_POST['submit'])) {
				$nim = $_POST['nim'];
				$password = $_POST['password'];

				$where = [
					'nim_anggota' => $nim,
					'password_anggota' => sha1($password),
				];
				$record = controller::select('anggota', $where);
				if ($record->num_rows !== 1) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'NIM atau password salah.',
					];
					redirect();
				} else {
					$record = $record->fetch_object();
					$_SESSION['logged_in'] = [
						'id' => $record->id_anggota,
						'nim' => $record->nim_anggota,
						'nama' => $record->nama_anggota,
					];

					redirect('?c=dashboard');
				}
			} else {
				controller::loadView('login_v', $data);
			}
		}
	}

	public function logout()
	{
		unset($_SESSION['logged_in']);
		session_destroy();
		redirect();
	}
}
?>