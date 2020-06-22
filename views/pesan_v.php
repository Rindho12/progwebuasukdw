<?php
defined('PATH') or exit('No direct script.');
?>
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
        <th>Nama</th>
        <th>Email</th>
        <th>Subjek</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recordPesan as $no => $val): ?>
        <tr>
          <td><?= $no+1 ?></td>
          <td><?= $val['nama_depan_pesan'] ?></td>
          <td><?= $val['email_pesan'] ?></td>
          <td><?= $val['subjek_pesan'] ?></td>
          <td>
            <div class="columns">
              <a class="column btn" href="<?= base_url('?c=pesan&m=detail&i='.$val['id_pesan']) ?>"><span class="fa fa-info"></span></a>
              <a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=pesan&m=delete&i='.$val['id_pesan']) ?>"><span class="fa fa-trash"></span></a>
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
  <form method="post" action="<?= base_url('?c=city') ?>" enctype="multipart/form-data">
    <div class="form-input">
      <label>City Name</label>
      <input type="text" name="name" maxlength="30" required="required">
    </div>
    <div class="columns centered">
      <button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
    </div>
  </form>
</div>