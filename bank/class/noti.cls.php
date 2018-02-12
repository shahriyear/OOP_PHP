<?php
	class NotifictionInfo extends MysqlDatbase
	{
		private $table='notifiction';
		public $nid='nid';
		public $n_text='n_text';
		public $tid='t_id';
		public $status='status';
		public $uid='uid';
		
		public function push($tid,$txt,$type)
		{
			global $tran,$user;
			$type=strtolower($type);
			if($type=="send")
				{
					$userid=$tran->userid_by_tranid($tid);
					$b_id=$user->user_by_id($userid,$user->bid);
					$all_uesr=$user->all_user_by_branc_id($b_id);
				}
				elseif($type=="receive")
				{
					$receivid=$tran->receive_brance_id($tid);
					$all_uesr=$user->all_user_by_branc_id($receivid);
				}
				else 
				return false;
			foreach($all_uesr as $u_id)
			$query=$this->insert($this->table,array($this->tid=>$tid,$this->n_text=>$txt,$this->status=>'UnRead',$this->uid=>$u_id));
			if($this->aff_row()>0)
				return true;
			return false;
		}
		
		public function desplay_not($uid=NULL)
		{
			global $user,$tran;
			$output='';
			if($uid==NULL)
				$uid=$user->current_user();
			$query=$this->select($this->table,array($this->uid=>$uid,$this->status=>"UnRead")," ORDER BY {$this->nid} DESC ");
			while($arr=$this->f_arr($query))
			{
				$output.='<li><a href="detail.php?cmd=tran&id='.$arr[$this->tid].'">'.$arr[$this->n_text].'</a></li>';
			}
			return $output;
		}
		
		public function total_not($uid=NULL)
		{
			global $user,$tran;
			$output='';
			if($uid==NULL)
				$uid=$user->current_user();
			$query=$this->select($this->table,array($this->uid=>$uid,$this->status=>'UnRead'));
				return $this->rows($query);
		}
		
		public function read_not($uid=NULL)
		{
			global $user;
			if($uid==NULL)
				$uid=$user->current_user();
			$update=$this->update($this->table,array($this->status=>'Read'),array($this->uid=>$uid));
		}
		
		private function notfi_by_tid($tid,$field=NULL)
		{
			$noti=$this->f_arr($this->select($this->table,array($this->tid=>$tid)));
			if($field!=NULL)
				return $noti[$field];
			return $noti[$this->nid];
		}
		
		private function is_exits($trn)
		{
			$row=$this->rows($this->select($this->table,array($this->tid=>$trn)));
			return $row;
		}
		
	}
$notifi=new NotifictionInfo;

?>