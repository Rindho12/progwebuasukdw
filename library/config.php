<?php
defined('PATH') or exit('No direct script.');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project_progweb');

define('BASE_CONTROLLER', 'home');

function base_url($value='')
{
	$base_url = 'http://localhost/project/';
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

function transportationType($value='')
{
	switch ($value) {
		case 'a':
			return 'Airplane';
			break;
		case 't':
			return 'Train';
			break;
		default:
			return 'undefined';
			break;
	}
}

function levelUser($value='')
{
	switch ($value) {
		case '1':
			return 'Receptionist';
			break;
		case '2':
			return 'Route Manager';
			break;
		default:
			return 'undefined';
			break;
	}
}

function genderCustomer($value='')
{
	switch ($value) {
		case 'f':
			return 'Female';
			break;
		case 'm':
			return 'Male';
			break;
		default:
			return 'undefined';
			break;
	}
}

function seatClass($value='')
{
	switch ($value) {
		case 'f':
			return 'First Class';
			break;
		case 'b':
			return 'Business Class';
			break;
		case 'e':
			return 'Economy Class';
			break;
		default:
			return 'undefined';
			break;
	}
}

function ageCustomer($value='')
{
	$year = explode('-', $value)[0];
	$now = date('Y');
	if (($now - $year) < 3) {
		return 'Infant';
	} elseif (($now - $year) < 17) {
		return 'Children';
	} else {
		return 'Adult';
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
				$month = 'January';
				break;
			case '02':
				$month = 'February';
				break;
			case '03':
				$month = 'March';
				break;
			case '04':
				$month = 'April';
				break;
			case '05':
				$month = 'May';
				break;
			case '06':
				$month = 'June';
				break;
			case '07':
				$month = 'July';
				break;
			case '08':
				$month = 'August';
				break;
			case '09':
				$month = 'September';
				break;
			case '10':
				$month = 'October';
				break;
			case '11':
				$month = 'November';
				break;
			case '12':
				$month = 'December';
				break;
			default:
				$month = 'undefined';
				break;
		}

		return $day.' '.$month.' '.$year.($time == '' ? '' : ', ').$time;
	}
}
?>
