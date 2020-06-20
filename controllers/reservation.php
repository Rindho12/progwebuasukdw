<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class reservation extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Reservation';
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
					FROM transportation_type AS trty, transportation AS tran, route AS rout, class AS clas, reservation AS rese
					WHERE trty.idType=tran.idType AND tran.idTransportation=rout.idTransportation AND rout.idRoute=clas.idRoute AND clas.idClass=rese.idClass
					ORDER BY trty.idType');

				controller::loadView('_header', $data);
				controller::loadView('reservation_list_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function add()
	{
		$data['title'] = 'Reservation';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			if (isset($_GET['i'])) {
				if (isset($_POST['submit'])) {
					$id = $_GET['i'];
					$dateNow = date('Y-m-d H:i:s');
					$bookCode = randString(6);
					$price = $_POST['priceAll'];
					$number = 0;

					while (controller::select('reservation', ['codeReservation' => $bookCode])->num_rows >= 1) {
						$bookCode = randString(6);
					}
					$check = false;
					foreach ($_POST['name'] as $num => $value) {
						$birth =  $_POST['birth'][$num];
						$number++;
						if (ageCustomer($birth) !== 'Adult') {
							$check = false;
						} else {
							$check = true;
							break;
						}
					}
					if ($check == false) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'No adult in reservation.',
						];
						redirect('?c=reservation');
						exit;
					}

					if (controller::select('class', ['idClass' => $id])->fetch_object()->seatQtyClass < $number) {
						$_SESSION['alert'] = [
							'type' => 'red',
							'value' => 'Seat quantity is not enough.',
						];
						redirect('?c=reservation');
					} else {
						$insert = [
							'idUser' => controller::select('user', ['usernameUser' => $_SESSION['logged_in']['username']])->fetch_object()->idUser,
							'idClass' => $id,
							'dateReservation' => $dateNow,
							'codeReservation' => $bookCode,
							'priceReservation' => $price,
						];
						controller::insert('reservation', $insert);
						$idReservation = controller::insertId();
						foreach ($_POST['name'] as $no => $value) {
							$identity = $_POST['identity'][$no];
							$name = $_POST['name'][$no];
							$phone = $_POST['phone'][$no];
							$birth = $_POST['birth'][$no];
							$gender = $_POST['gender'][$no];
							$address = $_POST['address'][$no];

							$record = controller::select('customer', ['nameCustomer' => $name, 'birthCustomer' => $birth]);
							if ($record->num_rows == 1) {
								$idCustomer = $record->fetch_object()->idCustomer;
								$insert = [
									'idCustomer' => $idCustomer,
									'idReservation' => $idReservation,
								];
							} else {
								$insert = [
									'identityCustomer' => $identity,
									'nameCustomer' => $name,
									'phoneCustomer' => $phone,
									'birthCustomer' => $birth,
									'genderCustomer' => $gender,
									'addressCustomer' => $address,
								];
								controller::insert('customer', $insert);
								$idCustomer = controller::insertId();
								$insert = [
									'idCustomer' => $idCustomer,
									'idReservation' => $idReservation,
								];
							}
							$record = controller::select('seat', ['idCustomer' => $idCustomer, 'idReservation' => $idReservation]);
							if ($record->num_rows == 0) {
								controller::insert('seat', $insert);
							}
						}
						$_SESSION['alert'] = [
							'type' => 'Green',
							'value' => 'Adding Reservation success.',
						];
						redirect('?c=reservation&m=detail&i='.$idReservation);
					}

				} else {
					$id = $_GET['i'];
					$data['recordReservation'] = controller::query('SELECT *
						FROM transportation_type AS trty, transportation AS tran, route AS rout, class AS clas
						WHERE trty.idType=tran.idType AND tran.idTransportation=rout.idTransportation AND rout.idRoute=clas.idRoute
						AND clas.idClass="'.$id.'"')->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('reservation_form_v', $data);
					controller::loadView('_footer', $data);
				}
			} else {
				$data['recordCity'] = controller::select('city');

				controller::loadView('_header', $data);
				controller::loadView('reservation_add_v', $data);
				controller::loadView('_footer', $data);
			}
		}
	}

	public function getRecordRes()
	{
		$depart = $_POST['depart'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$type = $_POST['type'];

		$record = controller::query('SELECT *
			FROM transportation_type AS trty, transportation AS tran, route AS rout, class AS clas
			WHERE trty.idType=tran.idType AND tran.idTransportation=rout.idTransportation AND rout.idRoute=clas.idRoute
			AND rout.departRoute LIKE "'.$depart.'%" AND rout.fromRoute="'.$from.'" AND rout.toRoute="'.$to.'" AND trty.type="'.$type.'"');

		foreach ($record as $no => $val) {
			echo "<tr>
        <td>".($no+1)."</td>
        <td>".$val['nameType']."</td>
        <td>".dateIndo($val['departRoute'])."</td>
        <td>".$this->getCity($val['fromRoute'])->fetch_object()->nameCity."</td>
        <td>".$this->getCity($val['toRoute'])->fetch_object()->nameCity."</td>
				<td>".seatClass($val['nameClass'])."</td>
				<td>@ Rp. ".number_format($val['priceClass'])."</td>
        <td>".$val['seatQtyClass']." seat(s)</td>
        <td><a class=\"btn\" href=\"".base_url('?c=reservation&m=add&i='.$val['idClass'])."\"><span class=\"fa fa-book\"></span></a></td>
      </tr>";
		}
	}

	public function detail($value='')
	{
		$data['title'] = 'Reservation';
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
				redirect('?c=reservation');
			} else {
				$id = $_GET['i'];
				$data['recordReservation'] = controller::query('SELECT *
					FROM transportation_type AS trty, transportation AS tran, route AS rout, class AS clas, reservation AS rese
					WHERE trty.idType=tran.idType AND tran.idTransportation=rout.idTransportation AND rout.idRoute=clas.idRoute AND clas.idClass=rese.idClass AND rese.idReservation="'.$id.'"')->fetch_object();
				$data['fromDepart'] = $this->getCity($data['recordReservation']->fromRoute)->fetch_object();
				$data['toDepart'] = $this->getCity($data['recordReservation']->toRoute)->fetch_object();
				$data['recordPassenger'] = controller::query('SELECT *
					FROM customer AS cust, seat, reservation AS rese
					WHERE seat.idReservation=rese.idReservation AND seat.idCustomer=cust.idCustomer AND rese.idReservation="'.$id.'"');

				controller::loadView('print_style', $data);
				controller::loadView('_header', $data);
				controller::loadView('reservation_detail_v', $data);
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

	public function getCustomer()
	{
		$id = $_POST['id'];
		$record = controller::select('customer', ['identityCustomer' => $id]);
		echo json_encode($record->fetch_object());
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
				redirect('?c=reservation');
			} else {
				$idTransportation = $_GET['i'];
				$where = [
					'idReservation' => $idTransportation,
				];
				controller::deleteRecord('seat', $where);
				controller::deleteRecord('reservation', $where);
				$_SESSION['alert'] = [
					'type' => 'Green',
					'value' => 'Deleting reservation success.',
				];
				redirect('?c=reservation');
			}
		}
	}
}
?>
