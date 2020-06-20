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
</div>
<hr class="print-none">
<div class="columns print-none">
	<!-- <div class="column col-2">
		<a onclick="window.print()" class="btn"><span class="fa fa-print"></span> Print</a>
	</div> -->
	<!-- <div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Add</a>
	</div> -->
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="2" data-two="3" placeholder="Search...">
	</div>
</div>
<div id="list">
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<table id="table-search" class="table 9pt">
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
				<th class="print-none"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordCustomer as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['identityCustomer'] ?></td>
          <td><?= $val['nameCustomer'] ?></td>
          <td><?= $val['addressCustomer'] ?></td>
          <td><?= $val['phoneCustomer'] ?></td>
          <td><?= genderCustomer($val['genderCustomer']) ?></td>
					<td><?= dateIndo($val['birthCustomer']) ?></td>
					<td><?= $this->getCount($val['idCustomer'])->count ?> time(s)</td>
					<td class="print-none">
						<a class="btn" href="<?= base_url('?c=customer&m=edit&i='.$val['idCustomer']) ?>"><span class="fa fa-pencil"></span></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
