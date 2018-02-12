<?php
	
	class Musicinfo{
		
		private $table='music_table';
		public $mid='mid';
		public $title='m_title';
		public $cid='cat_id';
		public $artist='artist';
		public $m_path='path';
		public $album='album';
		public $year='year';
		public $gid='gener_id';
		public $m_length='length';
		public $bitrate='bitrate';
		public $image='image';
		
		
		public function new_music($arg)
		{
			global $db;
			if($this->check_music_title($arg[$this->title]))
				return "This Music Name already added";
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Added";
			return false;	
		}
		
		private function check_music_title($arg)
		{
			global $db;
			$query=$db->select($this->table,array($this->title=>$arg));
			$row=$db->rows($query);
			if($row>0)
				return true;
			return false;
		}
		
		public function update_music($update,$id)
		{
			global $db;
			$update=array_filter($update);
			$db->update($this->table,$update,array($this->mid=>$id));
			if($db->aff_row()>0)
			redirect("music_print.php");
				return "Updated";
			return false;
		}
		
		public function print_all_music()
		{
			global $db,$gener,$cat;
			$output='';
			$query=$db->select($this->table);
			while($arr=$db->f_arr($query))
			{
				$output.='<tr>';
				$output.="<td>{$arr[$this->mid]}</td>
								<td>{$arr[$this->title]}</td>
								<td>".$cat->catByid($arr[$this->cid])."</td>
								<td>{$arr[$this->artist]}</td>
								<td><img src=\"../img/upload/{$arr[$this->image]}\" width=\"100\" height=\"100\" /></td>
								<td>{$arr[$this->album]}</td>
								<td>{$arr[$this->year]}</td>
								<td>".$gener->generByid($arr[$this->gid])."</td>
								<td>{$arr[$this->bitrate]}</td>
								<td><a href=\"edit.php?cmd=music&id={$arr[$this->mid]}\"><i class=\"icon-edit\"></i></a> | <a href=\"delete.php?cmd=Music&id={$arr[$this->mid]}\" onClick=\"return confirm('Are You Sure');  \"><i class=\"icon-remove\"></i></a></td>";
				$output.='</tr>';
			}
			
			
			echo $output;
		}
		
		
		public function delete($id)
		{
			global $db;
			$db->delete($this->table,array($this->mid=>$id));
			if($db->aff_row()>0)
			redirect("music_print.php");
				return "Deleted";
			return "Nothing find";	
		}

		public function edit_form($arg)
		{
			global $cat,$gener,$db;
			$music=$db->f_arr($db->select($this->table,array($this->mid=>$arg)));
			$var='
			<div class="row-fluid">
			<div class="span9 offset1">
			<form action="" method="post" enctype="multipart/form-data"><br />
	Music Title:
	<input type="text" value="'.$music[$this->title].'" val name="'.$this->title.'" />
	Image:
		<br/>	
	<img src="../img/upload/'.$music[$this->image].'">

	 <input type="file" name="'.$this->image.'" />
	Select Cat
	<select name="'.$this->cid.'">
		<option value="" >Select One</option>
		'.$cat->get_catAsOption($music[$this->cid]).'
	</select><br/>
	Artist:<br/>
	<input type="text" value="'.$music[$this->artist].'" name="'.$this->artist.'" /><br/>
	Path:<br/>
	<input type="file" name="'.$this->m_path.'" /><br/>
	
		
	Album:<br/>
	<input type="text" value="'.$music[$this->album].'" name="'.$this->album.'" /><br/>
	Year:<br/>
	<input type="text" value="'.$music[$this->year].'" name="'.$this->year.'" /><br/>
	Select Gener:<br/>
	<select name="'.$this->gid.'">
		<option value="" >Select One</option>
		'.$gener->get_catAsOption($music[$this->gid]).'
	</select><br/>
	length:<br/>
	<input type="text" value="'.$music[$this->m_length].'" name="'.$this->m_length.'" /><br/>
	Bitrate:<br/>
	<input type="text" value="'.$music[$this->bitrate].'" name="'.$this->bitrate.'" /><br/>
	<input type="submit" name="updatebtn" class="btn" value="Update" />
<br /></form>
</div>
</div>
';
echo $var;
		}
		

		
	}

$Music=new Musicinfo;

?>