<?php
	
	class Expenseinfo{
		
		private $table='buy';
		public $cid='id';
		public $b_date='Date';
		public $detils='Detils';
		public $money='Money';
		
		
		public function new_buy($arg)
		{
			global $db;
			$arg=array_filter($arg);
			$arg[$this->b_date]=date("Y-m-d");
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Addad";
			return false;
		}
		
		public function print_all_buy()
		{
			global $db;
			$output='';
			$add=0;
			$query=$db->select($this->table,NULL,"{$this->cid} DESC",NULL);
			while($arr=$db->f_arr($query))
			{
				$add+=$arr[$this->money];
				$output.='<tr>';
				$output.="<td>".$arr[$this->cid]."</td>
								<td>".$arr[$this->b_date]."</td>
								<td>".$arr[$this->detils]."</td>
								<td>".$arr[$this->money]."</td>";
				$output.='</tr>';
			}
			$output.='<tr><td style="text-align:right" colspan="3">Total</td><td style="text-align:left">'.$add.'</td><tr>';
			
			
			echo $output;
		}
		
	/*	public function get_detils_id($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->name=>$arg));
			$row=$db->f_arr($query);
			return $row[$this->cid];
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
		}*/
		
		
	}

$expense=new Expenseinfo;

?>