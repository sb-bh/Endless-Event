<?php
include("config.php");
?>

<?php
if(isset($_REQUEST['catering'])){
    $sql = mysql_query("select mrate,cateid from cate where cateid =".$_REQUEST['catering']);
    $res = mysql_fetch_assoc($sql);
    echo $res['mrate'];
    die;
}
?>