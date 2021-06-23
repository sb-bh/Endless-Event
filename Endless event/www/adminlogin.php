<?php
error_reporting(1);
include("config.php");

if(isset($_POST['sub']))
{
$name=$_REQUEST['u1'];
$password=$_REQUEST['p1'];

if($_REQUEST['sub'])
 {
 $sel=mysql_query("select uname,password from adminlog where uname='$name'");
 $arr=mysql_fetch_array($sel);
 if(($arr['uname']==$name) and ($arr['password']==$password))
   {
   session_start();
   $_SESSION['eid']=$name;

	echo "<script>location.href='adminhome.php'</script>";
	}
  else
   {
     echo "<html><script language='JavaScript'>alert('invalid user name or password.')</script></html>";
	 }

}	 }
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

  var nam=/^[a-zA-Z ]{2,15}$/;
   var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    var pass=/^[a-zA-Z0-9-_]{2,16}$/;
	 	var phn=/^[0-9]{9,14}$/;
	  var add=/^[a-zA-Z0-9 ]{2,150}$/;
	  var city=/^[a-zA-Z]{2,30}$/;
	  
   if(document.f1.t1.value.search(nam)==-1)
    {
	 alert("enter correct username");
	 document.f1.t1.focus();
	 return false;
	 }
	 	 
  else if(document.f1.t2.value.search(nam)==-1)
    {
	 alert("enter correct password");
	 document.f1.t2.focus();
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

				
					<li>
<a href="index.html">Home</a></li>
			
			<li class="current">
<a href="adminlogin.php">Admin</a>
</li>

				<li>
<a href="userlogin.php">User Login</a></li>

				<li>
<a href="contact.html">Contact</a></li>
				
				

				<li><a href="about.html">About</a>
</li>

			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">

		<h2>Admin Login</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">


<form method="post" name="f1" onSubmit="return vali()">
<table width="366" border="1" align="center">

    <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><b> User Name:</b></font></div></td>
    <td width="192">  
        <input name="t1" type="text" id="t1">    </td>
  </tr>
  
<tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>Password:</strong></font></div></td>
    <td><input name="t2" type="password" id="t2" ></td>
  </tr>
  
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="sub" type="submit" id="sub" value="Admin Login">
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