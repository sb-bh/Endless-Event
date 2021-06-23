<?php
include("config.php");
?>

<?php
if(isset($_REQUEST['venue'])){
    $sql = mysql_query("select hrate,venueid from venue where venueid =".$_REQUEST['venue']);
    $res = mysql_fetch_assoc($sql);
    echo $res['hrate'];
    die;
}
?>