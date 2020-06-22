<?php
defined('PATH') or exit('No direct script.');
?>
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=kontak') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Deskripsi</label>
            <textarea name="teks" rows="3" required="required" placeholder="ex. There are many variations of passages of Lorem Ipsum available, but the et majori have suffered alteration in some form, by injected humour, Domised words which don't look even slightly believable. If you are going to use a pas of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text."><?= $recordKontak->teks_kontak ?></textarea>
        </div>
        <div class="form-input">
			<label>Alamat</label>
            <textarea name="alamat" rows="3" required="required" placeholder="ex. Jalan Jakarta, Blok AF No.2"><?= $recordKontak->alamat_kontak ?></textarea>
		</div>
		<div class="form-input">
			<label>Nomor Telepon</label>
			<input type="text" value="<?= $recordKontak->nomor_kontak ?>" name="telepon" placeholder="ex. 081234567890" pattern="[0-9]*" required="required">
		</div>
		<div class="form-input">
			<label>Email</label>
			<input type="email" value="<?= $recordKontak->email_kontak ?>" name="email" placeholder="ex. llorem.ipsum@gmail.com" required="required">
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
