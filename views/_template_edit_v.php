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
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=city&m=edit&i='.$recordCity->idCity) ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>City Name</label>
			<input type="text" value="<?= $recordCity->nameCity ?>" name="name" maxlength="30" required="required">
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
