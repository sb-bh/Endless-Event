<?php
	//Start session
	session_start();
	
include("config.php");
$email=$_REQUEST['regemail'];
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


<style>

	a{
		text-decoration:none;
	}
</style>

</head>

<body>

	<div id="header">

		<div>

			<a href="index.html"><img src="images/logo.png" alt="Image"></a>

			<ul>				
			<li class="current"><a href="index.html">Log Out</a></li>
			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">
<center><h1><font face="Times New Roman" size="+6" color="white">Welcome 
	<?php 
	
$sel=mysql_query("select * from custreg where uname='$email'");
  $arr=mysql_fetch_array($sel);
  echo $arr['fname']."&nbsp;".$arr['lname'];
  echo '</font></h1></center>'
  ?>
  <?php
echo "<tr>";
echo '<td><a href="bookvenue.php?regemail=' . $email . '"><h2><font color="#FFFFFF">Book Venue</font></h2></a></td>';
echo "</tr>";

echo "<tr>";
echo '<td><a href="viewmybook.php?regemail=' . $email . '"><h2><font color="#FFFFFF">My Bookings</font></h2></a></td>';
echo "</tr>";

echo "<tr>";
echo '<td><a href="viewmycanbook.php?regemail=' . $email . '"><h2><font color="#FFFFFF">My Cancel Bookings</font></h2></a></td>';
echo "</tr>";

echo "<tr>";
echo '<td><a href="viewvenue1.php?regemail=' . $email . '"><h2><font color="#FFFFFF">View Venue</font></h2></a></td>';
echo "</tr>";

echo "<tr>";
echo '<td><a href="viewcate1.php?regemail=' . $email . '"><h2><font color="#FFFFFF">View Catering</font></h2></a></td>';
echo "</tr>";
 
?>
	
		
		

		<div>

			<div>

				<div id="gallery">

					<ul>

						<li>

							<a href="gallery.html"><img src="images/bride3.jpg" alt="Image" height="150" width="150"></a>


						</li>

						<li>

							<a href="gallery.html"><img src="images/flower4.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>


							<a href="gallery.html"><img src="images/wedding-ring3.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/wedding-cake3.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/wedding-ring4.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/couples2.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/flower5.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/bridesmaids3.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/flower6.jpg" alt="Image" height="150" width="150"></a>

						</li>

						<li>

							<a href="gallery.html"><img src="images/bride4.jpg" alt="Image" height="150" width="150"></a>

						</li>

					</ul>

					<div id="paging">

						<a href="gallery.html" class="prev">Previous</a>

						<a href="gallery.html" class="next">Next</a>

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