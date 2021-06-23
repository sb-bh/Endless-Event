<?php
include("config.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Javascript Test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type='text/javascript'>

      function select_band() 
	{

         var bno = document.getElementById('category').value;
         document.getElementById('bno').value = bno;

	$(document).ready(function(){
	$('#category').change(function(){
	$.get('getInfo.php',{category:$(this).val()},function(data){
	$('#no').val(data);
 		});
		});
	});


	}

  </script>
  </head>
  <body>
      <div style='padding:40px 0 0 40px;'>

<select name="category" id="category" onChange='select_band();'>
    <option value="select">- select one option -
    <?php 
    $categories=mysql_query("SELECT * FROM band");

    //loop through categories table rows
    while ($row=mysql_fetch_array($categories)){

    echo "<option value=$row[bno]>$row[bname]"; 
//    echo "<option value={'rate':$row[brate],'No':$row[bno]}>$row[bname]"; 


 }
    ?>
    </select></td>
      <div style='padding:80px 0 0 40px;'>
         Band No: <input size='8' id='bno' name='bno' readonly="readonly">
         Rate: <input size='8' id='no' name='no' readonly="readonly">
      </div>

  </body>
</html>