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
		<input type="text" id="input-search" data-one="2" placeholder="Search...">
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
				<th>Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordCity as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['nameCity'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn" href="<?= base_url('?c=city&m=edit&i='.$val['idCity']) ?>"><span class="fa fa-pencil"></span></a>
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=city&m=delete&i='.$val['idCity']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=city') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>City Name</label>
			<input type="text" name="name" maxlength="30" required="required">
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
