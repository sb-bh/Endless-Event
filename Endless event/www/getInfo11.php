<?php
include("config.php");
?>

<?php
if(isset($_REQUEST['category'])){



    $sql = mysql_query("select brate,bno from band where bno =".$_REQUEST['category']);
    $res = mysql_fetch_assoc($sql);
    echo $res['brate'];
    die;
}
?>

<?php
    
    //Include database connection details
    require_once('config.php');
    
    $cid=$_REQUEST['category'];
    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_escape_string($str);
    }
    
    
    //Sanitize the POST values

    $bid = $_GET['category'];
	  
    $sta="Cancel";

    //Create update query

    $sql = mysql_query("select brate,bno from band where bno =$bid);
    $res = mysql_fetch_assoc($sql);
    


    //Check whether the query was successful or not
    if($res) {
            echo $res['brate'];
	echo "<html><script language='JavaScript'>alert('Booking is cancelled successfully.')</script></html>";
        exit();
    }else {
        echo "failed ";
    } 
 ?>