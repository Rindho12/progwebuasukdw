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
		
		controller::loadView('home_v', $data);
	}
}
?>
