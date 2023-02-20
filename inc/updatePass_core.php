<?php 

/**
 * 
 */
class UpdatePass{

	private $mysqli = false;
	
	public function __construct($m) { $this->mysqli = $m; }

	
	public function findAsk($username, $preg_1, $preg_2){
	   
		$prepared = $this->prepare("SELECT count( * ) AS c
		FROM `invento_question`
		WHERE username = ? && preg_1 = ? && preg_2 = ?", 'findAsk()');
		$this->bind_param($prepared->bind_param('sss', $username, $preg_1, $preg_2), 'findAsk()');
		$this->execute($prepared, 'findAsk()');
		
		$result = $prepared->get_result();
		$row = $result->fetch_object();
		
		if($row->c != 1)
			return false;

	 return true;
	}

	public function get_userid($name) {
		
		$prepared = $this->prepare("SELECT id FROM invento_users WHERE name=?", 'get_userid()');
		$this->bind_param($prepared->bind_param('s', $name), 'get_userid()');
		$this->execute($prepared, 'get_userid()');
		
		$result = $prepared->get_result();
		$row = $result->fetch_object();
		
		return $row->id;
	}

	public function update_pass($userid, $pass) {
		$pass = md5($pass);
		$prepared = $this->prepare("UPDATE invento_users SET password=? WHERE id=?", 'update_pass()');
		$this->bind_param($prepared->bind_param('si', $pass, $userid), 'update_pass()');
		$this->execute($prepared, 'update_pass()');
		
		return true;
	}


/***
	  *  Private functions
	  *
	***/
	private function prepare($query, $func) {
		$prepared = $this->mysqli->prepare($query);
		if(!$prepared)
			die("Couldn't prepare query. inc/{$this->self_file} - $func");
		return $prepared;
	}
	private function bind_param($param, $func) {
		if(!$param)
			die("Couldn't bind parameters. inc/{$this->self_file} - $func");
		return $param;
	}
	private function execute($prepared, $func) {
		$exec = $prepared->execute();
		if(!$exec)
			die("Couldn't execute query. inc/{$this->self_file} - $func");
		return $exec;
	}
	private function query($query, $func) {
		$q = $this->mysqli->query($query);
		if(!$q)
			die("Couldn't run query. inc/{$this->self_file} - $func");
		return $q;
	}
	public function __destruct() {
		if(is_resource($this->mysqli) && get_resource_type($this->mysqli) == 'mysql link')
			$this->mysqli->close();
	}


}

$_UpdatePass = new UpdatePass($mysqli);