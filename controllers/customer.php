<?php
defined('PATH') or exit('No direct script.');
/**
*
*/
class customer extends controller
{

	public function __construct()
	{
		controller::__construct();
	}

	public function index()
	{
		$data['title'] = 'Customer';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			$data['recordCustomer'] = controller::select('customer');

			controller::loadView('print_style', $data);
			controller::loadView('_header', $data);
			controller::loadView('customer_list_v', $data);
			controller::loadView('_footer', $data);
		}
	}

	public function export()
	{
		$data['title'] = 'Customer';
		if (!isset($_SESSION['logged_in'])) {
			$_SESSION['alert'] = [
				'type' => 'red',
				'value' => 'No direct access.',
			];
			redirect();
		} else {
			$recordCustomer = controller::select('customer');

			header('Data-Type:application/vnd.ms-excel');
			header('Data-Disposition:attachment;Filename:"lol.xls"');

			echo "<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Identity</th>
		        <th>Name</th>
		        <th>Address</th>
		        <th>Phone</th>
		        <th>Gender</th>
						<th>Birth</th>
						<th>Reservation</th>
					</tr>
				</thead>
				<tbody>";
				foreach ($recordCustomer as $no => $val):
						echo "<tr>
							<td>".($no+1)."</td>
							<td>".$val['identityCustomer']."</td>
		          <td>".$val['nameCustomer']."</td>
		          <td>".$val['addressCustomer']."</td>
		          <td>".$val['phoneCustomer']."</td>
		          <td>".genderCustomer($val['genderCustomer'])."</td>
							<td>".dateIndo($val['birthCustomer'])."</td>
							<td>".$this->getCount($val['idCustomer'])->count." time(s)</td>
						</tr>";
				endforeach;
				echo "</tbody>
			</table>";
		}
	}

	public function getCount($value='')
	{
		$count = controller::query('SELECT COUNT(idSeat) AS count FROM seat WHERE idCustomer="'.$value.'"')->fetch_object();
		return $count;
	}

	public function edit()
	{
		$data['title'] = 'Customer';
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
				redirect('?c=customer');
			} else {
				if (isset($_POST['submit'])) {
					$identity = $_POST['identity'];
					$name = $_POST['name'];
					$name1 = $_POST['name1'];
					$phone = $_POST['phone'];
					$birth = $_POST['birth'];
					$birth1 = $_POST['birth1'];
					$gender = $_POST['gender'];
					$address = $_POST['address'];
					$id = $_GET['i'];

					if ($name !== $name1 || $birth !== $birth1) {
						if (controller::select('customer', ['nameCustomer' => $name, 'birthCustomer' => $birth])->num_rows == 1) {
							$_SESSION['alert'] = [
								'type' => 'red',
								'value' => 'Customer already exist.',
							];
							redirect('?c=customer&m=edit&i='.$id);
						}
					}
					$insert = [
						'identityCustomer' => $identity,
						'nameCustomer' => $name,
						'phoneCustomer' => $phone,
						'birthCustomer' => $birth,
						'genderCustomer' => $gender,
						'addressCustomer' => $address,
					];
					controller::update('customer', $insert, ['idCustomer' => $id]);
					$_SESSION['alert'] = [
						'type' => 'Green',
						'value' => 'Editing customer success.',
					];
					redirect('?c=customer');
				} else {
					$id = $_GET['i'];
					$data['recordCustomer'] = controller::select('customer', ['idCustomer' => $id])->fetch_object();

					controller::loadView('_header', $data);
					controller::loadView('customer_edit_v', $data);
					controller::loadView('_footer', $data);
				}
			}
		}
	}
}
?>
