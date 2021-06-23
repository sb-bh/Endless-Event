<?php
session_start();
include("config.php");

$i=$_REQUEST['itemno'];


$eid=$_REQUEST['regemail'];
$email=$eid;


$bookamt="30000";
?>

<?php


if(isset($_POST['sub']))
{
if($_REQUEST['sub'])
  {
$bookno=$_REQUEST['bookno'];
$custid=$_REQUEST['t3'];
$mrt=$_REQUEST['mrt'];
$bamt=$_REQUEST['bamt'];
$bank=$_REQUEST['sel2'];
$acno=$_REQUEST['t2'];
$pd=date("Y-m-d");;
$fl="Paid";

$sel=mysql_query("select bookid,flgpay from bookevent where bookid='$bookno' and flgpay='$fl'");
$arr=mysql_fetch_array($sel);

if((($arr['bookid']!=$bookno) and ($arr['flgpay']!=$fl)))
 {
   if(mysql_query("INSERT INTO payment(pdate,bookno,custid,tamt,adv,banknm,acno) values('$pd','$bookno','$custid','$mrt','$bamt','$bank','$acno')"))
	   {

	mysql_query("update bookevent set flgpay='$fl' where bookid='$bookno'");

	     echo "<html><script language='JavaScript'>alert('Payment is succesful.')</script></html>";
	 echo "<script>location.href='viewbill.php?regemail=$eid & itemno=$bookno'</script>";
	   }
	 }
else 
{
echo "<html><script language='JavaScript'>alert('Payment is exists')</script></html>";
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

		<h2>Payment</h2>

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

	<?php
	$sell=mysql_query("select * from bookevent where bookid='$i'");
    $matt=mysql_fetch_array($sell);

$vid=$matt['vid'];
$bid=$matt['bid'];
$did=$matt['did'];
$cid=$matt['cid'];
$np=$matt['plates'];
	?>


<form method="post" name="f1" onSubmit="return vali()">
<table width=100% border="1" align="center">


<tr>
<td><font size="+1" face="Rockwell">Event Date:</font></td>
<td>
<input name="ed" type="text" id="ed"readonly="readonly" value="<?php echo $matt['edate'];?>"></td>
</tr>

<tr>
<td><font size="+1" face="Rockwell">Event:</font></td>
<td>
<input name="event" type="text" id="event"readonly="readonly" value="<?php echo $matt['eventnm'];?>"></td>


<td><center><font size="+1" face="Rockwell">Amount:</center></td>
</tr>


	<?php
	$sel=mysql_query("select * from venue where venueid='$vid'");
    $mat=mysql_fetch_array($sel);
	$vamt=$mat['hrate'];
	?>

<tr>
<td><font size="+1" face="Rockwell">Venue:</font></td>

<td>
<input name="venueid" type="text" id="venueid"readonly="readonly" value="<?php echo $vid;?>">
<input name="vnm" type="text" id="vnm"readonly="readonly" value="<?php echo $mat['hname'];?>"></td>
</td>

<td>
<input name="vr" type="text" id="vr" readonly="readonly" value="<?php echo $mat['hrate'];?>"></td>
</tr>


	<?php
	$sel=mysql_query("select * from band where bno='$bid'");
    $mat=mysql_fetch_array($sel);
	$bamt=$mat['brate'];
	?>

<tr>
<td><font size="+1" face="Rockwell">Band:</font></td>

<td>
<input name="bno" type="text" id="bno"readonly="readonly" value="<?php echo $bid;?>">
<input name="bnm" type="text" id="bnm"readonly="readonly" value="<?php echo $mat['bname'];?>"></td>
</td>

<td>
<input name="no" type="text" id="no" readonly="readonly" value="<?php echo $mat['brate'];?>"></td>

</tr>

	<?php
	$sel=mysql_query("select * from deco where decoid='$did'");
    $mat=mysql_fetch_array($sel);
	$damt=$mat['drate'];
	?>

<tr>
<td><font size="+1" face="Rockwell">Decoration:</font></td>

<td>
<input name="decoid" type="text" id="decoid"readonly="readonly" value="<?php echo $did;?>">
<input name="dnm" type="text" id="dnm" readonly="readonly" value="<?php echo $mat['dname'];?>"></td>
</td>

<td>
<input name="dr" type="text" id="dr" readonly="readonly" value="<?php echo $mat['drate'];?>"></td>

</tr>

	<?php
	$sel=mysql_query("select * from cate where cateid='$cid'");
    $mat=mysql_fetch_array($sel);
	$camt=$mat['mrate'];
	$trate=$mat['mrate']* $np;
	?>


<tr>
<td><font size="+1" face="Rockwell">Catering:</font>
<br><font size="+1" face="Rockwell">Rate & Plates:</font>
</td>

<td>
<input name="cateid" type="text" id="cateid"readonly="readonly" value="<?php echo $cid;?>">
<input name="cnm" type="text" id="cnm"readonly="readonly" value="<?php echo $mat['mname'];?>">
<br><input name="mrt" type="text" id="mrt" readonly="readonly" value="<?php echo $mat['mrate'];?>">
<input name="np" type="text" id="np"readonly="readonly" value="<?php echo $np;?>">

</td>

<td>
<input name="mrt" type="text" id="mrt" readonly="readonly" value="<?php echo $trate;?>"></td>

</tr>

	<?php
	$tamt=$vamt+$bamt+$damt+$trate;
	?>

<tr>
<td>
</td>
<td align="right"><font size="+1" face="Rockwell"><b>Total</b></font></td>
<td><input name="mrt" type="text" id="mrt" readonly="readonly" value="<?php echo $tamt;?>"></td>
</tr>


<tr>
<td></td>
    <td align="right"><font size="+1" face="Rockwell">Advance: </font></td>
<td><input name="bamt" type="text" id="bamt"readonly="readonly" value="<?php echo $bookamt;?>"></td>
  </tr>


<tr>
    <td><font size="+1" face="Rockwell">Account No: </font></td>
    <td><input name="t2" type="text" id="t2" onChange="return pass()"></td>
  </tr>

  <tr>
    <td><font size="+1" face="Rockwell">Bank:</font></td>
    <td><label>
      <select name="sel2" id="sel2">
        <option value="SBBJ">SBBJ</option>
        <option value="SBI" selected>SBI</option>
        <option value="ICICI">ICICI</option>
        <option value="HDFC">HDFC</option>
        <option value="PNB">PNB</option>
        <option value="Axis Bank"> Axis Bank</option>
      </select>
    </label></td>
  </tr>


  <tr>
    <td><input name="t3" type="hidden" id="t3" readonly="readonly" value="<?php echo $eid;?>"></td>
  </tr>

  <tr>
    <td><input name="bookno" type="hidden" id="bookno" readonly="readonly" value="<?php echo $i;?>"></td>
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

		<br><center>Developed by : Nikita Kavde & Sweta Bharaske</center>
	</div>

</body>

</html>