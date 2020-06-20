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
			// $data['recordTransportation'] = controller::query('SELECT COUNT(idTransportation) AS ctran FROM transportation')->fetch_object()->ctran;
			// $data['recordType'] = controller::query('SELECT COUNT(idType) AS ctran FROM transportation_type')->fetch_object()->ctran;
			// $data['recordReservation'] = controller::query('SELECT COUNT(idReservation) AS ctran FROM reservation')->fetch_object()->ctran;
			// $data['recordCustomer'] = controller::query('SELECT COUNT(idCustomer) AS ctran FROM customer')->fetch_object()->ctran;
			// $data['recordRoute'] = controller::query('SELECT COUNT(idRoute) AS ctran FROM route')->fetch_object()->ctran;
			// $data['recordCity'] = controller::query('SELECT COUNT(idCity) AS ctran FROM city')->fetch_object()->ctran;
			// $data['recordStaff'] = controller::query('SELECT COUNT(idUser) AS ctran FROM user')->fetch_object()->ctran;
			controller::loadView('_header', $data);
			controller::loadView('dashboard_v', $data);
			controller::loadView('_footer', $data);
		}
	}
}
?>
