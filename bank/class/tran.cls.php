<?php
	
	class TransctionInfo extends MysqlDatbase
	{
		private $table='transction';
		public $tid='tid';
		public $sname='sname';
		public $sphone='sphone';
		public $rname='rname';
		public $rphone='rphone';
		public $trtime='trtime';
		public $trdate='trdate';
		public $sbr_id='sbr_id';
		public $rbr_id='rbr_id';
		public $uid='uid';
		public $ammount='ammount';
		public $clearance='clearance';
		public $comments='comments';
		
		public function new_tran($arg)
		{	global $user,$notifi,$branch;
			$userId=$user->current_user();
			$branch_name=$branch->branch_by_id($user->user_by_id($userId,$user->bid));
			$mess="There is a money order pending. Sending from ".$branch_name." Branch";
			$arg[$this->trtime]=date("H:i:s");
			$arg[$this->trdate]=date("Y-m-d");
			$arg[$this->uid]=$userId;
			$arg[$this->sbr_id]=$user->user_by_id($userId,$user->bid);
			$arg[$this->clearance]="NO";
			$arg=array_filter($arg);
			$this->insert($this->table,$arg);
			$notifi->push($this->insertId(),$mess,'receive');
			if($this->aff_row()>0)
				return "succes";
			return "Fail";
		}
		
		
				public function print_all_tran()
		{
			global $db,$user,$branch;
			$output='';
			$cuser=$user->current_user();
			$br_id=$user->user_by_id($cuser,$user->bid);
			$query=$db->select($this->table,array($this->rbr_id=>$br_id,$this->uid=>$cuser),"ORDER BY {$this->tid} DESC",NULL,' OR ');
			while($arr=$db->f_arr($query))
			{	
				$output.='<tr>';
				$output.="<td>".$user->user_by_id($arr[$this->uid],$user->name)."</td>
								<td>".$arr[$this->tid]."</td>
								<td>".$arr[$this->sname]."</td>
								<td>".$arr[$this->sphone]."</td>
								<td>".$arr[$this->rname]."</td>
								<td>".$arr[$this->rphone]."</td>
								<td>".$arr[$this->trtime]."</td>
								<td>".$arr[$this->trdate]."</td>
								<td>".$branch->branch_by_id($user->user_by_id($arr[$this->uid],$user->bid))."</td>
								<td>".$branch->branch_by_id($arr[$this->rbr_id])."</td>
								<td>".$arr[$this->ammount]."</td>
								<td>".$arr[$this->clearance]."</td>
								<td><a href=\"detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>";
				$output.='</tr>';
			}
			echo $output;
		}
		
		public function unclear($bid=NULL)
		{
			global $user;
			$userid= $user->current_user();
			$retunn=array();
			if($bid==NULL)
				$bid=$user->user_by_id($userid,'bid');
			$query=$this->select($this->table,array($this->rbr_id=>$bid));
			while($arr=$this->f_arr($query))
				$retunn[]=$arr[$this->tid];
			return $retunn;
		}
		
			public function details($trn)
		{
			global $db,$user,$branch;
			$output='';
			$cuser=$user->current_user();
			$br_id=$user->user_by_id($cuser,$user->bid);
			$query=$db->select($this->table,array($this->tid=>$trn));
			while($arr=$db->f_arr($query))
			{	$var1='';
				 $var2='';
				 if($arr[$this->clearance]=="YES" || $arr[$this->sbr_id]==$br_id)
				 {
					 $var1='disabled="disabled"';
					 $var2='disabled="disabled"';
				}
				elseif($arr[$this->clearance]=="Reject")
				{
					$var2='disabled="disabled"';
				}
				$output.="
				<table border=\"1px solid red\" height=\"auto\" width=\"600px\" align=\"center\">
				<tr><td>Incharge Name: </td><td>".$user->user_by_id($arr[$this->uid],$user->name)."</td></tr>
								<tr><td>Transection Id: </td><td>".$arr[$this->tid]."</td></tr>
								<tr><td>Sender Name: </td><td>".$arr[$this->sname]."</td></tr>
								<tr><td>Sender Phone: </td><td>".$arr[$this->sphone]."</td></tr>
								<tr><td>Receiver Name: </td><td>".$arr[$this->rname]."</td></tr>
								<tr><td>Receiver Phone: </td><td>".$arr[$this->rphone]."</td></tr>
								<tr><td>Time: </td><td>".$arr[$this->trtime]."</td></tr>
								<tr><td>Date: </td><td> ".$arr[$this->trdate]."</td></tr>
								<tr><td>Sender Branch: </td><td>".$branch->branch_by_id($user->user_by_id($arr[$this->uid],$user->bid))."</td></tr>
								<tr><td>Receiver Branch: </td><td>".$branch->branch_by_id($arr[$this->rbr_id])."</td></tr>
								<tr><td>Amount: </td><td>".$arr[$this->ammount]."</td></tr>
								<tr><td>Comment:</td><td><textarea name=\"comment\" {$var1} cols=\"3\" rows=\"3\">".$arr[$this->comments]."</textarea></td></tr>
								<tr><td><input type=\"submit\" name=\"allow\" value=\"Aecpt\" {$var1} /> </td>
									<td><input type=\"submit\" name=\"reject\" value=\"Reject\" {$var2} /></td></tr>
									
									</table>";
			}
			echo $output;
		}
		
		public function update_by_id($id,$arr)
		{
			global $db;
			$db->update($this->table,$arr,array($this->tid=>$id));
				if($db->aff_row()>0)
					return true;
				return false;
		}	
		
		public function userid_by_tranid($id)
		{
			global $db;
			$query=$db->select($this->table,array($this->tid=>$id));
			$var=$db->f_arr($query);
				return $var[$this->uid];
		}
		public function receive_brance_id($tid)
		{
			global $db,$tran;
			$query=$db->select($this->table,array($this->tid=>$tid));
			$brance=$db->f_arr($query);
				return $brance[$this->rbr_id];
		}
		
		public function print_yes_tran()
		{
			global $db,$user,$branch;
			$output='';
			$cuser=$user->current_user();
			$br_id=$user->user_by_id($cuser,$user->bid);
			$query=$db->select($this->table,array($this->rbr_id=>$br_id,$this->uid=>$cuser),"ORDER BY {$this->tid} DESC",NULL,' OR ');
			while($arr=$db->f_arr($query))
			{	
				if($arr[$this->clearance]!="YES")
					continue;
				$output.='<tr>';
				$output.="<td>".$user->user_by_id($arr[$this->uid],$user->name)."</td>
								<td>".$arr[$this->tid]."</td>
								<td>".$arr[$this->sname]."</td>
								<td>".$arr[$this->sphone]."</td>
								<td>".$arr[$this->rname]."</td>
								<td>".$arr[$this->rphone]."</td>
								<td>".$arr[$this->trtime]."</td>
								<td>".$arr[$this->trdate]."</td>
								<td>".$branch->branch_by_id($user->user_by_id($arr[$this->uid],$user->bid))."</td>
								<td>".$branch->branch_by_id($arr[$this->rbr_id])."</td>
								<td>".$arr[$this->ammount]."</td>
								<td><a href=\"detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>";
				$output.='</tr>';
			}
			echo $output;
		}
		
		public function print_reject_tran()
		{
			global $db,$user,$branch;
			$output='';
			$cuser=$user->current_user();
			$br_id=$user->user_by_id($cuser,$user->bid);
			$query=$db->select($this->table,array($this->rbr_id=>$br_id,$this->uid=>$cuser),"ORDER BY {$this->tid} DESC",NULL,' OR ');
			while($arr=$db->f_arr($query))
			{	
				if($arr[$this->clearance]!="Reject")
					continue;
				$output.='<tr>';
				$output.="<td>".$user->user_by_id($arr[$this->uid],$user->name)."</td>
								<td>".$arr[$this->tid]."</td>
								<td>".$arr[$this->sname]."</td>
								<td>".$arr[$this->sphone]."</td>
								<td>".$arr[$this->rname]."</td>
								<td>".$arr[$this->rphone]."</td>
								<td>".$arr[$this->trtime]."</td>
								<td>".$arr[$this->trdate]."</td>
								<td>".$branch->branch_by_id($user->user_by_id($arr[$this->uid],$user->bid))."</td>
								<td>".$branch->branch_by_id($arr[$this->rbr_id])."</td>
								<td>".$arr[$this->ammount]."</td>
								<td><a href=\"detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>";
				$output.='</tr>';
			}
			echo $output;
		}
		
		public function print_no_tran()
		{
			global $db,$user,$branch;
			$output='';
			$cuser=$user->current_user();
			$br_id=$user->user_by_id($cuser,$user->bid);
			$query=$db->select($this->table,array($this->rbr_id=>$br_id,$this->uid=>$cuser),"ORDER BY {$this->tid} DESC",NULL,' OR ');
			while($arr=$db->f_arr($query))
			{	
				if($arr[$this->clearance]!="NO")
					continue;
				$output.='<tr>';
				$output.="<td>".$user->user_by_id($arr[$this->uid],$user->name)."</td>
								<td>".$arr[$this->tid]."</td>
								<td>".$arr[$this->sname]."</td>
								<td>".$arr[$this->sphone]."</td>
								<td>".$arr[$this->rname]."</td>
								<td>".$arr[$this->rphone]."</td>
								<td>".$arr[$this->trtime]."</td>
								<td>".$arr[$this->trdate]."</td>
								<td>".$branch->branch_by_id($user->user_by_id($arr[$this->uid],$user->bid))."</td>
								<td>".$branch->branch_by_id($arr[$this->rbr_id])."</td>
								<td>".$arr[$this->ammount]."</td>
								<td><a href=\"detail.php?cmd=tran&id={$arr[$this->tid]}\"><i class=\"icon-edit\"></i></a>";
				$output.='</tr>';
			}
			echo $output;
		}
		
		public function all_tran_details($userid=NULL,$startingdate=NULL,$endingdate=NULL)
		{
			global $user;
			if($userid==NULL)
			$userid=$user->current_user();
			$brid=$user->user_by_id($userid,$user->bid);
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
			//SELECT * FROM `transction` WHERE `rbr_id` =1 AND `clearance`='YES'
			$querytxt="SELECT {$this->sbr_id}, SUM({$this->ammount}) AS {$this->ammount},{$this->trdate} FROM {$this->table} WHERE {$this->rbr_id}={$brid} AND {$this->clearance}='YES'";
			$querytxt.=" AND ( {$this->trdate} BETWEEN '{$startingdate}' AND '{$endingdate}' ) GROUP BY {$this->sbr_id}";
			$query=$this->query($querytxt);
			if($this->rows($query)==0)
			return '<tr><td colspan="2" style="background:#CCC">No Transection Make betwin those date</td></tr>';
			$out='';
			$total=0;
			global $branch;
			while($var=$this->f_row($query))
			{	settype($var[1],"float");
				$out.='<tr>';
				$out.="<td>".$branch->branch_by_id($var[0])."</td>";
				$out.='<td>'.formatMoney($var[1]).'</td>';
				$out.='</tr>';
				$total+=$var[1];
			}
			$out.='<tr style="background:#CCC"><td style="background:#CCC" >Total Amount:</td><td style="background:#CCC">'.formatMoney($total).'</td></tr>';
			return $out;
		}
		
		
		public function all_tran_details_my($userid=NULL,$startingdate=NULL,$endingdate=NULL)
		{
			global $user;
			if($userid==NULL)
			$userid=$user->current_user();
			$brid=$user->user_by_id($userid,$user->bid);
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
			//SELECT * FROM `transction` WHERE `rbr_id` =1 AND `clearance`='YES'
			$querytxt="SELECT {$this->rbr_id}, SUM({$this->ammount}) AS {$this->ammount},{$this->trdate} FROM {$this->table} WHERE {$this->sbr_id}={$brid} AND {$this->clearance}='YES'";
			$querytxt.=" AND ( {$this->trdate} BETWEEN '{$startingdate}' AND '{$endingdate}' ) GROUP BY {$this->rbr_id}";
			$query=$this->query($querytxt);
			if($this->rows($query)==0)
			return '<tr><td colspan="2" style="background:#CCC">No Transection Make betwin those date</td></tr>';
			$out='';
			$total=0;
			global $branch;
			while($var=$this->f_row($query))
			{
				settype($var[1],"float");
				$out.='<tr>';
				$out.="<td>".$branch->branch_by_id($var[0])."</td>";
				$out.='<td>'.formatMoney($var[1]).'</td>';
				$out.='</tr>';
				$total+=$var[1];
			}
			$out.='<tr><td style="background:#CCC">Total Amount:</td><td style="background:#CCC">'.formatMoney($total).'</td></tr>';
			return $out;
		}
		
	}
$tran=new TransctionInfo;

?>
