<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Tambah Biodata</a>
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
				<th>Tipe</th>
        <th>Judul</th>
        <th>Isi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordBiodata as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['tipe_biodata'] ?></td>
          <td><?= $val['judul_biodata'] ?></td>
          <td><?= $val['isi_biodata'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn" href="<?= base_url('?c=biodata&m=edit&i='.$val['id_biodata']) ?>"><span class="fa fa-pencil"></span></a>
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=biodata&m=delete&i='.$val['id_biodata']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=biodata') ?>" enctype="multipart/form-data">
		<div class="form-input">
			<label>Tipe Biodata</label>
			<select name="tipe">
				<option value="judul">Judul</option>
				<option value="foto">Foto</option>
				<option value="panjang">Paragraf</option>
				<option value="pendek">Teks Pendek</option>
			</select>
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
