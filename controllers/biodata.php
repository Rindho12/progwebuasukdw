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

			controller::loadView('_header', $data);
			controller::loadView('biodata_v', $data);
			controller::loadView('_footer', $data);
		}
	}
}
?>
