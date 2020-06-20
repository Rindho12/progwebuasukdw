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
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=customer&m=edit&i='.$recordCustomer->idCustomer) ?>" enctype="multipart/form-data">
    <div class="form-input">
      <label>Identity Number</label>
      <input type="text" name="identity" value="<?= $recordCustomer->identityCustomer ?>" maxlength="30">
    </div>
    <div class="form-input">
      <label>Full Name</label>
      <input type="text" name="name" value="<?= $recordCustomer->nameCustomer ?>" maxlength="40" required="required">
      <input type="hidden" name="name1" value="<?= $recordCustomer->nameCustomer ?>" maxlength="40" required="required">
    </div>
    <div class="form-input">
      <label>Phone</label>
      <input type="text" name="phone" value="<?= $recordCustomer->phoneCustomer ?>" maxlength="12">
    </div>
    <div class="form-input">
      <label>Birth</label>
      <input type="date" name="birth" value="<?= $recordCustomer->birthCustomer ?>" required="required">
      <input type="hidden" name="birth1" value="<?= $recordCustomer->birthCustomer ?>" required="required">
    </div>
    <div class="form-input">
      <label>Gender</label>
      <select name="gender" required="required">
        <option<?= $recordCustomer->genderCustomer == 'f' ? ' selected="selected"' : '' ?> value="f">Female</option>
        <option<?= $recordCustomer->genderCustomer == 'm' ? ' selected="selected"' : '' ?> value="m">Male</option>
      </select>
    </div>
    <div class="form-input">
      <label>Address</label>
      <textarea name="address" rows="4"><?= $recordCustomer->addressCustomer ?></textarea>
    </div>
		<div class="columns centered">
			<button type="submit" class="column col-3 btn blue" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
