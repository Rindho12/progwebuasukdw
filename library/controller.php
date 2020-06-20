<?php
defined('PATH') or exit('No direct script.');
/**
* 
*/
class controller
{
	private $conn;
	
	public function __construct()
	{
		$this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

		if ($this->conn->connect_errno) {
			echo $this->conn->connect_error;
		}
	}

	public function loadView($value='', $data=null)
	{
		if ($value == '') {
			return false;
		} else {
			if (!file_exists(PATH.'views'.DS.$value.'.php')) {
				echo "View not found.";
				exit;
			} else {
				if ($data !== null && is_array($data)) {
					foreach ($data as $var => $val) {
						global $$var;
						$$var = $val;		
					}
				}
				include_once PATH.'views'.DS.$value.'.php';
			}
		}
	}

	public function insertId()
	{
		return $this->conn->insert_id;
	}

	public function query($value='')
	{
		if ($value == '') {
			return false;
		} else {
			$sql = $this->conn->query($value) or exit($this->conn->error);
			return $sql;
		}
	}

	public function select($table='', $whereAnd=null, $whereOr=null)
	{
		if ($table == '') {
			return false;
		} else {
			$numWhere = 0;

			$sql = 'SELECT * FROM '.$table;
			if ($whereAnd !== null && is_array($whereAnd)) {
				foreach ($whereAnd as $colAnd => $valAnd) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colAnd.'="'.$valAnd.'"';
					} else {
						$sql .= ' AND '.$colAnd.'="'.$valAnd.'"';
					}
					$numWhere++;
				}
			}
			if ($whereOr !== null && is_array($whereOr)) {
				foreach ($whereOr as $colOr => $valOr) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colOr.'="'.$valOr.'"';
					} else {
						$sql .= ' OR '.$colOr.'="'.$valOr.'"';
					}
					$numWhere++;
				}
			}

			$record = $this->conn->query($sql) or exit($this->conn->error);
			return $record;			
		}
	}

	public function update($table='', $data=null, $whereAnd=null, $whereOr=null)
	{
		if ($table == '') {
			return false;
		} else {
			$sql = 'UPDATE '.$table.' SET ';

			if ($data !== null && is_array($data)) {
				foreach ($data as $colData => $valData) {
					$sql .= $colData.'="'.$valData.'", ';
				}
			} else {
				return false;
			}
			$sql = rtrim($sql, ', ');

			$numWhere = 0;
			if ($whereAnd !== null && is_array($whereAnd)) {
				foreach ($whereAnd as $colAnd => $valAnd) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colAnd.'="'.$valAnd.'"';
					} else {
						$sql .= ' AND '.$colAnd.'="'.$valAnd.'"';
					}
					$numWhere++;
				}
			}
			if ($whereOr !== null && is_array($whereOr)) {
				foreach ($whereOr as $colOr => $valOr) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colOr.'="'.$valOr.'"';
					} else {
						$sql .= ' OR '.$colOr.'="'.$valOr.'"';
					}
					$numWhere++;
				}
			}

			$record = $this->conn->query($sql) or exit($this->conn->error);
			return $record;
		}
	}

	public function insert($table='', $data=null)
	{
		if ($table == '') {
			return false;
		} else {
			$column = '(';
			$value = '(';
			$sql = 'INSERT INTO '.$table;
			if ($data !== null && is_array($data)) {
				foreach ($data as $col => $val) {
					$column .= $col.', ';
					$value .= '"'.$val.'", ';
				}
			} else {
				return false;
			}

			$column = rtrim($column, ', ');
			$value = rtrim($value, ', ');
			$column .= ')';
			$value .= ')';
			
			$sql .= ' '.$column.' VALUES '.$value;

			$record = $this->conn->query($sql) or exit($this->conn->error);
			return $record;
		}
	}

	public function deleteRecord($table='', $whereAnd=null, $whereOr=null)
	{
		if ($table == '') {
			return false;
		} else {
			$numWhere = 0;

			$sql = 'DELETE FROM '.$table;
			if ($whereAnd !== null && is_array($whereAnd)) {
				foreach ($whereAnd as $colAnd => $valAnd) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colAnd.'="'.$valAnd.'"';
					} else {
						$sql .= ' AND '.$colAnd.'="'.$valAnd.'"';
					}
					$numWhere++;
				}
			}
			if ($whereOr !== null && is_array($whereOr)) {
				foreach ($whereOr as $colOr => $valOr) {
					if ($numWhere == 0) {
						$sql .= ' WHERE '.$colOr.'="'.$valOr.'"';
					} else {
						$sql .= ' OR '.$colOr.'="'.$valOr.'"';
					}
					$numWhere++;
				}
			}

			$record = $this->conn->query($sql) or exit($this->conn->error);
			return $record;
		}
	}
}
?>