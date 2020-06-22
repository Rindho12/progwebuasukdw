<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
	<div class="column col-2">
		<a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Tambah Pengalaman</a>
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
				<th>Nama Pengalaman</th>
				<th>Dari Tahun</th>
				<th>Sampai Tahun</th>
				<th>Tempat</th>
				<th>Deskripsi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($recordPengalaman as $no => $val): ?>
				<tr>
					<td><?= $no+1 ?></td>
					<td><?= $val['nama_pengalaman'] ?></td>
                    <td><?= $val['dari_tahun_pengalaman'] ?></td>
                    <td><?= $val['sampai_tahun_pengalaman'] ?></td>
                    <td><?= $val['tempat_pengalaman'] ?></td>
                    <td><?= $val['teks_pengalaman'] ?></td>
					<td>
						<div class="columns">
							<a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=pengalaman&m=delete&i='.$val['id_ak']) ?>"><span class="fa fa-trash"></span></a>
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
	<form method="post" action="<?= base_url('?c=pengalaman') ?>" enctype="multipart/form-data">
        <div class="form-input">
            <label>Nama Pengalaman</label>
            <input type="text" name="nama" required="required" placeholder="ex. Sekolah Menengah Pertama">
        </div>
		<div class="form-input">
			<label>Dari Tahun</label>
            <input type="text" name="dari" required="required" placeholder="ex. 2000">
		</div>
		<div class="form-input">
			<label>Sampai Tahun</label>
            <input type="text" name="sampai" required="required" placeholder="ex. 2001">
		</div>
		<div class="form-input">
			<label>Tempat</label>
            <input type="text" name="tempat" required="required" placeholder="ex. SMP Kristen Duta Wacana">
		</div>
		<div class="form-input">
			<label>Deskripsi</label>
            <input type="text" name="deskripsi" required="required" placeholder="ex. SMP Kristen Duta Wacana">
		</div>
		<div class="columns centered">
			<button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
		</div>
	</form>
</div>
