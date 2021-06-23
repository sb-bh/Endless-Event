<?php
session_start();
include("config.php");
$eid=$_REQUEST['regemail'];
$email=$eid;
?>

<?php


if(isset($_POST['sub']))
{
if($_REQUEST['sub'])
  {
$enm=$_REQUEST['event'];
$vid=$_REQUEST['venueid'];
$bid=$_REQUEST['bno'];
$did=$_REQUEST['decoid'];
$cid=$_REQUEST['cateid'];
$cu=$_REQUEST['t3'];
$np=$_REQUEST['np'];
$bd=date("Y-m-d");;

if(isset($_POST["txdate"]))
  $vdate=$_POST["txdate"];
else
$vdate="";
    $sta="Booked";

$sel=mysql_query("select vid,edate from bookevent where vid='$vid' and edate='$vdate'");
$arr=mysql_fetch_array($sel);

if(($arr['vid']!=$vid) and ($arr['edate']!=$vdate))
 {
   if(mysql_query("INSERT INTO bookevent(bdate,eventnm,edate,vid,bid,did,cid,custid,plates,cancelflg) values('$bd','$enm','$vdate','$vid','$bid','$did','$cid','$cu','$np','$sta')"))
	   {
	      
	     echo "<html><script language='JavaScript'>alert('Booking is confirmed succesfully.')</script></html>";
	 echo "<script>location.href='home.php? regemail=$eid'</script>";
	   }
	 }
else 
{
echo "<html><script language='JavaScript'>alert('Booking on selected date is already exists')</script></html>";
		echo "<script>location.href='home.php? regemail=$eid'</script>";
}

}
}

?>


<!DOCTYPE html>

<!-- Website template by freewebsitetemplates.com -->

<html>

<head>

	<meta charset="UTF-8">

	<title>Endless Event</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--[if IE 7]>

		<link rel="stylesheet" type="text/css" href="css/ie7.css">

	<![endif]-->
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Javascript Test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="datetimepicker_css.js"></script>

  <script type='text/javascript'>

      function select_venue() 
	{

         var venueid = document.getElementById('venue').value;
         document.getElementById('venueid').value = venueid;

	$(document).ready(function(){
	$('#venue').change(function(){
	$.get('getvenue.php',{venue:$(this).val()},function(data){
	$('#vr').val(data);
 		});
		});
	});
	}


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



      function select_deco() 
	{

         var decoid = document.getElementById('decoration').value;
         document.getElementById('decoid').value = decoid;

	$(document).ready(function(){
	$('#decoration').change(function(){
	$.get('getdeco.php',{decoration:$(this).val()},function(data){
	$('#dr').val(data);
 		});
		});
	});
	}

      function select_cate() 
	{

         var cateid = document.getElementById('catering').value;
         document.getElementById('cateid').value = cateid;

	$(document).ready(function(){
	$('#catering').change(function(){
	$.get('getcate.php',{catering:$(this).val()},function(data){
	$('#mrt').val(data);
 		});
		});
	});
	}

  </script>


</head>


<body>

	<div id="header">

		<div>

			<a href="index.html"><img src="images/logo.png" alt="Image"></a>

			<ul>

				
			<li><a href="index.html">Log Out</a></li>
			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">

		<h2>Book Event</h2>

<center><h1><font face="Times New Roman" size="+6" color="white">Welcome 
	<?php 
	
$sel=mysql_query("select * from custreg where uname='$email'");
  $arr=mysql_fetch_array($sel);
  echo $arr['fname']."&nbsp;".$arr['lname'];
  echo '</font></h1></center>'
  ?>
		<div>

			<div>

				<div id="gallery">


					<div id="paging">


<form method="post" name="f1" onSubmit="return vali()">
<table width=100% border="1" align="center">

<tr>
<td><font size="+1" face="Rockwell">Select Event:</font></td>
  <td><label>
<select name="event" id="event">
	<option value="Marriage">Marriage</option>
	<option value="Engagement">Engagement</option>
	<option value="Birthday">Birthday</option>
	<option value="Naming Ceremony">Naming Ceremony</option>
	<option value="Munj">Munj</option>
    </select></td>

</tr>

<tr>
<td><font size="+1" face="Rockwell">Event Date:</font></td>
<label>
<td>
<input type="Text" id="txdate" name="txdate" maxlength="25" size="25" />
 <img src="images/cal.gif" onclick="javascript:NewCssCal('txdate','ddmmyyyy')" style="cursor:pointer"/>
 </label></td>
</tr>

<tr>
<td><font size="+1" face="Rockwell">Select Venue:</font></td>
  <td><label>
<select name="venue" id="venue" onChange='select_venue();'>
    <option value="select">- select venue -
    <?php 
    $categories=mysql_query("SELECT * FROM venue");

    while ($row=mysql_fetch_array($categories)){

    echo "<option value=$row[venueid]>$row[hname]"; 
 }
    ?>
    </select></td>

<td><font size="+1" face="Rockwell"><b>No</b></font>
<input name="venueid" type="text" id="venueid"readonly="readonly"></td>

<td><font size="+1" face="Rockwell"><b>Rate</b></font>
<input name="vr" type="text" id="vr" readonly="readonly"></td>

<?php
echo '<td><a href="viewvenue.php?regemail=' . $email . '"><h2><font color="#FFFFFF">View Venue</font></h2></a></td>';
?>

</tr>


<tr>
<td><font size="+1" face="Rockwell">Select Band:</font></td>
  <td><label>
<select name="category" id="category" onChange='select_band();'>
    <option value="select">- select Band -
    <?php 
    $categories=mysql_query("SELECT * FROM band");

    //loop through categories table rows
    while ($row=mysql_fetch_array($categories)){

    echo "<option value=$row[bno]>$row[bname]"; 
//    echo "<option value={'rate':$row[brate],'No':$row[bno]}>$row[bname]"; 
 }
    ?>
    </select></td>

<td><font size="+1" face="Rockwell"><b>No</b></font>
<input name="bno" type="text" id="bno"readonly="readonly"></td>

<td><font size="+1" face="Rockwell"><b>Rate</b></font>
<input name="no" type="text" id="no" readonly="readonly"></td>

</tr>



<tr>
<td><font size="+1" face="Rockwell">Select Decoration:</font></td>
  <td><label>
<select name="decoration" id="decoration" onChange='select_deco();'>
    <option value="select">- select Decoration -
    <?php 
    $categories=mysql_query("SELECT * FROM deco");

    while ($row=mysql_fetch_array($categories)){

    echo "<option value=$row[decoid]>$row[dname]"; 
 }
    ?>
    </select></td>

<td><font size="+1" face="Rockwell"><b>No</b></font>
<input name="decoid" type="text" id="decoid"readonly="readonly"></td>

<td><font size="+1" face="Rockwell"><b>Rate</b></font>
<input name="dr" type="text" id="dr" readonly="readonly"></td>

</tr>


<tr>
<td><font size="+1" face="Rockwell">Select Catering:</font></td>
  <td><label>
<select name="catering" id="catering" onChange='select_cate();'>
    <option value="select">- select Catering -
    <?php 
    $categories=mysql_query("SELECT * FROM cate");

    while ($row=mysql_fetch_array($categories)){

    echo "<option value=$row[cateid]>$row[mname]"; 
 }
    ?>
    </select></td>

<td><font size="+1" face="Rockwell"><b>No</b></font>
<input name="cateid" type="text" id="cateid"readonly="readonly"></td>

<td><font size="+1" face="Rockwell"><b>Rate/Head</b></font>
<input name="mrt" type="text" id="mrt" readonly="readonly"></td>


<?php
echo '<td><a href="viewcate.php?regemail=' . $email . '"><h2><font color="#FFFFFF">View Catering</font></h2></a></td>';
?>
</tr>


  <tr>

    <td><input name="t3" type="hidden" id="t3" readonly="readonly" value="<?php echo $eid;?>"></td>
  </tr>


  <tr>
    <td><font size="+1" face="Rockwell"><b>Number of Plates</b></font>
    <td><input name="np" type="text" id="np"></td>
  </tr>


 
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="sub" type="submit" id="sub" value="Submit">
    </center>
    </label></td>
    </tr>

</table>
 </form>
</center>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div id="footer">
		<br><br><br><br><br><br><br>

		<p>Copyright &copy; 2020 | all rights reserved.</p>

		<br><center>Developed by : Nikita Kavde</center>
	</div>

</body>

</html>