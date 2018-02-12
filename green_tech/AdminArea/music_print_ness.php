<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../js/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../css/demo.css">
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/typeahead.js"></script>
	<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
	var eventFired = function ( type ) {
		var n = $('#demo_info')[0];
		n.scrollTop = n.scrollHeight;		
	}

	$('#example')
		.on( 'page.dt',   function () { eventFired( 'Page' ); } )
		.dataTable();
} );


	</script>
</head>
<body>
<div class="span12 thumbnail spmar2">
  <h1>GreenTech Publication</h1>
</div>
<div class="container1">
  <div id="wrapper">
    <div id="navMenu">
      <ul>
        <li> <a href="#">User</a>
          <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="create_user.php">Create User</a></li>
            <li><a href="user_print.php">User Details</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Laibery</a>
          <ul>
            <li><a href="create_cate.php">Add Laibery</a></li>
            <li><a href="cate_Print.php">Laibery Name</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Book</a>
          <ul>
            <li><a href="create_book.php">Add Book</a></li>
            <li><a href="book_print.php">Book Name</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Transction</a>
          <ul>
            <li ><a href="tranction.php">Add Tranction</a></li>
            <li><a href="detils_print.php">Transection Info</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Expense</a>
          <ul>
            <li ><a href="create_buy.php">Add Expense</a></li>
            <li ><a href="buy_print.php">Expense Info</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Paid</a>
          <ul>
            <li><a href="eran_print.php">Paid Money</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="#">Contact</a>
          <ul>
            <li><a href="conAll_print.php">Contact Info</a></li>
            <li><a href="create_con_info.php">Contact Info Add</a></li>
            <li><a href="con_print.php">Contact Item</a></li>
            <li><a href="create_con.php">Contact Item Add</a></li>
          </ul>
        </li>
      </ul>
      <ul>
        <li> <a href="detils_print_try.php">Scerch</a>
          <ul>
            <li><a href="detils_print_try.php">Scerch</a></li>
          </ul>
        </li>
      </ul>
      <br class="clearFloat" />
    </div>
  </div>
</div>
<br />
<div class="container1">
<div class="span12 thumbnail spmar">
<script src="../js/print.js"></script>
  <input style="float:right;  margin-bottom:5px; " id="button1" class="btn" type="button" onclick="printContent('container_div')" value="print" />
