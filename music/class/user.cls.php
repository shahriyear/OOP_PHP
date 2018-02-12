<?php
	
	class UserLoginInfo{
		
		private $table='music_login';
		public $uid='uid';
		public $name='Name';
		public $email='Email';
		public $uname='username';
		public $pass='password';
		public $utype='usertype';
		public $login=false;
		
		function __construct()
		{
			if(isset($_SESSION[session]) && !empty($_SESSION[session]))
				$this->login=true;
		}
		
		public function is_login()
		{
			if($this->login==false)
				return false;
			return true;
		}
		
		public function auth()
		{
			if(!$this->is_login())
				redirect("login.php");
		}
		
		
		public function login($user,$pass)
		{
			global $db;
			$query=$db->select($this->table,array($this->uname=>$user,$this->pass=>$pass),1);
			$row=$db->rows($query);
			if($row>0)
			{
				$user=$db->f_arr($query);
				$_SESSION[session]=$user[$this->uid];
				session_write_close();
				redirect("index.php");
			}
			else
			{
				return "Invalide username or password";
			}
		}
		
		public function logout()
		{
			unset($_SESSION[session]);
			$this->login=false;
			redirect("login.php");
		}
		
		public function new_user($arg)
		{
			global $db;
			if($this->check_user_name($arg[$this->uname]))
				return "This user Name already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "User created";
			return false;
		}
		
		private function check_user_name($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->uname=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
		public function print_all_user()
		{
			global $db;
			$output='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>{$arr[$this->uid]}</td>
								<td>".$arr[$this->name]."</td>
								<td>".$arr[$this->email]."</td>
								<td>".$arr[$this->uname]."</td>
								<td>".$arr[$this->pass]."</td>
								<td><a href=\"edit.php?cmd=user&id={$arr[$this->uid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=user&id={$arr[$this->uid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->uid=>$id));
			if($db->aff_row()>0)
			redirect("user_print.php");
				return "Deleted";
			return "Nothing find";	
		}
		
				public function edit_user($arg)
		{
			global $db;
			$user=$db->f_arr($db->select($this->table,array($this->uid=>$arg)));
			$var='<form action="" method="post" enctype="multipart/form-data"><br />
			Name:	
			<input type="text" value="'.$user[$this->name].'" val name="'.$this->name.'" />
			Email:	
			<input type="text" value="'.$user[$this->email].'" val name="'.$this->email.'" /><br/>
			User Name:	
			<input type="text" value="'.$user[$this->uname].'" val name="'.$this->uname.'" />
			Password:	
			<input type="text" value="'.$user[$this->pass].'" val name="'.$this->pass.'" />
			
			<input type="submit" name="updatebtn" class="btn" value="Update" />
			</form>';
			echo $var;
		}
		
				public function update_user($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->uid=>$id));
			if($db->aff_row()>0)
			redirect("user_print.php");
				return "Updated";
			return false;
		}
		
		public function user_by_id($id,$agr=NULL)
		{
			global $db;
			$query=$db->select($this->table,array($this->uid=>$id));
			$user=$db->f_arr($query);
			if($agr!=NULL)
				return $user[$agr];
			return $user[$this->uname];
		}
		
	}

$user=new UserLoginInfo;

?>