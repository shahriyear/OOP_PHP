<?php
	//For VIEW: (SELECT * FROM table_name) WHERE fieldname='value') AND/OR filedname2='value2' ORDER BY filedname ASC/DESC LIMIT startvalue,limt  
	//DELETE FROM table WHERE filedname='value';
	//UPDATE table SET fieldname='value' WHERE fieldname='value'
	//INSERT INTO table (fieldname1,fielfname2) VALUES (value1,value2)
	//INSERT INTO table VALUES (value1,value2),(value1,valu2)
	include_once("config.php");
	
	class MysqlDatbase{
		
		private $connection='';
		public $last_query='';
		
		
		function __construct()
		{
			$this->open_connection();
		}
		
		
		private function open_connection()
		{
			$this->connection=@mysql_connect(HOST,DB_USER,DBU_PASS);
			if($this->connection)
			{
				$db=mysql_select_db(DB_NAME);
				if(!$db)
					{
						die("ERROR: Database Not Exist");
					}
			}
			else
			{

				die("Error: There Is a Problem with the connection Information");
			}
		}
	
	//select/insert
		
		public function query($sql_txt)
		{
			$this->last_query=$sql_txt;
			$query=mysql_query($sql_txt,$this->connection);
			if(!$query)
					die("Error:".mysql_error()." ".$sql_txt);
				else
					return $query;
		}
		
		public function select($table,$arg=NULL,$extra=NULL,$limit=NULL,$logic=NULL)
		{
			$out='';
			$i=1;
			if($logic==NULL)
				$logic=' AND ';
			if($arg!=NULL && is_array($arg))
			foreach($arg as $key=>$val)
			{
				$out.=$key."='{$val}'";
				if($i>=count($arg))
					break;
				$out.=$logic;
				$i++;
			}
			
			$sql_txt="SELECT * FROM {$table}";
			if($out!='')
				$sql_txt.=" WHERE ".$out;
			if($extra!=NULL)
				$sql_txt.=" ".$extra;
			if($limit!=NULL)
				$sql_txt.=" LIMIT {$limit}";
			return $this->query($sql_txt);
		}
		
		//delete from tablename where feild=value and feild1=value1
		
		public function delete($table,$arg)
		{
			$out='';
			$i=1;
			if($arg==NULL || !is_array($arg))
				return false;
			foreach($arg as $key=>$val)
			{
				$out.=$key."='{$val}'";
				if($i>=count($arg))
					break;
				$out.=" AND ";
				$i++;
				
			}
			$sql_txt="DELETE FROM {$table} WHERE {$out}";
			return $this->query($sql_txt);
			
		}

		
		public function isAssoc($arr)
		{
			return array_keys($arr) !== range(0, count($arr) - 1);
		}
		//array('uid' => '1','Name' => 'A','Email' => 'B','username' => 'c','password' => '1','usertype' => '0'),
		//INSERT INTO music_login (`uid`, `Name`, `Email`, `username`) VALUES (NULL, 'asd', 'asd', 'asd');
		//INSERT INTO music_login  VALUES (NULL, 'asd', 'asd', 'asd');
		//UPDATE music_login SET Name='asd', Email='asd', username='asd' WHERE uid='1'
		public function update($table,$arg=NULL,$where=NULL)
		{
			$query="UPDATE {$table} SET ";
			$out='';
			$i=1;
			if($arg==NULL || !is_array($arg) || !is_array($where))
				return false;	
			foreach($arg as $key=>$val)
			{
				$out.=$key."='{$val}'";
				if($i>=count($arg))
					break;
				$out.=",";
				$i++;
			}
			$whr=' WHERE ';
			foreach($where as $k=>$v)
			{
				$whr.=$k."='{$v}'";
				if($i>=count($arg))
					break;
				$whr.=" AND ";
				$i++;
			}
			$query.=$out.$whr;
			return $this->query($query);
		}
		
		
		public function insert($table,$arg)
		{
			$sql="INSERT INTO {$table} ";
			if(!is_array($arg))
				return false;
			$keys=''; $value='';$i=1;
			if($this->isAssoc($arg))
			{
				foreach($arg as $key=>$val)
				{
					$keys.=$key;
					$value.="'".$val."'";
					if($i>=count($arg)) 
						break;
					$keys.=',';$value.=',';
					$i++;
				}
			}
			else
			{	
				foreach($arg as $val)
				{
					$value.="'".$val."'";
					if($i>=count($arg)) 
						break;
					$value.=',';
					$i++;
				}
			}
		
		if($keys!='')
			$sql.=" ( ".$keys." ) ";
		$sql.="VALUES ( ".$value." )";
		//echo $sql;
		return $this->query($sql);
		}
		
		public function insertId()
		{
			return mysql_insert_id();
		}
		
		
		
		public function f_arr($query)
		{
			return mysql_fetch_array($query);
		}
		
		public function f_row($query)
		{
			return mysql_fetch_row($query);
		}
		
		public function rows($query)
		{
			return mysql_num_rows($query);
		}
		
		private function close_connection()
		{
			mysql_close($this->connection);
		}
		
		public function aff_row()
		{
			return mysql_affected_rows();
		}
		
			
	}
	
	$db=new MysqlDatbase;


?>