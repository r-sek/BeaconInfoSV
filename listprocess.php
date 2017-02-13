<?php
/**
 * Created by PhpStorm.
 * User: rj
 * Date: 2017/02/12
 * Time: 17:55
 */

//手続き型の亡骸
//$link = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
//$query = "SELECT * FROM beaconinfodb.spot_master";

$mysqli = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

$lang = $_GET['lang']; //言語情報の取得(jp or en)
$sort = $_GET['sort']; //ソート条件の格納

$sql = "SELECT spotmaster.spotid,spot_ja.spot_name FROM beaconinfodb.spot_master,beaconinfodb.spot_ja";


?>