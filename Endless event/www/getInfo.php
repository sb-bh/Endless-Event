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