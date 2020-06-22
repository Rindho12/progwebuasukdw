<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Tambah Media Sosial</a>
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
				<th>Nama Media Sosial</th>
                <th>URL</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordMedsos as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['nama_sosial'] ?></td>
                    <td><?= $val['url_sosial'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=medsos&m=delete&i='.$val['id_as']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=medsos') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Tipe Medsos</label>
			<select name="nama">
				<option value="facebook">Facebook</option>
				<option value="twitter">Twitter</option>
				<option value="googleplus">Google Plus</option>
				<option value="instagram">Instagram</option>
			</select>
		</div>
        <div class="form-input">
            <label>URL Medsos</label>
            <input type="text" name="url" required="required" placeholder="https://www.facebook.com/xxxxxx">
        </div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
