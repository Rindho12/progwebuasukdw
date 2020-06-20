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
			<h1><span class="fa fa-money"></span> Ticketing</h1>
		</div>
		<ul class="column">
			<li><a <?= ($title == 'Dashboard') ? 'class="active"' : '' ?> href="<?= base_url('?c=dashboard') ?>"><span class="fa fa-dashboard"></span> Dashboard</a></li>
			<li><a <?= ($title == 'Transportation' || $title == 'Transportation Type') ? 'class="active"' : '' ?> href="<?= base_url('?c=transportation') ?>"><span class="fa fa-car"></span> Transportation</a></li>
			<li><a <?= ($title == 'Route' || $title == 'City') ? 'class="active"' : '' ?> href="<?= base_url('?c=route') ?>"><span class="fa fa-road"></span> Route</a></li>
			<li><a <?= ($title == 'Reservation' || $title == 'Customer') ? 'class="active"' : '' ?> href="<?= base_url('?c=reservation') ?>"><span class="fa fa-ticket"></span> Reservation</a></li>
			<li><a <?= ($title == 'Users') ? 'class="active"' : '' ?> href="<?= base_url('?c=users') ?>"><span class="fa fa-users"></span> Users</a></li>
			<li><a href="<?= base_url('?c=auth&m=logout') ?>"><span class="fa fa-sign-out"></span> Logout</a></li>
		</ul>
	</aside>
	<div class="columns multiline spread-v">
	<main id="non-login" class="column">
