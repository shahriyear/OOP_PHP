<?php
	class TransctionInfo extends MysqlDatbase
	{
		private $table='tranction';
		public $tid='T_id';
		public $trdate='Date';
		public $tdetils='Detils';
		public $D_id='D_id';
		public $s_id='sub_id';
		public $s_name='sub_name';
		public $s_code='sub_code';
		public $I_amount='Item_amount';
		public $R_amount='Refund_amount';
		public $Ti_amount='Total_I_amount';
		public $I_rate='Item_rate';
		public $T_money='Total_money';
		public $P_money='Paid_money';
		public $D_money='Due_money';
		
		public function new_tran($arg)
		{	
			//p_r($arg);
			//exit();
			global $db, $dInfo,$book;
			$arg=array_filter($arg);
			$detils=$arg[$this->tdetils];
			$cheak=$dInfo->check_detils_info($detils);
			if($cheak==false)
				$dInfo->new_detils(array($dInfo->name=>$detils));
			$did=$dInfo->get_detils_id($detils);
			$arg[$this->D_id]=$did;
			$code=$arg[$this->s_code];
			$cheak_sub=$book->check_code_info($code);
			if($cheak_sub==false)
				return "This Book is not in your list!! Are you want to <a href='create_book.php'>create it!</a>";
			$arg[$this->s_name]=$book->get_book_name($code);
			$arg[$this->s_id]=$book->get_book_id($code);
			
			$arg[$this->trdate]=date("Y-m-d");
			$item=$arg[$this->I_amount];
			$refundam=0;
			$arg[$this->Ti_amount]=$item-$refundam;
			$perrate=$arg[$this->I_rate];
			$arg[$this->T_money]=$arg[$this->Ti_amount]*$perrate;
			$arg[$this->D_money]=$arg[$this->T_money]-$arg[$this->P_money];
			//p_r($arg);
			//exit();
			$db->insert($this->table,$arg);
			return "Transction Succes!!";
		}
		
		public function print_all_detils()
		{
			global $db;
			$output='';
			$addt=0;
			$addp=0;
			$addd=0;
			$query=$db->select($this->table,NULL,"{$this->tid} DESC",NULL);
			while($arr=$db->f_arr($query))
			{
				$addt+=$arr[$this->T_money];
				$addp+=$arr[$this->P_money];
				$addd+=$arr[$this->D_money];
				$output.='<tr>';
				$output.="<td>".$arr[$this->tid]."</td>
								<td>".$arr[$this->trdate]."</td>
								<td>".$arr[$this->tdetils]."</td>
								<td>".$arr[$this->s_name]."</td>
								<td>".$arr[$this->s_code]."</td>
								<td>".$arr[$this->I_amount]."</td>
								<td>".$arr[$this->R_amount]."</td>
								<td>".$arr[$this->Ti_amount]."</td>
								<td>".$arr[$this->I_rate]."</td>
								<td>".$arr[$this->T_money]."</td>
								<td>".$arr[$this->P_money]."</td>
								<td>".$arr[$this->D_money]."</td>
								<td><a href=\"all_detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>
								<td><div><input type=\"button\" class=\"btn getPaid\" data-id=\"{$arr[$this->tid]}\" value=\"Get Paid\"/></div>
    <div><input type=\"button\" class=\"btn refund\" data-id=\"{$arr[$this->tid]}\" value=\"Refund\" />
    </td>";
				$output.='</tr>';
			}
			$output.='<tr>
								<td style="text-align:right;" colspan="9"></td>
								<td style="text-align:left;background:#CC9">'.$addt.'</td>
								<td style="text-align:left;background:#CC9">'.$addp.'</td>
								<td style="text-align:left;background:#CC9">'.$addd.'</td>
							<tr>';			
			echo $output;
		}
		
		public function print_eran_detils()
		{
			global $db;
			$output='';
			$add=0;
			$query=$db->select($this->table,NULL,"{$this->tid}",NULL);
			while($arr=$db->f_arr($query))
			{
				$add+=$arr[$this->P_money];
				$output.='<tr>';
				$output.="<td>".$arr[$this->trdate]."</td>
								<td>".$arr[$this->tdetils]."</td>
								<td>".$arr[$this->P_money]."</td>";
				$output.='</tr>';
			}
			$output.='<tr><td style="text-align:right" colspan="2">Total</td><td style="text-align:left">'.$add.'</td><tr>';			
			echo $output;
		}
		
		
		public function delete_tran($id)
		{
			global $db;
			$db->delete($this->table,array($this->tid=>$id));
			if($db->aff_row()>0)
			redirect("detils_print.php");
		}
		
				public function edit_tran($arg)
		{
			global $db;
			$cat=$db->f_arr($db->select($this->table,array($this->tid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Tranction Detils:	
			<input type="text" value="'.$cat[$this->tdetils].'" val name="'.$this->tdetils.'" /><br>
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_tran($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->tid=>$id));
			if($db->aff_row()>0)
			redirect("detils_print.php");
				return "Updated";
			return false;
		}
		
		public function update_in($up,$whr,$val)
		{
			$up=$this->update($this->table,$up,array($whr=>$val));
			if($this->aff_row()>0)
				return true;
			return false;
		}
		
		public function refund($arg)
		{
			$id=$arg[$this->tid];
			$query=$this->select($this->table,array($this->tid=>$id));
			$refund=$this->f_arr($query);
			$i_am=$refund[$this->I_amount];
			$r_am=$refund[$this->R_amount]+$arg[$this->R_amount];
			$i_rate=$refund[$this->I_rate];
			$paid=$refund[$this->P_money];
			$t_am=$i_am-$r_am;
			$t_money=$t_am*$i_rate;
			$deu_money=$t_money-$paid;
			$this->update($this->table,array($this->Ti_amount=>$t_am,$this->R_amount=>$r_am,$this->T_money=>$t_money,$this->D_money=>$deu_money),array($this->tid=>$id));
			redirect("detils_print.php");
			
		}
		//working
		public function get_paid($arg)
		{
			$id=$arg[$this->tid];
			$query=$this->select($this->table,array($this->tid=>$id));
			$refund=$this->f_arr($query);
			$new_paid=$refund[$this->P_money]+$arg[$this->P_money];
			$t_money=$refund[$this->T_money];
			$deu=$t_money-$new_paid;
			$this->update($this->table,array($this->P_money=>$new_paid,$this->D_money=>$deu),array($this->tid=>$id));
			redirect("detils_print.php");
			
		}
		
		public function details($trn)
			{
				global $db,$dInfo;
				$output='';
				$query=$db->select($this->table,array($this->tid=>$trn));
				while($arr=$db->f_arr($query))
				{
					$output.="
					<table border=\"1px solid red\" height=\"auto\" width=\"600px\" align=\"center\">
									<tr><td>Date: </td><td>".$arr[$this->trdate]."</td></tr>
									<tr><td>Detils: </td><td>".$arr[$this->tdetils]."</td></tr>
									<tr><td>Detils Id: </td><td>".$arr[$this->D_id]."</td></tr>
									<tr><td>Subject Name: </td><td>".$arr[$this->s_name]."</td></tr>
									<tr><td>Subject Name: </td><td>".$arr[$this->s_code]."</td></tr>
									<tr><td>Item amount: </td><td>".$arr[$this->I_amount]."</td></tr>
									<tr><td>Refund amount: </td><td>".$arr[$this->R_amount]."</td></tr>
									<tr><td>Total amount: </td><td>".$arr[$this->Ti_amount]."</td></tr>
									<tr><td>Item rate: </td><td>".$arr[$this->I_rate]."</td></tr>
									<tr><td>Total Money: </td><td>".$arr[$this->T_money]."</td></tr>
									<tr><td>Paid Money: </td><td>".$arr[$this->P_money]."</td></tr>
									<tr><td>Due Money: </td><td>".$arr[$this->D_money]."</td></tr>
					</table>";
				}
				echo $output;
			}
			
			public function all_tran_details($startingdate=NULL,$endingdate=NULL)
		{
			if($startingdate==NULL && $endingdate==NULL)
				{$startingdate=date("Y-m-d");
				$endingdate=date("Y-m-d");}
			elseif($startingdate!=NULL && $endingdate==NULL)
				{
					$endingdate=date("Y-m-d");
				}
			if(strtotime($startingdate)>strtotime($endingdate))
				{
					return false;
				}
				global $db;
				$que="SELECT * FROM {$this->table} WHERE {$this->trdate} BETWEEN '{$startingdate}' AND '{$endingdate}'";
				$output='';
				$query=$this->query($que);
				if($this->rows($query)==0)
			return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those date!!</td></tr>';
				while($arr=$db->f_arr($query))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>";
					$output.='</tr>';
				}
				echo $output;
		}
		
		
		public function all_tran_details_name($by_name=NULL)
		{
			if($by_name==NULL)
				{$by_name="Nothing Found!!";}
				global $db;
				$que="SELECT * FROM {$this->table} WHERE {$this->tdetils} LIKE'%{$by_name}%'";
				$output='';
				$query=$this->query($que);
				if($this->rows($query)==0)
			return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those Name!!</td></tr>';
				while($arr=$db->f_arr($query))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>";
					$output.='</tr>';
				}
				echo $output;
		}
		
		public function all_tran_details_payment($by_pay=NULL)
		{
			if($by_pay==NULL)
				{$by_pay="Nothing Found!!";}
				global $db;
				$que="SELECT * FROM {$this->table} WHERE {$this->P_money} ='{$by_pay}'";
				$output='';
				$query=$this->query($que);
				if($this->rows($query)==0)
			return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those Payment!!</td></tr>';
				while($arr=$db->f_arr($query))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>";
					$output.='</tr>';
				}
				echo $output;
		}
		
		
		public function all_tran_details_sub($by_sub=NULL)
		{
			if($by_sub==NULL)
				{$by_sub="Nothing Found!!";}
				global $db;
				$que="SELECT * FROM {$this->table} WHERE {$this->s_name} LIKE'%{$by_sub}%'";
				$output='';
				$query=$this->query($que);
				if($this->rows($query)==0)
			return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those Subject Name!!</td></tr>';
				while($arr=$db->f_arr($query))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>";
					$output.='</tr>';
				}
				echo $output;
		}
		
		public function all_tran_details_code($by_sub=NULL)
		{
			if($by_sub==NULL)
				{$by_sub="Nothing Found!!";}
				global $db;
				$que="SELECT * FROM {$this->table} WHERE {$this->s_code} ='{$by_sub}'";
				$output='';
				$query=$this->query($que);
				if($this->rows($query)==0)
			return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those Subject Code!!</td></tr>';
				while($arr=$db->f_arr($query))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>";
					$output.='</tr>';
				}
				echo $output;
		}
		
		//select * from table where book name LIKE '%arg%' OR SubCode=arg
		public function scerch($arg,$startingdate,$endingdate)
		{
		//	if(trim($arg)=='')
			// return "<tr><td colspan='10'>Nothing To Search</td></tr>";
			 global $db;
			 $query=" SELECT * FROM {$this->table} WHERE ";
			 if($arg!=='')
			 {
			 	$query.=" {$this->s_code}='{$arg}' OR {$this->s_name} LIKE '%{$arg}%' OR {$this->P_money}='{$arg}' OR {$this->tdetils} LIKE '%{$arg}%'}";
			 }
			// return false;
			 
			 if(trim($arg)!='' && $startingdate!='' && $endingdate!='')
			 {
				 $query.=' AND ';
			 }
			 
			 if($startingdate!='' && $endingdate!=''){
				if(strtotime($startingdate)<=strtotime($endingdate))
				{
					$startingdate=date('Y-m-d',strtotime($startingdate));
					$endingdate=date('Y-m-d',strtotime($endingdate));
					$query.="{$this->trdate} BETWEEN '{$startingdate}' AND '{$endingdate}'";
				}else {
					 return "<tr><td>Date Combination Not Valid!!</td></tr>";
					 }
			 }
			 
			 $output='';
			 //echo $query;
			 $que=$this->query($query);
			 if($this->rows($que)==0)
				return '<tr><td colspan="11" style="background:#CCC">No Transection Make between those Item!!</td></tr>';
			while($arr=$db->f_arr($que))
				{
					$output.='<tr>';
					$output.="<td>".$arr[$this->tid]."</td>
									<td>".$arr[$this->trdate]."</td>
									<td>".$arr[$this->tdetils]."</td>
									<td>".$arr[$this->s_name]."</td>
									<td>".$arr[$this->s_code]."</td>
									<td>".$arr[$this->I_amount]."</td>
									<td>".$arr[$this->R_amount]."</td>
									<td>".$arr[$this->Ti_amount]."</td>
									<td>".$arr[$this->I_rate]."</td>
									<td>".$arr[$this->T_money]."</td>
									<td>".$arr[$this->P_money]."</td>
									<td>".$arr[$this->D_money]."</td>
									<td><a href=\"all_detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>
								<td><div><input type=\"button\" class=\"btn getPaid\" data-id=\"{$arr[$this->tid]}\" value=\"Get Paid\"/></div>
    <div><input type=\"button\" class=\"btn refund\" data-id=\"{$arr[$this->tid]}\" value=\"Refund\" />
    </td>";
					$output.='</tr>';
				}
				//echo $query;
				echo $output;
			}


}
$tran=new TransctionInfo;

?>
