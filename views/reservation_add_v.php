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
		<a href="<?= base_url('?c=reservation') ?>" class="btn blue"><span class="fa fa-list"></span> List</a>
	</div>
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="2" data-one="3" data-one="6" placeholder="Search...">
	</div>
</div>
<hr>
<div class="columns">
  <form id="form-ajax-reservation" class="column col-4">
		<div class="form-input">
			<label>Depart date</label>
			<input type="date" name="depart" required="required">
		</div>
    <div class="form-input">
			<label>From</label>
			<select name="from">
        <?php foreach ($recordCity as $no => $val): ?>
          <option value="<?= $val['idCity'] ?>"><?= $val['nameCity'] ?></option>
        <?php endforeach; ?>
			</select>
		</div>
    <div class="form-input">
			<label>To</label>
			<select name="to">
        <?php foreach ($recordCity as $no => $val): ?>
          <option value="<?= $val['idCity'] ?>"><?= $val['nameCity'] ?></option>
        <?php endforeach; ?>
			</select>
		</div>
    <div class="form-input">
			<label>Type</label>
			<select name="type">
        <option value="a">Airplane</option>
        <option value="t">Train</option>
			</select>
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" name="submit">Submit</button>
		</div>
  </form>
</div>
<div>
	<table id="table-search" class="table">
		<thead>
			<tr>
				<th>#</th>
        <th>Airline</th>
				<th>Depart</th>
				<th>From</th>
				<th>To</th>
				<th>Class</th>
				<th>Price</th>
				<th>Seat(s) left</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
  <div id="loading" style="display: none;">
    <h1 class="text-center" style="font-size: 40px;color: rgba(13, 37, 218, 1); margin: 20px 0;"><span class="fa fa-spinner fa-pulse"></span></h1>
  </div>
</div>
