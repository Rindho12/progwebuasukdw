<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=reservation') ?>" class="btn<?= ($title == 'Reservation') ? ' active' : '' ?>">Reservation</a>
	</div>
	<div class="column col-2">
		<a href="<?= base_url('?c=customer') ?>" class="btn blue<?= ($title == 'Customer') ? ' active' : '' ?>">Customer</a>
	</div>
</div>
<hr>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=reservation&m=add') ?>" class="btn blue"><span class="fa fa-plus"></span> Add</a>
	</div>
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="3" data-two="5" data-three="6" placeholder="Search...">
	</div>
</div>
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<table id="table-search" class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Reservation Date</th>
				<th>Code</th>
				<th>Class</th>
				<th>Depart</th>
				<th>Booking Code</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordRoute as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= dateIndo($val['dateReservation']) ?></td>
					<td><?= $val['codeTransportation'] ?></td>
					<td><?= seatClass($val['nameClass']) ?></td>
					<td><?= dateIndo($val['departRoute']) ?></td>
					<td><?= $val['codeReservation'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn blue" href="<?= base_url('?c=reservation&m=detail&i='.$val['idReservation']) ?>"><span class="fa fa-info"></span></a>
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=reservation&m=delete&i='.$val['idReservation']) ?>"><span class="fa fa-trash"></span></a>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
