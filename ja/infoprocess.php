<?php
//ini_set("display_errors", On);
//error_reporting(E_ALL);

/**
 * Created by PhpStorm.
 * User: rj
 * Date: 2017/02/12
 * Time: 21:57
 */

$mysqli = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);

$lang = $_GET['lang']; //言語情報の取得(jp or en)
$spotId = $_GET['id']; //スポットID情報の取得
$mysqli->set_charset ("utf8");

$sql = "SELECT spot_master.spot_id,spot_master.latitude,spot_master.longtude,spot_master.image_url, spot_ja.spot_name,spot_ja.spot_info FROM beaconti_spot.spot_master,beaconti_spot.spot_ja WHERE spot_master.spot_id=? AND spot_ja.spot_id = spot_master.spot_id";

if($stmt = $mysqli->prepare($sql)){
    $stmt->bind_param("i",$spotId);
    $stmt->execute();
//    $array = fetch_all($stmt);
    $result = $stmt->get_result();
    $array = $result->fetch_all(MYSQLI_ASSOC);
//    print_r($array);
}
header('Content-type: application/json ; charset=utf-8');
echo json_encode($array, JSON_UNESCAPED_UNICODE);


function fetch_all(& $stmt) {
    $hits = array();
    $params = array();
    $meta = $stmt->result_metadata();
    while ($field = $meta->fetch_field()) {
        $params[] = &$row[$field->name];
    }
    call_user_func_array(array($stmt, 'bind_result'), $params);
    while ($stmt->fetch()) {
        $c = array();
        foreach($row as $key => $val) {
            $c[$key] = $val;
        }
        $hits[] = $c;
    }
    return $hits;
}
?>