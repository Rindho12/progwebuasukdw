<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Tambah Keahlian</a>
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
				<th>Nama Keahlian</th>
                <th>Presentase Keahlian</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordKeahlian as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['nama_keahlian'] ?></td>
                    <td><?= $val['presentase_keahlian'] ?>%</td>
					<td>
						<div class="columns">
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=keahlian&m=delete&i='.$val['id_ak']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=keahlian') ?>" enctype="multipart/form-data">
        <div class="form-input">
            <label>Nama Keahlian</label>
            <input type="text" name="nama" required="required" placeholder="Nama Keahlian">
        </div>
		<div class="form-input">
			<label>Presentase Keahlian</label>
            <input type="number" name="presentase" min="0" max="100" required="required" placeholder="0-100">
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
