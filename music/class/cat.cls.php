<?php
	
	class Catinfo{
		
		private $table='music_catagory';
		public $cid='cid';
		public $name='c_name';
		
		
		public function new_cate($arg)
		{
			global $db;
			if($this->check_cat_name($arg[$this->name]))
				return "This Category Name already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "category created";
			return false;
		}
		
		private function check_cat_name($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->name=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
		public function get_catAsOption($arg=NULL)
		{
			global $db;
			$out='';
			$select='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				if($arg==$arr[$this->cid])
				$select='selected="selected"';
				$out.='<option '.$select.' value="'.$arr[$this->cid].'">'.$arr[$this->name].'</option>';
				$select='';
			}
			return $out;
		}
		
		public function catByid($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->cid=>$arg)));
			return $cat[$this->name];
		}
		
		
		
		public function print_all_cat()
		{
			global $db;
			$output='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>{$arr[$this->cid]}</td>
								<td>".$arr[$this->name]."</td>
								<td><a href=\"edit.php?cmd=cat&id={$arr[$this->cid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=cat&id={$arr[$this->cid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->cid=>$id));
			if($db->aff_row()>0)
			redirect("cate_print.php");
				return "Deleted";
			return "Nothing find";	
		}
		
				public function edit_cate($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->cid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Gener Name:	
			<input type="text" value="'.$cat[$this->name].'" val name="'.$this->name.'" />
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_cat($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->cid=>$id));
			if($db->aff_row()>0)
			redirect("cate_print.php");
				return "Updated";
			return false;
		}
		
		
	}

$cat=new Catinfo;

?>