<?php
	
	class MyContact{
		
		private $table='con_det';
		public $cid='id';
		public $name='name';
		
		
		public function new_con($arg)
		{
			global $db;
			if($this->check_detils_info($arg[$this->name]))
				return "This Detils Information already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Information created";
			return false;
		}
		
		public function check_detils_info($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->name=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
	
	
		
		
		public function get_conAsOption($arg=NULL)
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
		

		public function optByid($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->cid=>$arg)));
			return $cat[$this->name];
		}
		
		public function print_all_con()
		{
			global $db;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->cid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>".$arr[$this->cid]."</td>
								<td>".$arr[$this->name]."</td>
								<td><a href=\"edit.php?cmd=con&id={$arr[$this->cid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=con&id={$arr[$this->cid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function suggest(){
			global $db;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->cid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.="'".$arr[$this->name]."'";
				$output.=',';
			}
			
			
			echo $output;
			
			}
		
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->cid=>$id));
			if($db->aff_row()>0)
			redirect("con_print.php");
				//return "Deleted";
			return "Nothing find";	
		}
		
				public function edit_con($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->cid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			 Item Name	
			<input type="text" value="'.$cat[$this->name].'" val name="'.$this->name.'" />
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_con($update,$id)
		{
			global $db,$tran;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->cid=>$id));
			if($db->aff_row()>0)
			{
				$tran->update_in(array($tran->tdetils=>$update[$this->name]),$tran->D_id,$id);
			redirect("con_print.php");
			}
			return false;
		}
		
		
	}

$contact=new MyContact;

?>