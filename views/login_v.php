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
	<main id="login" class="columns middled centered">
		<div class="columns column col-3 multiline">
			<div class="column col-12 brand">
				<h1><span class="fa fa-users"></span> Login</h1>
			</div>
			<div class="column col-12">
				<?php if (isset($_SESSION['alert'])): ?>
					<mark class="<?= $_SESSION['alert']['type'] ?>"><?= $_SESSION['alert']['value'] ?></mark>
				<?php unset($_SESSION['alert']); endif; ?>
			</div>
			<form class="column col-12" method="post" action="<?= base_url("?c=auth") ?>" enctype="multipart/form-data">
				<div class="form-input-login">
					<input type="text" name="nim" placeholder="NIM" autofocus="autofocus" maxlength="20" required="required">
					<span class="fa fa-user"></span>
				</div>
				<div class="form-input-login">
					<input type="password" name="password" placeholder="Password" required="required">
					<span class="fa fa-lock"></span>
				</div>
				<div class="form-input-login">
					<button type="submit" name="submit" value="submit">Login</button>
				</div>
			</form>
		</div>
	</main>
</body>
</html>
