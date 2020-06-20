<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="<?= base_url('?c=transportation') ?>" class="btn<?= ($title == 'Transportation') ? ' active' : '' ?>">Transportation</a>
	</div>
	<div class="column col-2">
		<a href="<?= base_url('?c=type') ?>" class="btn blue<?= ($title == 'Transportation Type') ? ' active' : '' ?>">Transportation Type</a>
	</div>
</div>
<hr>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Add</a>
	</div>
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="2" data-one="3" placeholder="Search...">
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
				<th>Type</th>
				<th>Airline</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordType as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= transportationType($val['type']) ?></td>
					<td><?= $val['nameType'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn" href="<?= base_url('?c=type&m=edit&i='.$val['idType']) ?>"><span class="fa fa-pencil"></span></a>
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=type&m=delete&i='.$val['idType']) ?>"><span class="fa fa-trash"></span></a>
						</div>
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
	<form method="post" action="<?= base_url('?c=type') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Type</label>
			<select name="type" required="required">
				<option value="a">Airplane</option>
				<option value="t">Train</option>
			</select>
		</div>
		<div class="form-input">
			<label>Airline Name</label>
			<input type="text" name="name" placeholder="..." maxlength="30" required="required">
		</div>
		<div class="columns centered">
			<button type="submit" class="column col-3 btn blue" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
