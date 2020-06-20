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
	<form method="post" action="<?= base_url('?c=transportation&m=edit&i='.$recordTransportation->idTransportation) ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Airline</label>
			<select name="type" required="required">
				<?php foreach ($recordType as $no => $val): ?>
					<option<?= ($recordTransportation->idType == $val['idType']) ? ' selected="selected"' : '' ?> value="<?= $val['idType'] ?>"><?= $val['nameType'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-input">
			<label>Code</label>
			<input type="text" value="<?= $recordTransportation->codeTransportation ?>" name="code" maxlength="10" required="required">
		</div>
		<div class="columns centered">
			<button type="submit" class="column col-3 btn blue" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
