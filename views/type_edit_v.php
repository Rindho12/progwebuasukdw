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
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=type&m=edit&i='.$recordType->idType) ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Type</label>
			<select name="type" required="required">
				<option<?= ($recordType->type == 'a') ? ' selected="selected"' : '' ?> value="a">Airplane</option>
				<option<?= ($recordType->type == 't') ? ' selected="selected"' : '' ?> value="t">Train</option>
			</select>
		</div>
		<div class="form-input">
			<label>Airline Name</label>
			<input type="text" value="<?= $recordType->nameType ?>" name="name" maxlength="30" required="required">
		</div>
		<div class="columns centered">
			<button type="submit" class="column col-3 btn blue" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
