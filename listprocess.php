<?php
require_once("JSON.php");
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

$lang = $_POST['lang']; //言語情報の取得(jp or en)
$sort = $_POST['sort']; //ソート条件の格納

$sql = "SELECT spot_master.spot_id,spot_ja.spot_name FROM beaconti_spot.spot_master,beaconti_spot.spot_ja WHERE spot_ja.spot_id = spot_master.spot_id;";
$query = mysqli_query($sql);

$spot = array();
while ($row = mysqli_fetch_object($query)){
    $spot[]=array(
        'id' => $row -> spot_id
        ,'name' => $row -> spot_name
    );
}

header('Content-type: text/plain; charset=utf-8');
echo json_encode($spot);
?>