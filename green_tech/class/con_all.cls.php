<?php
	
	class MyContactInfo{
		
		private $table='con_info';
		public $cid='id';
		public $subid='sub_id';
		public $name='name';
		public $phone='phone';
		public $add='adress';
		
		
		
		public function new_con_info($arg)
		{
			global $db;
			if($this->check_detils_info($arg[$this->name]))
				return "This Name Information already added";
			$arg=array_filter($arg);
			//p_r($arg);
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
			
	
		
		/*public function get_catAsOption($arg=NULL)
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
		}*/
		

		
		
		
		
		public function print_all_con_info()
		{
			global $db, $contact;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->cid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>".$arr[$this->cid]."</td>
								<td>".$arr[$this->name]."</td>
								<td>".$contact->optByid($arr[$this->subid])."</td>
								<td>".$arr[$this->phone]."</td>
								<td>".$arr[$this->add]."</td>
								<td><a href=\"edit.php?cmd=conta&id={$arr[$this->cid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=conta&id={$arr[$this->cid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
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
			redirect("conAll_print.php");
				//return "Deleted";
			return "Nothing find";	
		}
		
				public function edit_con_info($arg)
		{
			global $db, $contact;
			$cat=$db->f_arr($db->select($this->table,array($this->cid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Name	&nbsp;&nbsp;&nbsp;
			<input type="text" value="'.$cat[$this->name].'" val name="'.$this->name.'" /><br />
			Option&nbsp;&nbsp;&nbsp;
	<select name="'.$this->subid.'">
		<option value="" >Select One</option>
		'.$contact->get_conAsOption($cat[$this->subid]).'
	</select><br/>
			Number&nbsp;
			<input type="text" value="'.$cat[$this->phone].'" val name="'.$this->phone.'" /><br />
			Address&nbsp;
			<input type="text" value="'.$cat[$this->add].'" val name="'.$this->add.'" /><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
		
		
		public function update_con_info($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->cid=>$id));
			if($db->aff_row()>0)
			redirect("conAll_print.php");
				//return "Updated";
			return false;
		}
		
		
	}

$conInfo=new MyContactInfo;

?>