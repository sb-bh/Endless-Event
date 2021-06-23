<?php
	//Start session
	session_start();
	
	
?>

<?php
include("config.php");
error_reporting(1);


if(isset($_POST['sub']))
{
$name=$_REQUEST['u1'];
$password=$_REQUEST['p1'];

if($_REQUEST['sub'])
 {
 $sel=mysql_query("select uname,pswd from custreg where uname='$name'");
 $arr=mysql_fetch_array($sel);
 if(($arr['uname']==$name) and ($arr['pswd']==$password))
   {
   session_start();
   $_SESSION['eid']=$name;

	echo "<script>location.href='home.php? regemail=$name'</script>";
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
$p1=document.f1.p1.value;
$p2=document.f1.p2.value;

  var nam=/^[a-zA-Z ]{2,15}$/;
   var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    var pass=/^[a-zA-Z0-9-_]{2,16}$/;
	 	var phn=/^[0-9]{9,14}$/;
	  var add=/^[a-zA-Z0-9 ]{2,150}$/;
	  var city=/^[a-zA-Z]{2,30}$/;
	  
   if(document.f1.t1.value.search(nam)==-1)
    {
	 alert("enter correct  first name");
	 document.f1.t1.focus();
	 return false;
	 }
	 	 
  else if(document.f1.t2.value.search(nam)==-1)
    {
	 alert("enter correct last name");
	 document.f1.t2.focus();
	 return false;
	 }
 
  else if(document.f1.t3.value.search(email)==-1)
    {
	 alert("enter correct login name");
	 document.f1.t3.focus();
	 return false;
	 }
	 
	
	
   else if(document.f1.p1.value.search(pass)==-1)
    {
	 alert("enter correct pass");
	 document.f1.p1.focus();
	 return false;
	 }
	 
	

	else if($p1 != $p2)
    {
	 alert("re-entered password is wrong!");
	 document.f1.p2.focus();
	 return false;
	 }


	  else if(document.f1.t5.value.search(phn)==-1)
    {
	 alert("enter correct phone no");
	 document.f1.t5.focus();
	 return false;
	 }
	 
	
  else if(document.f1.t6.value.search(add)==-1)
    {
	 alert("enter correct address");
	 document.f1.t6.focus();
	 return false;
	 }
	
	 
	 
	 
	else if(document.f1.t7.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.t7.focus();
	 return false;
	 }
	 
		else if(document.f1.t8.value.search(city)==-1)
    {
	 alert("enter correct country");
	 document.f1.t8.focus();
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
			
			<li>
<a href="adminlogin.php">Admin</a>
</li>

				<li class="current">
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

		<h2>User Login</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">






<form method="post" name="f1" onSubmit="return vali()">
<table width="366" border="1" align="center">

    <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b>user name</b></font></div></td>
    <td width="192">  
        <input name="u1" type="text" id="u1">    </td>
  </tr>
  
<tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>password:</strong></font></div></td>
    <td><input name="p1" type="password" id="p1" ></td>
  </tr>
  
 
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="sub" type="submit" id="sub" value="Login">
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