<?php
include("config.php");
?>

<?php
if(isset($_REQUEST['decoration'])){
    $sql = mysql_query("select drate,decoid from deco where decoid =".$_REQUEST['decoration']);
    $res = mysql_fetch_assoc($sql);
    echo $res['drate'];
    die;
}
?>