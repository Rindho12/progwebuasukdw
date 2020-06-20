
<?php
session_start();

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('PATH', ROOT.DS);

require_once 'library'.DS.'config.php';
require_once 'library'.DS.'controller.php';

function __autoload($value='')
{
	if (!file_exists('controllers'.DS.$value.'.php')) {
		echo "Controller ".$value." not found.";
		exit;
	} else {
		include_once 'controllers'.DS.$value.'.php';
	}
}

if (isset($_GET['c'])) {
	if (isset($_GET['m'])) {
		$nameController = $_GET['c'];
		$nameMethod = $_GET['m'];

		$cont = new $nameController();
		$cont->$nameMethod();
	} else {
		$nameController = $_GET['c'];

		$cont = new $nameController();
		$cont->index();
	}
} else {
	$base = BASE_CONTROLLER;
	$cont = new $base();
	$cont->index();
}

?>
