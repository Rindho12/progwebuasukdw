<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class kontak extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Kontak';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
            if (isset($_POST['submit'])) {
                $teks = $_POST['teks'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $email = $_POST['email'];
                $insert = [
                    'teks_kontak' => $teks,
                    'alamat_kontak' => $alamat,
                    'nomor_kontak' => $telepon,
                    'email_kontak' => $email,
                ];
                controller::update('kontak', $insert, ['id_kontak' => '1']);
                $_SESSION['alert'] = [
                    'type' => 'Green',
                    'value' => 'Mengubah kontak berhasil.',
                ];
                redirect('?c=kontak');
            } else {
                $data['recordKontak'] = controller::select('kontak', ['id_kontak' => '1'])->fetch_object();

                controller::loadView('_header', $data);
                controller::loadView('kontak_v', $data);
                controller::loadView('_footer', $data);
            }
		}
	}
}
?>
