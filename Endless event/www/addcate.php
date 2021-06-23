<?php


if(isset($_POST['sub']))
{
include("config.php");


$mrate=$_REQUEST['b1'];
$mname=$_REQUEST['s1'];
$mdtl=$_REQUEST['m1'];

$sel=mysql_query("select mname from cate where mname='$mname' ");
$arr=mysql_fetch_array($sel);

if($arr['mname']!=$mname)
 {
   if(mysql_query("INSERT INTO cate(mname,mrate,menudtl) values('$mname','$mrate','$mdtl')"))
	   {
	      
	     echo "<html><script language='JavaScript'>alert('Catering details is added succesfully.')</script></html>";
	echo "<script>location.href='addcate.php'</script>";
	   }
	 }
else 
{
echo "<html><script language='JavaScript'>alert('Catering details is exists')</script></html>";
	echo "<script>location.href='addcate.php'</script>";
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

	
function vali()
{

	var sis=/^[0-9]{1,14}$/;
        var fnam=/^[a-zA-Z ]{2,50}$/;
        var nam=/^[a-zA-Z ,]{2,200}$/;

if(document.f1.b1.value.search(sis)==-1)
    {
	 alert("Enter numeric rate");
	 document.f1.b1.focus();
	 return false;
	 }


else if(document.f1.m1.value.search(nam)==-1)
    {
	 alert("Enter correct details");
	 document.f1.m1.focus();
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
			<li><a href="addvenue.php">Add Venue</a></li>
			<li><a href="addband.php">Add Band</a></li>
			<li><a href="adddeco.php">Add Decoration</a></li>
			<li class="current"><a href="addcate.php">Add Catering</a></li>

			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">

		<h2>Add Menu Details</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">


<form method="post" name="f1" onSubmit="return vali()">
<table width=60% border="1" align="center">


  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Main Menu</b></font></div></td>
    <td width="192">
      
        <input name="s1" type="text" id="s1" width="6%">    </td>
  </tr>
  
  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Menu Details</b></font></div></td>
    <td width="192">
      
        <input name="m1" type="text" id="m1" width="6%">    </td>
  </tr>

  <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>Rate</b></font></div></td>
    <td width="192">
      
        <input name="b1" type="text" id="b1" width="6%">    </td>
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