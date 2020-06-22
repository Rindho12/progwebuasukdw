<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class dashboard extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			$data['jmlhPesan'] = controller::query("SELECT * FROM pesan")->num_rows;
			$data['jmlhGaleri'] = controller::query("SELECT * FROM galeri")->num_rows;
			controller::loadView('_header', $data);
			controller::loadView('dashboard_v', $data);
			controller::loadView('_footer', $data);
		}
	}
}
?>
