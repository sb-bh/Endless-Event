<?php
//checking connection and connecting to a database
include("config.php");

$result=mysql_query("SELECT * FROM payment")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
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

				
			<li class="current"><a href="index.html">Log Out</a></li>
			<li><a href="addvenue.php">Add Venue</a></li>
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

		<h2>View Payments</h2>

			<h2><ul>
			<li><a href="adminhome.php"><font color="white">Back</font></a></li>
			</ul></h2>

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
        
        $result=mysql_query("SELECT * FROM payment")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>


  <div style= "width: 1400px"; "border:#bd6f2f solid 1px;padding:4px 6px 2px 6px" >
      <table border="1" width="910" height="auto" style="text-align:center;">
        <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Venue</th>
        <th>Band</th>
        <th>Decoration</th>
        <th>Catering</th>
        <th>No of Plates</th>
        <th>Total Amount</th>
        <th>Advance</th>
        <th>Bank</th>
        <th>Account Number</th>

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

	$bookno=$row['bookno'];
	$sell=mysql_query("select * from bookevent where bookid='$bookno'");
	$matt=mysql_fetch_array($sell);


	$vid=$matt['vid'];
	$bid=$matt['bid'];
	$did=$matt['did'];
	$cid=$matt['cid'];
	$custid=$row['custid'];

	$sel=mysql_query("select * from venue where venueid='$vid'");
	$mat=mysql_fetch_array($sel);

	$sel1=mysql_query("select * from band where bno='$bid'");
	$mat1=mysql_fetch_array($sel1);

	$sel2=mysql_query("select * from deco where decoid='$did'");
	$mat2=mysql_fetch_array($sel2);

	$sel3=mysql_query("select * from cate where cateid='$cid'");
	$mat3=mysql_fetch_array($sel3);

	$sel4=mysql_query("select * from custreg where uname='$custid'");
	$mat4=mysql_fetch_array($sel4);
	$cno = $mat4['fname']."&nbsp;".$mat4['lname'];


                    echo "<tr>";
                    echo "<td>" . $row['bookno']."</td>";
                    echo "<td>" . $cno."</td>";
                    echo "<td>" . $matt['eventnm']."</td>";
                    echo "<td>" . $matt['edate']."</td>";
                    echo "<td>" . $mat['hname']."</td>";
                    echo "<td>" . $mat1['bname']."</td>";
                    echo "<td>" . $mat2['dname']."</td>";
                    echo "<td>" . $mat3['mname']."</td>";
                    echo "<td>" . $matt['plates']."</td>";
                    echo "<td>" . $row['tamt']."</td>";
                    echo "<td>" . $row['adv']."</td>";
                    echo "<td>" . $row['banknm']."</td>";
                    echo "<td>" . $row['acno']."</td>";
                    echo "</td>";
                    echo "</tr>";
                    }      
                }
            mysql_free_result($result);

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