<?php
defined('PATH') or exit('No direct script.');
?>
<div class="columns">
  <div class="column col-2">
    <a href="#" id="add" class="btn blue"><span class="fa fa-plus"></span> Tambah Galeri</a>
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
        <th>Foto</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recordGaleri as $no => $val): ?>
        <tr>
          <td><?= $no+1 ?></td>
          <td><img src="<?= base_url()."uploads/". $val['path_galeri'] ?>" class="galeri_nih"></td>
          <td><?= $val['judul_galeri'] ?></td>
          <td><?= $val['kategori_galeri'] ?></td>
          <td>
            <div class="columns">
              <a class="column btn red" onclick="return confirm('Are you sure?')" href="<?= base_url('?c=galeri&m=delete&i='.$val['id_galeri']) ?>"><span class="fa fa-trash"></span></a>
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
  <form method="post" action="<?= base_url('?c=galeri') ?>" enctype="multipart/form-data">
    <div class="form-input">
      <label>Foto</label>
      <input type="file" name="foto" required="required" accept="image/*">
    </div>
    <div class="form-input">
      <label>Judul Foto</label>
      <input type="text" name="judul" maxlength="30" required="required">
    </div>
    <div class="form-input">
      <label>Kategori</label>
        <select name='kategori'>
          <option value="photography">Photography</option>
          <option value="design">Design</option>
          <option value="marketing">Marketing</option>
        </select>
    </div>

    <div class="columns centered">
      <button class="column col-3 btn blue" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">Submit</button>
    </div>
  </form>
</div>