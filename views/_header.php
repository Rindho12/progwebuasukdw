<?php
defined('PATH') or exit('No direct script.');
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/grid.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
	<div id="toggle-aside">
		<button><span class="fa fa-bars"></span></button>
	</div>
	<div id="overlay"></div>
	<aside class="columns multiline top">
		<div class="column brand">
			<h1><span class="fa fa-money"></span> Ramirez</h1>
		</div>
		<ul class="column">
			<li><p>Umum</p></li>
			<li><a <?= ($title == 'Dashboard') ? 'class="active"' : '' ?> href="<?= base_url('?c=dashboard') ?>"><span class="fa fa-dashboard"></span> Dashboard</a></li>
			<li><a <?= ($title == 'Biodata') ? 'class="active"' : '' ?> href="<?= base_url('?c=biodata') ?>"><span class="fa fa-user"></span> Biodata</a></li>
			<li><a <?= ($title == 'Galeri') ? 'class="active"' : '' ?> href="<?= base_url('?c=galeri') ?>"><span class="fa fa-ticket"></span> Galeri</a></li>
			<li><a <?= ($title == 'Kontak') ? 'class="active"' : '' ?> href="<?= base_url('?c=kontak') ?>"><span class="fa fa-phone"></span> Kontak</a></li>
			<li><a <?= ($title == 'Pesan') ? 'class="active"' : '' ?> href="<?= base_url('?c=pesan') ?>"><span class="fa fa-quote-left"></span> Pesan</a></li>
			<li><p>Anggota</p></li>
			<li><a <?= ($title == 'Pesan') ? 'class="active"' : '' ?> href="<?= base_url('?c=pesan') ?>"><span class="fa fa-quote-left"></span> Media Sosial</a></li>
			<li><a <?= ($title == 'Pesan') ? 'class="active"' : '' ?> href="<?= base_url('?c=pesan') ?>"><span class="fa fa-quote-left"></span> Pesan</a></li>
			<li><a <?= ($title == 'Pesan') ? 'class="active"' : '' ?> href="<?= base_url('?c=pesan') ?>"><span class="fa fa-quote-left"></span> Pesan</a></li>
			<li><a href="<?= base_url('?c=auth&m=logout') ?>"><span class="fa fa-sign-out"></span> Logout</a></li>
		</ul>
	</aside>
	<div class="columns multiline spread-v">
	<main id="non-login" class="column">
