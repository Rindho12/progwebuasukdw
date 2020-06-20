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
			controller::loadView('home_v', $data);
		}
	}
}
?>
