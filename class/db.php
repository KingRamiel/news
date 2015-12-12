<?php
/**
* 
*/
class Database 
{
	private $query = "";
	private $row_count="";
	private $result = array();
	
	function __construct()
	{
		# code...
	}

	public function connect($host,$user,$pass,$db){
		$myconn= mysql_connect($host, $user,$pass);
		if ($myconn) {
			$mydb = mysql_select_db($db, $myconn);
			if ($myconn) {
				// echo "Connection Established<br>";
			}
		}
		else{
			echo "Connection error";
		}
	}

	public function table_exists($table){
		$checktable = mysql_query("SHOW TABLES LIKE '$table'");
		// $table_exists = mysql_num_rows($checktable);
		if ($checktable) {
			return true;
		}
		else{
			return false;
		}
	}

	public function select($table, $rows = '*', $where = null, $join = null, $order = null, $limit = null){
		$sql = 'SELECT '.$rows.' FROM '.$table;
		
		if($join != null){
			$sql .= ' LEFT JOIN '.$join;
		}
		if($where != null){
			$sql .= ' WHERE '.$where;
		}
		if($order != null){
			$sql .= ' ORDER BY '.$order;
		}
		if($limit != null){
			$sql .= ' LIMIT '.$limit;
		}
		$this->query= $sql;
		if ($this->table_exists($table)) {
			$temp_query = mysql_query($sql);
			if ($temp_query) {
				$this->row_count=mysql_num_rows($temp_query);
				for ($i=0; $i < $this->row_count; $i++) { 
					$row = mysql_fetch_array($temp_query);
					$key = array_keys($row);
					for ($j=0; $j < count($key); $j++) { 
						if (mysql_num_rows($temp_query) >= 1) {
							$this->result[$i][$key[$j]] = $row[$key[$j]];
						}
						else{
							$this->result=false;
						}
					}
				}
			}
			else{
				return false;
			}
		}
	}
	public function insert($table,$args=array()){
		if($this->table_exists($table)){
			$sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($args)).'`) VALUES ("' . implode('", "', $args) . '")';
			$this->query = $sql; 

			if($temp_query = mysql_query($sql)){
            	// array_push($this->result,mysql_insert_id());
				return true; 
			}else{
            	// array_push($this->result,mysql_error());
				return false; 
			}
		}else{
			return false;
		}
	}
	public function edit($table,$args=array(),$where){

	}
	public function delete($table, $args){
		$sql = 'DELETE FROM '.$table.' where '.$args;
		if ($this->table_exists($table)) {
			$temp_query = mysql_query($sql);
			if ($temp_query) {

			}
		}
	}
	public function getResult(){
		$val = $this->result;
		$this->result = array();
		return $val;
	}

	public function out(){
		echo "Testing........";
	}
}
?>