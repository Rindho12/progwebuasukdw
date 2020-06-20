<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=reservation') ?>" class="btn<?= ($title == 'Reservation') ? ' active' : '' ?>">Reservation</a>
	</div>
	<div class="column col-2">
		<a href="<?= base_url('?c=customer') ?>" class="btn blue"<?= ($title == 'Customer') ? ' active' : '' ?>>Customer</a>
	</div>
</div>
<hr>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=reservation') ?>" class="btn blue"><span class="fa fa-list"></span> List</a>
	</div>
</div>
<hr>
<div id="form">
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=reservation&m=add&i='.$recordReservation->idClass) ?>" enctype="multipart/form-data" class="columns centered padded multiline">
		<div class="column col-6">
			<table class="table no-border">
				<tbody>
					<tr>
						<td>Transportation Code</td>
						<td>:</td>
						<td><?= $recordReservation->codeTransportation ?></td>
					</tr>
					<tr>
						<td>Depart Time</td>
						<td>:</td>
						<td><?= dateIndo($recordReservation->departRoute) ?></td>
					</tr>
					<tr>
						<td>From</td>
						<td>:</td>
						<td><?= $this->getCity($recordReservation->fromRoute)->fetch_object()->nameCity ?></td>
					</tr>
					<tr>
						<td>To</td>
						<td>:</td>
						<td><?= $this->getCity($recordReservation->toRoute)->fetch_object()->nameCity ?></td>
					</tr>
					<tr>
						<td>Seat Class</td>
						<td>:</td>
						<td><?= seatClass($recordReservation->nameClass) ?></td>
					</tr>
					<tr>
						<td>Seat Price</td>
						<td>:</td>
						<td>Rp. <?= number_format($recordReservation->priceClass) ?></td>
					</tr>
					<tr>
						<td>Admin Price</td>
						<td>:</td>
						<td>Rp. 20,000</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="column col-6" id="passenger">
			<h3>Passenger</h3>
			<div id="multiply-form-1">
				<div class="passenger">
					<hr>
					<div class="form-input">
						<label>Identity Number</label>
						<input type="text" name="identity[]" autofocus="autofocus" maxlength="30">
					</div>
					<div class="form-input">
						<label>Full Name</label>
						<input type="text" name="name[]" maxlength="40" required="required">
					</div>
					<div class="form-input">
						<label>Phone</label>
						<input type="text" name="phone[]" maxlength="12">
					</div>
					<div class="form-input">
						<label>Birth</label>
						<input type="date" name="birth[]" required="required">
					</div>
					<div class="form-input">
						<label>Gender</label>
						<select name="gender[]" required="required">
							<option value="f">Female</option>
							<option value="m">Male</option>
						</select>
					</div>
					<div class="form-input">
						<label>Address</label>
						<textarea name="address[]" rows="4"></textarea>
					</div>
				</div>
			</div>
			<div id="multiply-form-2">
			</div>
			<hr>
			<div id="multiply-button" class="columns centered">
				<button class="add column col-3 btn yellow">Add passenger</button>
				<button class="remove column col-3 btn red">Remove passenger</button>
			</div>
			<hr>
		</div>
		<div class="column col-4" id="pricing" style="display: none;">
			<div class="form-input">
				<label>Total Price</label>
				<input type="number" name="priceAll" readonly="readonly">
			</div>
			<div class="form-input">
				<label>Total Pay</label>
				<input type="number" name="payAll">
			</div>
			<div class="form-input">
				<label>Change</label>
				<input type="text" name="change" disabled="disabled">
			</div>
		</div>
		<div class="column col-12 columns centered">
			<button type="submit" name="submit" value="submit" data="<?= $recordReservation->priceClass ?>" class="active column col-2 btn blue" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
