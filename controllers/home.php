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
		if (isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect("?c=dashboard");
		} else {
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

				controller::loadView('home_v', $data);
			}
		}
		}
	}
?>
