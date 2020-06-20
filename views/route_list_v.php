<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=route') ?>" class="btn<?= ($title == 'Route') ? ' active' : '' ?>">Route</a>
	</div>
	<div class="column col-2">
		<a href="<?= base_url('?c=city') ?>" class="btn blue<?= ($title == 'City') ? ' active' : '' ?>">City</a>
	</div>
</div>
<hr>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Add</a>
	</div>
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="2" data-two="3" data-three="4" data-four="5" data-five="6" data-six="7" placeholder="Search...">
	</div>
</div>
<div id="list">
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<table id="table-search" class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Airline</th>
				<th>Code</th>
				<th>Depart</th>
				<th>From</th>
				<th>To</th>
				<th>Class</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordRoute as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['nameType'] ?></td>
					<td><?= $val['codeTransportation'] ?></td>
					<td><?= dateIndo($val['departRoute']) ?></td>
					<td><?= $this->getCity($val['fromRoute'])->fetch_object()->nameCity ?></td>
					<td><?= $this->getCity($val['toRoute'])->fetch_object()->nameCity ?></td>
					<td>
						<ul>
							<?php foreach ($this->getClass($val['idRoute']) as $no2 => $val2): ?>
								<li><?= seatClass($val2['nameClass']).' @ '.$val2['priceClass'].' for '.$val2['seatQtyClass'].' seat(s).' ?></li>
							<?php endforeach ?>
						</ul>
					</td>
					<td>
						<a class="btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=route&m=delete&i='.$val['idRoute']) ?>"><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<div id="form" style="display:none;">
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" class="columns multiline padded centered" action="<?= base_url('?c=route') ?>" enctype="multipart/form-data">
		<div class="column col-6">
			<div class="form-input">
				<label>Transportation</label>
				<select name="trans" required="required">
					<?php foreach ($recordTransportation as $no => $val): ?>
						<option value="<?= $val['idTransportation'] ?>"><?= $val['nameType'].' | '.$val['codeTransportation'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-input">
				<label>Departure</label>
				<select name="departure" required="required">
					<?php foreach ($recordCity as $no => $val): ?>
						<option value="<?= $val['idCity'] ?>"><?= $val['nameCity'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-input">
				<label>Destination</label>
				<select name="destination" required="required">
					<?php foreach ($recordCity as $no => $val): ?>
						<option value="<?= $val['idCity'] ?>"><?= $val['nameCity'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-input">
				<label>Date</label>
				<input type="date" name="date" required="required">
			</div>
			<div class="form-input">
				<label>Time</label>
				<input type="time" name="time" required="required">
			</div>
		</div>
		<div class="column col-6">
			<div id="multiply-form-1">
				<div>
					<hr>
					<div class="form-input">
						<label>Seat Class</label>
						<select name="class[]">
							<option value="f">First Class</option>
							<option value="b">Business Class</option>
							<option value="e">Economy Class</option>
						</select>
					</div>
					<div class="form-input">
						<label>Seat Quantity</label>
						<input type="number" name="qty[]" required="required">
					</div>
					<div class="form-input">
						<label>Seat Price</label>
						<input type="number" name="price[]" required="required">
					</div>
				</div>
			</div>
			<div id="multiply-form-2">
			</div>
			<hr>
			<div id="multiply-button" class="columns centered">
				<button class="add column btn yellow col-3">Add seat type</button>
				<button class="remove column btn red col-3">Remove seat type</button>
			</div>
			<hr>
		</div>
		<div class="column col-3 columns">
			<button class="btn blue column" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
