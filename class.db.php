<?php namespace PHPGrid\Database;

	use \Exception as Exception;
	
	class MysqlException extends Exception {
		public $backtrace;
		public function __construct($message=FALSE, $code=FALSE){
			if (!$message){
				$this->message = mysql_error();
			}
			if (!$code){
				$this->code = mysql_errno();
			}
			$this->backtrace = debug_backtrace();
		}
	}

	class DB_Mysql{
		protected $user;
		protected $pass;
		protected $dbhost;
		protected $dbname;
		protected $dbh; //Database Connction handel
		
		public function __construct($user, $pass, $dbhost, $dbname) {
			 $this->user = $user;
			 $this->pass = $pass;
			 $this->dbhost = $dbhost;
			 $this->dbname = $dbname;
		}
		
		protected function connect() {
			$this->dbh = mysql_pconnect($this->dbhost, $this->user, $this->pass);
			if(!is_resource($this->dbh)) {
				throw new MysqlException;
			}
			
			if(!mysql_select_db($this->dbname, $this->dbh)){
				throw new MysqlException;
			}
		}
		
		protected function execute($query) {
			if(!$this->dbh){
				$this->connect;
			}
			$ret = mysql_query($query, $this->dbh);
			if(!$ret){
				throw new MysqlException;
			}else if(!is_resource($ret)){
				return TRUE;
			}else {
				$stm = new DB_MysqlStatement($this->dbh, $query);
				$stm->result = $ret;
				return $stm;
			}
		}
		
		public function prepare($query){
			if(!$this->dbh){
				$this->connect();
			}
			return new DB_MysqlStatement($this->dbh, $query);
		}
		
		public function insert($table, $record){
			if(!$this->dbh){
				$this->connect();
			}
			
			$field = '';
			$var = '';
			$sql = "insert into $table (%s) values (%s)";
			
			foreach ($record as $key => $value) {
				$field .= ", `".mysql_escape_string($key)."`";
				$var .= ", '".mysql_escape_string($value)."'";
			}
			
			$field = substr($field,1);
			$var = substr($var,1);
			$query = sprintf($sql,$field,$var);			
			return new DB_MysqlStatement($this->dbh, $query);
		}
		
		public function update($table, $record, $where){
			if(!$this->dbh){
				$this->connect();
			}
			
			$usql = '';
			$sql = "update $table set %s where %s";
			
			foreach ($record as $key => $value) {
				$usql .= ", `".mysql_escape_string($key)."`='".mysql_escape_string($value)."'";
			}
			
			$usql = substr($usql,1);
			$query = sprintf($sql,$usql,$where);			
			return new DB_MysqlStatement($this->dbh, $query);
		}		
	}
	
	class DB_MysqlStatement{
		protected $result;
		protected $binds;
		protected $dbh;
		public $query;
		
		public function __construct($dbh, $query){
			$this->query = $query;
			$this->dbh = $dbh;
			if(!is_resource($dbh)){
				throw new MysqlException("Not a valid database connection");
			}
		}
		
		public function bind_param($ph, $pv) {
			$this->binds[$ph] = $pv;
		}

		public function execute(){
			$binds = func_get_args();
			foreach($binds as $index => $name){
				$this->binds[$index + 1] = $name;
			}
			$cnt = count($binds);
			$query = $this->query;
			foreach ($this->binds as $ph => $pv){
				$query = str_replace(":$ph", "'".mysql_real_escape_string($pv)."'", $query);
			}
			$this->result = mysql_query($this->query, $this->dbh);
			if(!$this->result){
				throw new MysqlException;
			}
			return $this;
		}
		
		public function fetch_row(){
			if(!$this->result){
				throw new MysqlException("Query not executed");
			}
			return mysql_fetch_row($this->result);
		}
		
		public function fetch_assoc(){
			return mysql_fetch_assoc($this->result);
		}
		
		public function fetchall_assoc(){
			$retval = array();
			while($row = $this->fetch_assoc()){
				$retval[] = $row;
			}
			return $retval;
		}
	}
?>