<?php
defined('PATH') or exit('No direct script.');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project_progweb');

define('BASE_CONTROLLER', 'home');

function base_url($value='')
{
	$base_url = 'http://localhost/progweb_uas/';
	return $base_url.$value;
}

function redirect($value='', $type='')
{
	if ($type == 'refresh' || $type == 'Refresh' || $type == 'REFRESH') {
		header('Refresh:0;url='.base_url($value));
	} else {
		header('location:'.base_url($value));
	}
}

function randString($value=0)
{
	$string = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
	$strLen = strlen($string);
	$rand = '';
	for ($i=0; $i < $value; $i++) {
		$rand .= $string[rand(0, ($strLen-1))];
	}
	return $rand;
}

function dateIndo($value=null)
{
	if ($value == null) {
		return false;
	} else {
		$date = explode(' ', $value)[0];
		$time = isset(explode(' ', $value)[1]) ? explode(' ', $value)[1] : '';

		$year = explode('-', $date)[0];
		$month = explode('-', $date)[1];
		$day = explode('-', $date)[2];

		switch ($month) {
			case '01':
				$month = 'Januari';
				break;
			case '02':
				$month = 'Februari';
				break;
			case '03':
				$month = 'Maret';
				break;
			case '04':
				$month = 'April';
				break;
			case '05':
				$month = 'Mei';
				break;
			case '06':
				$month = 'Juni';
				break;
			case '07':
				$month = 'Juli';
				break;
			case '08':
				$month = 'Agustus';
				break;
			case '09':
				$month = 'September';
				break;
			case '10':
				$month = 'Oktober';
				break;
			case '11':
				$month = 'November';
				break;
			case '12':
				$month = 'Desember';
				break;
			default:
				$month = 'undefined';
				break;
		}

		return $day.' '.$month.' '.$year.($time == '' ? '' : ', ').$time;
	}
}
?>
