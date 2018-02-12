<?php
	
	class Generinfo{
		
		private $table='music_gener';
		public $gid='g_id';
		public $name='g_name';
		
		
		public function new_gener($arg)
		{
			global $db;
			if($this->check_gener_name($arg[$this->name]))
				return "This Gener Name already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "gener created";
			return false;
		}
		
		private function check_gener_name($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->name=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->gid=>$id));
			if($db->aff_row()>0)
			redirect("gener_print.php");
				return "Deleted";
			return "Nothing find";	
		}
		
		public function get_catAsOption($arg=NULL)
		{
			global $db;
			$out='';
			$select='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				if($arg==$arr[$this->gid])
				$select='selected="selected"';
				$out.='<option '.$select.' value="'.$arr[$this->gid].'">'.$arr[$this->name].'</option>'; 
				$select='';
			}
			return $out;
		}
		
		public function generByid($arg)
		{
			global $db;
			$gener=$db->f_arr($db->select($this->table,array($this->gid=>$arg)));
			return $gener[$this->name];
		}
		
		
		
		public function print_all_gener()
		{
			global $db;
			$output='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>{$arr[$this->gid]}</td>
								<td>".$arr[$this->name]."</td>
								<td><a href=\"edit.php?cmd=gener&id={$arr[$this->gid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=gener&id={$arr[$this->gid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function edit_gener($arg)
		{
			global $db;
			$gener=$db->f_arr($db->select($this->table,array($this->gid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Gener Name:	
			<input type="text" value="'.$gener[$this->name].'" val name="'.$this->name.'" />
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_gener($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->gid=>$id));
			if($db->aff_row()>0)
			redirect("gener_print.php");
				return "Updated";
			return false;
			
		}
		
		
	}

$gener=new Generinfo;

?>