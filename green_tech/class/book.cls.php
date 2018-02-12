<?php 

class BookInfo{
	
	private $table='gt_book';
	public $bid='id';
	public $name='name';
	public $scode='sub_code';
	public $total_bk='total_book';
	public $current_bk='current_bok';
	public $free_copy='extra';

	
	public function new_book($arg)
		{
			global $db;
			if($this->check_book_info($arg[$this->name]))
				return "This Book Name already added";
			if($this->check_code_info($arg[$this->scode]))
				return "This Subject Code already added";
			$arg=array_filter($arg);
			$total=$arg[$this->total_bk];
			$free=$arg[$this->free_copy];
			$arg[$this->current_bk]=$total-$free;
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Information created";
			return false;
		}
		
		public function get_book_id($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->scode=>$arg));
			$row=$db->f_arr($query);
			//p_r($row);
			return $row[$this->bid];
				}
			public function get_book_name($arg)
			{
				global $db;
				$query=$db->select($this->table,array($this->scode=>$arg));
				$row=$db->f_arr($query);
				return $row[$this->name];
			}
		
		
		public function check_book_info($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->name=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		public function check_code_info($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->scode=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
		public function suggest_code(){
			global $db;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->bid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.="'".$arr[$this->scode]."'";
				$output.=',';
			}
			echo $output;
		}
		public function suggest_book(){
			global $db;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->bid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.="'".$arr[$this->name]."'";
				$output.=',';
			}
			echo $output;
		}
		public function print_all_book()
		{
			global $db;
			$output='';
			$query=$db->select($this->table,NULL,"{$this->bid} DESC ",NULL);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>".$arr[$this->bid]."</td>
								<td>".$arr[$this->name]."</td>
								<td>".$arr[$this->scode]."</td>
								<td>".$arr[$this->total_bk]."</td>
								<td>".$arr[$this->free_copy]."</td>
								<td>".$arr[$this->current_bk]."</td>
								<td><a href=\"edit.php?cmd=book&id={$arr[$this->bid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=book&id={$arr[$this->bid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>
			<td><div><input type=\"button\" class=\"btn newBook\" data-id=\"{$arr[$this->bid]}\" value=\"New Book\"/>
			</div>
    <div><input type=\"button\" class=\"btn freeCopy\" data-id=\"{$arr[$this->bid]}\" value=\"Free Copy\" />
    </div></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function getTotal_book($arg)
		{
			global $db;
			$id=$arg[$this->bid];
			$query=$db->select($this->table,array($this->bid=>$id));
			$bk=$db->f_arr($query);
			$newBook=$bk[$this->total_bk]+$arg[$this->total_bk];
			$free=$bk[$this->free_copy];
			$current=$newBook-$free;
			$db->update($this->table,array($this->total_bk=>$newBook,$this->current_bk=>$current),array($this->bid=>$id));
//			redirect("book_print.php"); 
			
		}
		
		public function getCurrent_book($arg)
		{
			global $db;
			$id=$arg[$this->bid];
			$query=$db->select($this->table,array($this->bid=>$id));
			$cr=$db->f_arr($query);
			$newFree=$cr[$this->free_copy]+$arg[$this->free_copy];
			$curr=$cr[$this->current_bk]-$arg[$this->free_copy];
			$db->update($this->table,array($this->free_copy=>$newFree,$this->current_bk=>$curr),array($this->bid=>$id));
			
		}
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->bid=>$id));
			if($db->aff_row()>0)
			redirect("book_print.php");
				return "Nothing found!!";	
		}
		
				public function edit_book($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->bid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Book Name	&nbsp;
			<input type="text" value="'.$cat[$this->name].'" val name="'.$this->name.'" /><br />
			Sub Code &nbsp;&nbsp;&nbsp;
			<input type="text" value="'.$cat[$this->scode].'" val name="'.$this->scode.'" />
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_book($update,$id)
		{
			global $db,$tran;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->bid=>$id));
			if($db->aff_row()>0)
			{
			$tran->update_in(array($tran->s_name=>$update[$this->name]),$tran->s_id,$id);
			$tran->update_in(array($tran->s_code=>$update[$this->scode]),$tran->s_id,$id);
			redirect("book_print.php");
			}
			return false;
		}
		
	}
	

$book=new BookInfo;

?>