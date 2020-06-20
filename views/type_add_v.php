<?php
defined('PATH') or exit('No direct script.');
?>
<div>
	<div>
		<a href="<?= base_url('?c=transportation') ?>">Transportation</a>
	</div>
	<div>
		<a href="<?= base_url('?c=type') ?>">Transportation Type</a>
	</div>
</div>
<div>
	<div>
		<a href="<?= base_url('?c=type') ?>">List</a>
	</div>
	<div>
		<a href="<?= base_url('?c=type&m=add') ?>">Add</a>
	</div>
</div>
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=type&m=add') ?>" enctype="multipart/form-data">
		<div>
			<label>Type</label>
			<select name="type" required="required">
				<option value="a">Airplane</option>
				<option value="t">Train</option>
			</select>
		</div>
		<div>
			<label>Airline Name</label>
			<input type="text" name="name" maxlength="30" required="required">
		</div>
		<div>
			<button type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>