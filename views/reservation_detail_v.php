<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns print-none">
	<div class="column col-2">
		<a href="<?= base_url('?c=reservation') ?>" class="btn<?= ($title == 'Reservation') ? ' active' : '' ?>">Reservation</a>
	</div>
	<div class="column col-2">
		<a href="<?= base_url('?c=customer') ?>" class="btn blue<?= ($title == 'Customer') ? ' active' : '' ?>">Customer</a>
	</div>
	<div class="column col-2" id="reservation-print">
		<a onclick="window.print()" class="btn yellow"><span class="fa fa-print"></span> Print</a>
	</div>
</div>
<hr class="print-none">
<div>
	<?php if (isset($_SESSION['alert'])): ?>
		<mark class="print-none <?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
	<?php unset($_SESSION['alert']); endif; ?>
</div>
<div class="columns multiline border-bottom">
	<div class="column col-12 print-show border-bottom">
		<div class="columns">
			<h2 class="text-primary-color margin-bottom column col-6">E-Ticket</h2>
			<h2 class="text-primary-color margin-bottom column col-6" style="text-align: right;"><span class="fa fa-money"></span> Ticketing</h2>
		</div>
		<hr class="print-none">
	</div>
	<table class="column col-8 9pt table no-border margin-top margin-bottom">
		<tbody>
			<tr>
				<td>Book Date</td>
				<td>:</td>
				<td><?= explode(', ',dateIndo($recordReservation->dateReservation))[0] ?></td>
			</tr>
			<tr>
				<td>Book Time</td>
				<td>:</td>
				<td><?= explode(', ',dateIndo($recordReservation->dateReservation))[1] ?></td>
			</tr>
			<tr>
				<td>Airline</td>
				<td>:</td>
				<td><?= $recordReservation->nameType ?></td>
			</tr>
			<tr>
				<td>TransCode</td>
				<td>:</td>
				<td><?= $recordReservation->codeTransportation ?></td>
			</tr>
			<tr>
				<td>Depart Date</td>
				<td>:</td>
				<td><?= explode(', ',dateIndo($recordReservation->departRoute))[0] ?></td>
			</tr>
			<tr>
				<td>Depart Time</td>
				<td>:</td>
				<td><?= explode(', ',dateIndo($recordReservation->departRoute))[1] ?></td>
			</tr>
			<tr>
				<td>Board at</td>
				<td>:</td>
				<td><?= $fromDepart->nameCity ?></td>
			</tr>
			<tr>
				<td>Arrive at</td>
				<td>:</td>
				<td><?= $toDepart->nameCity ?></td>
			</tr>
			<tr>
				<td>Seat Class</td>
				<td>:</td>
				<td><?= seatClass($recordReservation->nameClass) ?></td>
			</tr>
		</tbody>
	</table>
	<div class="column col-4 columns multiline middled">
		<h1 class="column text-primary-color text-center"><?= $recordReservation->codeReservation ?></h1>
		<p class="column text-center text-color-grey">Booking Code</p>
	</div>
</div>
<hr class="print-none">
<div class="border-bottom">
	<h2 class="text-primary-color margin-top">Passenger</h2>
	<hr class="print-none">
	<table class="table margin-top margin-bottom">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
			</tr>
		</thead>
		<tbody>
		<?php $num=1; foreach ($recordPassenger as $no => $val): ?>
			<tr>
				<td><?= $num ?></td>
				<td><?= $val['nameCustomer'] ?></td>
				<td><?= ageCustomer($val['birthCustomer']) ?></td>
				<td><?= genderCustomer($val['genderCustomer']) ?></td>
			</tr>
			<?php if ($val['babyName'] !== NULL): $num++; ?>
				<tr>
					<td><?= $num ?></td>
					<td><?= $val['babyName'] ?></td>
					<td>Infant</td>
					<td></td>
				</tr>
			<?php endif; ?>
		<?php $num++; endforeach ?>
		</tbody>
	</table>
</div>
