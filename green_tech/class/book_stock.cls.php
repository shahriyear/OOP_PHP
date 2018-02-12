<?php
class StockBook{
	private $table='stock_book';
	public $st_id='id';
	public $bk_id='book_id';
	public $total_bk='total_book';
	public $current_bk='current_book';
	public $free_cp='free_copy';
	
	/*public function newStock($arg)
	{
			global $db;
			$arg=array_filter($arg);
			$db->insert($this->table,$arg);
			if($db->aff_row()>0)
				return "Created";
			return false;
	}
*/		
}

$stock=new StockBook;

?>