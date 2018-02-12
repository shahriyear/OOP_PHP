<?php
	
	class BranchInfo
	{
		private $table='brance';
		public $bid='bid';
		public $name='bname';
		
		
		public function new_branch($arg)
		{
			global $db;
			if($this->check_branch_name($arg[$this->name]))
				return "This Branch Name already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Branch Created";
			return false;
		}
		
		private function check_branch_name($arg)
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
			$db->delete($this->table,array($this->bid=>$id));
			if($db->aff_row()>0)
				return "Deleted";
			return "Nothing find";	
		}
		
		public function print_all_branch()
		{
			global $db;
			$output='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>{$arr[$this->bid]}</td>
								<td>".$arr[$this->name]."</td>
								<td><a href=\"edit.php?cmd=branch&id={$arr[$this->bid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=branch&id={$arr[$this->bid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function edit_branch($arg)
		{
			global $db;
			$branch=$db->f_arr($db->select($this->table,array($this->bid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Branch Id:	
			<input type="text" value="'.$branch[$this->bid].'" val name="'.$this->bid.'" />
			
			Branch Name:	
			<input type="text" value="'.$branch[$this->name].'" val name="'.$this->name.'" />
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_branch($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->bid=>$id));
			if($db->aff_row()>0)
				return "Updated";
			return false;
			
		}
		
		
		public function get_banAsOption($arg=NULL,$ignor=NULL)
		{
			global $db;
			$out='';
			$select='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				if($arr[$this->bid]==$ignor)
					continue;
				if($arg==$arr[$this->bid])
				$select='selected="selected"';
				$out.='<option '.$select.' value="'.$arr[$this->bid].'">'.$arr[$this->name].'</option>'; 
				$select='';
			}
			return $out;
		}
		
		public function branch_by_id($id,$agr=NULL)
		{
			global $db;
			$query=$db->select($this->table,array($this->bid=>$id));
			$user=$db->f_arr($query);
			if($agr!=NULL)
				return $user[$agr];
			return $user[$this->name];
		}
		
	
		

	}
$branch=new BranchInfo;

?>