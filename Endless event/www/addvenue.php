<?php


if(isset($_POST['sub']))
{
include("config.php");


$hrate=$_REQUEST['b1'];
$hname=$_REQUEST['s1'];
$addr=$_REQUEST['m1'];
$cont=$_REQUEST['c1'];
$fac=$_REQUEST['f1'];
$cap=$_REQUEST['cap1'];

    $target = "itempics/"; 
    $target = $target . basename( $_FILES['file']['name']);

    $photo = $_FILES['file']['name'];

$img=$_FILES['file']['tmp_name'];

if($_REQUEST['sub'])
{


$sel=mysql_query("select hname from venue where hname='$hname' ");
$arr=mysql_fetch_array($sel);

if($arr['hname']!=$hname)
 {
   if(mysql_query("INSERT INTO venue(hname,addr,contact,facility,capacity,hrate,photo) values('$hname','$addr','$cont','$fac','$cap','$hrate','$photo')"))
	   {

         move_uploaded_file($_FILES['file']['tmp_name'], $target);	      
	     echo "<html><script language='JavaScript'>alert('Venue details is added succesfully.')</script></html>";
	echo "<script>location.href='addvenue.php'</script>";
	   }
	 }
else 
{
echo "<html><script language='JavaScript'>alert('Venue details is exists')</script></html>";
	echo "<script>location.href='addvenue.php'</script>";
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

<script>
function showUser(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("subcat").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","dd.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
<script>

	
function vali()
{

	var sis=/^[0-9]{1,14}$/;
        var fnam=/^[a-zA-Z ]{2,200}$/;
        var nam=/^[a-zA-Z ,]{2,200}$/;
	var ph=/^[0-9 ,]{1,50}$/;
	var cap=/^[a-zA-Z0-9 ,]{1,500}$/;

if(document.f1.b1.value.search(sis)==-1)
    {
	 alert("Enter numeric rate");
	 document.f1.b1.focus();
	 return false;
	 }


else if(document.f1.m1.value.search(nam)==-1)
    {
	 alert("Enter correct Address");
	 document.f1.m1.focus();
	 return false;
	 }

else if(document.f1.f1.value.search(cap)==-1)
    {
	 alert("Enter correct facility");
	 document.f1.f1.focus();
	 return false;
	 }
  
else if(document.f1.c1.value.search(ph)==-1)
    {
	 alert("Enter Correct Contact Details");
	 document.f1.c1.focus();
	 return false;
	 }
  
else if(document.f1.cap1.value.search(cap)==-1)
    {
	 alert("Enter Correct Capacity Details");
	 document.f1.cap1.focus();
	 return false;
	 }

else if(document.f1.s1.value.search(fnam)==-1)
    {
	 alert("Enter correct name");
	 document.f1.s1.focus();
	 return false;
	 }
	 
	 else 
	{
	 return true;
	 }
	 }
	
	 
</script> 

</head>


<body>

	<div id="header">

		<div>

			<a href="index.html"><img src="images/logo.png" alt="Image"></a>

			<ul>

				
			<li><a href="index.html">Log Out</a></li>
			<li class="current"><a href="addvenue.php">Add Venue</a></li>
			<li><a href="addband.php">Add Band</a></li>
			<li><a href="adddeco.php">Add Decoration</a></li>
			<li><a href="addcate.php">Add Catering</a></li>

			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">

		<h2>Add Venue</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">


<form method="post" name="f1" onSubmit="return vali()" enctype="multipart/form-data" >
<table width=60% border="1" align="center">


  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Venue Name</b></font></div></td>
    <td width="192">
      
        <input name="s1" type="text" id="s1" width="6%">    </td>
  </tr>
  
  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Address</b></font></div></td>
    <td width="192">
      
        <input name="m1" type="text" id="m1" width="6%">    </td>
  </tr>

  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Contact Details</b></font></div></td>
    <td width="192">
      
        <input name="c1" type="text" id="c1" width="6%">    </td>
  </tr>

  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Facility</b></font></div></td>
    <td width="192">
      
        <input name="f1" type="text" id="f1" width="6%">    </td>
  </tr>

  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Capacity</b></font></div></td>
    <td width="192">
      
        <input name="cap1" type="text" id="cap1" width="6%">    </td>
  </tr>

  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Rate</b></font></div></td>
    <td width="192">
      
        <input name="b1" type="text" id="b1" width="6%">    </td>
  </tr>

<tr>
<td><span class="style3">Image of Venue:</span></td>
<td><input name="file" type="file"></td></tr>

  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="sub" type="submit" value="Submit">
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