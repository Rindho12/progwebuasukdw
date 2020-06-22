<?php
defined('PATH') or exit('No direct script.');
?>
<hr>
<div>
	<div>
		<?php if (isset($_SESSION['alert'])): ?>
			<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
		<?php unset($_SESSION['alert']); endif; ?>
	</div>
	<form method="post" action="<?= base_url('?c=biodata&m=edit&i='.$record_biodata->id_biodata) ?>" enctype="multipart/form-data">
        <input type="hidden" value="<?= $record_biodata->tipe_biodata ?>" name="tipe" required="required">
        <?php if($record_biodata->tipe_biodata == "judul"): ?>
            <div class="form-input">
                <label>Judul</label>
                <input type="text" value="<?= $record_biodata->judul_biodata ?>" name="judul" maxlength="20" required="required">
            </div>
            <div class="form-input">
                <label>Sub Judul</label>
                <input type="text" value="<?= $record_biodata->isi_biodata ?>" name="isi" maxlength="30" required="required">
            </div>
        <?php elseif ($record_biodata->tipe_biodata == "foto"): ?>
            <div class="form-input">
                <label>Foto</label>
                <input type="file" name="isi">
            </div>
        <?php elseif ($record_biodata->tipe_biodata == "panjang"): ?>
            <div class="form-input">
                <label>Paragraf</label>
                <textarea name="isi" cols="3" required="required"><?= $record_biodata->isi_biodata ?></textarea>
            </div>
        <?php elseif ($record_biodata->tipe_biodata == "pendek"): ?>
            <div class="form-input">
                <label>Judul</label>
                <input type="text" value="<?= $record_biodata->judul_biodata ?>" name="judul" maxlength="20" required="required">
            </div>
            <div class="form-input">
                <label>Isi</label>
                <input type="text" value="<?= $record_biodata->isi_biodata ?>" name="isi" maxlength="30" required="required">
            </div>
        <?php endif; ?>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
