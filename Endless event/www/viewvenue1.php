<?php
//checking connection and connecting to a database
include("config.php");
$email=$_REQUEST['regemail'];

$result=mysql_query("SELECT * FROM venue")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>

<?php
	//Start session
	session_start();
	
include("config.php");
//$email=$_REQUEST['regemail'];
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



</head>


<body>

	<div id="header">

		<div>

			<a href="index.html"><img src="images/logo.png" alt="Image"></a>

			<ul>

				
					<li>
<a href="index.html">Log Out</a></li>
			

			</ul>

		</div>

		<div id="figure">

			<div>

				<a href="index.html"><img src="images/wedding.png" alt="Image"></a>

			</div>

		</div>

	</div>

	<div class="body">

		<h2>Venue Details</h2>

		<div>

			<div>

				<div id="gallery">


					<div id="paging">



<?php
    if(isset($_POST['Submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_escape_string($str);
        }
        //get category id
        $id = clean($_POST['category']);
        
        $result=mysql_query("SELECT * FROM venue")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>


  <div style= "width: 1400px"; "border:#bd6f2f solid 1px;padding:4px 6px 2px 6px" >
      <table border="1" width="860" height="auto" style="text-align:center;">
        <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Address</th>
        <th>Facility</th>
        <th>Capacity</th>
        <th>Rent</th>
        </tr>
        <?php


            $count = mysql_num_rows($result);
            if(isset($_POST['Submit']) && $count < 1){
                echo "<html><script language='JavaScript'>alert('There are no data under the selected category at the moment. Please check back later.')</script></html>";
            }
            else{
                //loop through all table rows
                //$counter = 3;
              
                while ($row=mysql_fetch_assoc($result)){


                    echo "<tr>";

                    echo '<td><a href=itempics/'. $row['photo']. ' alt="click to view full image" target="_blank"><img src=itempics/'. $row['photo']. ' width="70" height="60"></a></td>';
                    echo "<td>" . $row['hname']."</td>";
                    echo "<td>" . $row['addr']."</td>";
                    echo "<td>" . $row['facility']."</td>";
                    echo "<td>" . $row['capacity']."</td>";
                    echo "<td>" . $row['hrate']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    }      
                }
            mysql_free_result($result);
                    echo '<a href="home.php?regemail=' . $email . '"><font size=+2><b>Back</b></font></a>';
        ?>

  

              
            </table>
          </div>


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