<?php namespace PHPGrid\Grid;

	class Grid{
		public $db;
		public $db_data = array();
		public $query;

		public $fields = array();
		public $option = array();
		public $auto_set_fields = TRUE;

		public $html;
		public $table_body;
		public $table_head;
		
		function __construct($get_db_data){
			$this->db_data = array_merge($this->db_data, $get_db_data);
			$this->db = new \PHPGrid\Database\DB_Mysql(_DB_USER_, _DB_PASS_, _DB_HOST_, $this->db_data['database']);
			$this->table_head = "<thead><tr>";
		}
		
		public function set_option($option){

			$this->option = array_merge($this->option, $option);

			if (!empty($option['link']))
				foreach ($option['link'] as $key => $value)
					$this->table_head .= "<th>{$key}</th>";
		}
		
		public function set_fields($fields){
			if (!empty($fields)){
				$this->auto_set_fields = FALSE;
				$this->fields = array_merge($this->fields, $fields);

				$fields_sql = '';
				foreach ($fields as $fields_db => $caption) {
					$fields_sql .= ", {$fields_db}";
					$this->table_head .= "<th>{$caption}</th>";
				}
				$fields_sql = substr($fields_sql,1);

				$this->query = "select %s from %s %s";
				$this->query = sprintf($this->query, $fields_sql, $this->db_data['table'], $this->db_data['condition']);
			}
		}
		
		public function set_fields_db(){
			$query_col = "SHOW COLUMNS FROM ".$this->db_data['table'];
			$stmt = $this->db->prepare($query_col)->execute("");
			$entry = $stmt->fetchall_assoc();
			
			foreach ($entry as $value) {
				$filed_name = $value['Field'];
				$this->fields[$filed_name] = $filed_name;
				$this->table_body .= "<th>{$filed_name}</th>";
			}

			$this->query = "select * from %s %s";
			$this->query = sprintf($this->query, $this->db_data['table'], @$this->db_data['condition']);
		}

		public function compile(){
			$this->html = "<table class='".@$this->option['css-class']."'>";

			if($this->auto_set_fields == TRUE)
				$this->set_fields_db();

			$stmt = $this->db->prepare($this->query)->execute("");
			$entry = $stmt->fetchall_assoc();
			
			foreach ($entry as $array_value) {

				$this->table_body .= "<tr>";

				foreach ($array_value as $value)
					$this->table_body .= "<td>$value</td>";

				if (!empty($this->option['link'])) 
					foreach ($this->option['link'] as $key => $value) {
						$href = $value.@$array_value[$this->option['id']];
						$this->table_body .= "<td><a href='{$href}'>{$key}</a></td>";
					}

				$this->table_body .= "</tr>";
			}

			$this->html .= $this->table_head."</tr></thead>";
			$this->html .= $this->table_body."</table>";
			
			return $this->html;
		}
	}
?>