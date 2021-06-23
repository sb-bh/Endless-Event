<?php
	//Start session
	session_start();
	
	
?>

<?php
include("config.php");

if(isset($_POST['sub']))
{
$fname=$_REQUEST['t1'];
$lname=$_REQUEST['t2'];
$gen=$_REQUEST['r1'];
$id=$_REQUEST['t3'];
$pass=$_REQUEST['p1'];
$repass=$_REQUEST['p2'];
$phone=$_REQUEST['t5'];
$add=$_REQUEST['t6'];
$city=$_REQUEST['t7'];
$coun=$_REQUEST['t8'];

if($_REQUEST['sub'])
{
$sel=mysql_query("select uname from custreg where uname='$id' ");
$arr=mysql_fetch_array($sel);

if($arr['uname']!=$id)
  {
   if(mysql_query("insert into custreg (fname,lname,gender,uname,pswd,phno,addr,city,country) values('$fname','$lname','$gen','$id','$pass','$phone','$add','$city','$coun')"))
	   {
	      
	     echo "<html><script language='JavaScript'>alert('Registration is succesfull.')</script></html>";
	echo "<script>location.href='index.html'</script>";
	   }
	 }
else 
{
echo "<html><script language='JavaScript'>alert('Registration is exists with this Email.')</script></html>";
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

				
					<li class="current">
<a href="index.html">Home</a></li>
			
			<li>
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

		<h2>Register</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">


<form method="post" name="f1" onSubmit="return vali()">
<table width="366" border="1" align="center">

    <tr>
    <td width="164"><div align="center"><font size="+1" face="Rockwell"><b> First&nbsp;Name:</b></font></div></td>
    <td width="192">  
        <input name="t1" type="text" id="t1">    </td>
  </tr>
  
<tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>Last name:</strong></font></div></td>
    <td><input name="t2" type="text" id="t2" ></td>
  </tr>
  
<tr>
    <td><div align="center"><font size="+1" face="Rockwell"><b>&nbsp;Gender:</b> </font></div></td>
    <td><input name="r1" type="radio" value="male">
      <strong>Male</strong>
        <input name="r1" type="radio" value="female">
        <strong>Female</strong></td>
  </tr>

  <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><b>&nbsp;Enter Email : </b></font></div></td>
    <td><input name="t3" type="text" id="t3"></td>
  </tr>

  <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><b>&nbsp;Password:</b> </font></div></td>
    <td><input name="p1" type="password" id="p1"></td>
  </tr>

 <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><b>&nbsp;Re-Enter Password:</b> </font></div></td>
    <td><input name="p2" type="password" id="p2"></td>
  </tr>
  <tr> <td><div align="center"><font size="+1" face="Rockwell"><b>Phone no: </b></font></div></td>
    <td><input name="t5" type="text" id="t5"></td>
  </tr>

  <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>Address:</strong></font></div></td>
    <td><label>
      <input type="text" name="t6" id="t6" >
    </label></td>
  </tr>

  <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>City:</strong></font></div></td>
    <td><input name="t7" type="text" id="t7" ></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Rockwell"><strong>Country:</strong></font></div></td>
    <td><input name="t8" type="text" id="t8" ></td>
  </tr>
 
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="sub" type="submit" id="sub" value="Register Now">
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