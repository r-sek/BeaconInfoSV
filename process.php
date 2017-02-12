<?php
/**
 * Created by PhpStorm.
 * User: rj
 * Date: 2017/02/12
 * Time: 17:55
 */
$link = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

$query="SELECT * FROM ".beaconinfodb.spot_master."'";
$res=mysql_query($query);
$output=array();
while($e=mysql_fetch_assoc($res)){$output[]=$e;}
mysql_free_result($res);
mysql_close($con);
echo json_encode($output);

?>