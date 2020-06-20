<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class route extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Route';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_POST['submit'])) {
				$trans = $_POST['trans'];
				$departure = $_POST['departure'];
				$destination = $_POST['destination'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				$datetime = $date.' '.$time.':00';

				if ($departure == $destination) {
					$_SESSION['alert'] = [
						'type' => 'red',
						'value' => 'Route cannot exist.',
					];
					redirect('?c=route');
				} else {
					if (controller::select('route', ['idTransportation' => $trans, 'departRoute' => $datetime])->num_rows == 1) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'Route already exist.',
						];
						redirect('?c=route');
					} else {
						$insert = [
							'idTransportation' => $trans,
							'departRoute' => $datetime,
							'fromRoute' => $departure,
							'toRoute' => $destination,
						];
						controller::insert('route', $insert);
						$idRoute = controller::insertId();
						foreach ($_POST['class'] as $no => $value) {
							$class = $_POST['class'][$no];
							$qty = $_POST['qty'][$no];
							$price = $_POST['price'][$no];

							$record = controller::select('class', ['idRoute' => $idRoute, 'nameClass' => $class, 'priceClass' => $price]);
							if ($record->num_rows == 1) {
								controller::update('class', ['seatQtyClass' => ($record->fetch_object()->seatQtyClass+$qty)], ['idClass' => $record->fetch_object()->idClass]);
							} else {
								$insert = [
									'idRoute' => $idRoute,
									'nameClass' => $class,
									'priceClass' => $price,
									'seatQtyClass' => $qty,
								];
								controller::insert('class', $insert);
							}
						}
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Adding route success.',
						];
						redirect('?c=route');
					}
				}

			} else {
				$data['recordRoute'] = controller::query('SELECT *
					FROM transportation_type AS trty, transportation AS tran, route AS rout
					WHERE trty.idType=tran.idType AND tran.idTransportation=rout.idTransportation
					ORDER BY trty.idType');
				$data['recordTransportation'] = controller::query('SELECT *
					FROM transportation AS tran, transportation_type AS trty
					WHERE tran.idType=trty.idType
					ORDER BY trty.idType');
				$data['recordCity'] = controller::select('city');

				controller::loadView('_header', $data);
				controller::loadView('route_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function getCity($value='')
	{
		$record = controller::select('city', ['idCity' => $value]);
		return $record;
	}

	public function getClass($value='')
	{
		$record = controller::select('class', ['idRoute' => $value]);
		return $record;
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
					'idRoute' => $idTransportation,
				];
				controller::deleteRecord('route', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting transportation success.',
				];
				redirect('?c=route');
			}
		}
	}
}
?>
