<?php
/**
 * Created by PhpStorm.
 * User: rj
 * Date: 2017/02/12
 * Time: 21:57
 */

$mysqli = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

$lang = $_GET['lang']; //言語情報の取得(jp or en)
$spotId = $_GET['id']; //スポットID情報の取得

$sql = "SELECT * FROM beaconinfodb.spot_master,beaconinfodb.spot_ja WHERE spot_master.spot_id=? HAVING spot_ja.spot_id = spot_master.spot_id";

?>