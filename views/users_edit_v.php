<?php
defined('PATH') or exit('No direct script.');
?>
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=users&m=edit&i='.$recordUser->idUser) ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Full Name</label>
			<input type="text" name="name" value="<?= $recordUser->fullNameUser ?>" maxlength="40" required="required">
		</div>
		<div class="form-input">
			<label>Level</label>
			<select name="level" required="required">
				<option<?= ($recordUser->levelUser == '1') ? ' selected="selected"' : '' ?> value="1">Receptionist</option>
				<option<?= ($recordUser->levelUser == '2') ? ' selected="selected"' : '' ?> value="2">Route Manager</option>
			</select>
		</div>
		<div class="form-input">
			<label>Username</label>
			<input type="text" name="username" value="<?= $recordUser->usernameUser ?>" maxlength="20" required="required">
			<input type="hidden" name="username1" value="<?= $recordUser->usernameUser ?>" maxlength="20" required="required">
		</div>
		<hr>
		<div class="form-input">
			<label>Password</label>
			<input type="password" name="pass1">
		</div>
		<div class="form-input">
			<label>Confirm Password</label>
			<input type="password" name="pass2">
		</div>
		<div class="form-input">
			<label>Don't enter any password if doesn't want to change the password.</label>
		</div>
		<hr>
		<div class="columns centered">
			<button type="submit" class="column btn blue col-3" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
