<?php
defined('PATH') or exit('No direct script.');
?>

<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Add</a>
	</div>
	<div class="column col-3 form-input">
		<input type="text" id="input-search" data-one="3" data-two="4" placeholder="Search...">
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
				<th>Username</th>
				<th>Name</th>
				<th>Level</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordUser as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['usernameUser'] ?></td>
					<td><?= $val['fullNameUser'] ?></td>
					<td><?= levelUser($val['levelUser']) ?></td>
					<td>
						<div class="columns">
							<a class="column btn" href="<?= base_url('?c=users&m=edit&i='.$val['idUser']) ?>"><span class="fa fa-pencil"></span></a>
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=users&m=delete&i='.$val['idUser']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=users') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Full Name</label>
			<input type="text" name="name" maxlength="40" required="required">
		</div>
		<div class="form-input">
			<label>Full Name</label>
			<select name="level" required="required">
				<option value="1">Receptionist</option>
				<option value="2">Route Manager</option>
			</select>
		</div>
		<div class="form-input">
			<label>Username</label>
			<input type="text" name="username" maxlength="20" required="required">
		</div>
		<hr>
		<div class="form-input">
			<label>Password</label>
			<input type="password" name="pass1" required="required">
		</div>
		<div class="form-input">
			<label>Confirm Password</label>
			<input type="password" name="pass2" required="required">
		</div>
		<hr>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
