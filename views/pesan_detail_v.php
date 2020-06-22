<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns multiline border-bottom">
	<div class="column col-12 print-show border-bottom">
		<div class="columns">
			<h2 class="text-primary-color margin-bottom column col-6">E-Ticket</h2>
			<h2 class="text-primary-color margin-bottom column col-6" style="text-align: right;"><span class="fa fa-money"></span> Ticketing</h2>
		</div>
		<hr class="print-none">
	</div>
	<table class="column col-8 9pt table no-border margin-top margin-bottom">
		<tbody>
			<tr>
				<td>Nama Depan</td>
				<td>:</td>
				<td><?= $recordPesan->nama_depan_pesan ?></td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td>:</td>
				<td><?= $recordPesan->nama_belakang_pesan ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= $recordPesan->email_pesan ?></td>
			</tr>
			<tr>
				<td>Subjek</td>
				<td>:</td>
				<td><?= $recordPesan->subjek_pesan ?></td>
			</tr>
			<tr>
				<td>Isi Pesan</td>
				<td>:</td>
				<td><?= $recordPesan->isi_pesan ?></td>
			</tr>
			
		</tbody>
	</table>
</div>