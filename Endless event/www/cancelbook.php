<?php
    //Start session
    session_start();
    
    //Include database connection details
    require_once('config.php');
    
    $cid=$_REQUEST['regemail'];
    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_escape_string($str);
    }
    
    
    //Sanitize the POST values

    $bookno = $_GET['itemno'];
	  
    $sta="Cancel";

    //Create update query
    $qry = "update bookevent set cancelflg='$sta' where bookid=$bookno";
    $result = @mysql_query($qry);
    
    //Check whether the query was successful or not
    if($result) {
            
	echo "<html><script language='JavaScript'>alert('Booking is cancelled successfully.')</script></html>";


	 echo "<script>location.href='viewmybook.php?regemail=$cid'</script>";

        exit();
    }else {
        echo "failed ";
    } 
 ?>