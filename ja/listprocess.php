<?php
//ini_set("display_errors", On);
//error_reporting(E_ALL);
//require_once("JSON.php");
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
$jungleCode = $_GET['jungle']; //ソート条件の格納
$sql;
$mysqli->set_charset ("utf8");
$sql;

if($jungleCode == 0){
    $sql = "SELECT spot_master.spot_id,spot_ja.spot_name FROM beaconti_spot.spot_master,beaconti_spot.spot_ja WHERE spot_ja.spot_id = spot_master.spot_id";
    $result = $mysqli->query($sql);
    $array = $result->fetch_all(MYSQLI_ASSOC);

}else{
    $sql = "SELECT spot_master.spot_id,spot_ja.spot_name FROM beaconti_spot.spot_master,beaconti_spot.spot_ja WHERE spot_master.spot_jungle =? AND spot_ja.spot_id = spot_master.spot_id";
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("i",$jungleCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $array = $result->fetch_all(MYSQLI_ASSOC);
    }

}

//SQLのセット
//$sql = "SELECT spot_master.spot_id,spot_ja.spot_name FROM beaconti_spot.spot_master,beaconti_spot.spot_ja WHERE spot_ja.spot_id = spot_master.spot_id";



//
//$stmt -> execute($sql);
//$list = $stmt->fetchAll();
//

//$result = $mysqli->query($sql);
//$array = $result->fetch_all(MYSQLI_ASSOC);

//if ($result = $mysqli->query($sql)) {
//    echo "rows=" . $result->num_rows;
//    $spot = array();
//    while ($row = $result->fetch_assoc()) {
//        print_r($row);
//        $spot[] = array('array' => array(
//            'id' => $row["spot_id"]
//        , 'name' => $row["spot_name"]
//        ));
//    }
//    $result -> close();
//}
//header('Content-Type: application/json; charset=utf-8');
//echo json_encode($pot, JSON_UNESCAPED_UNICODE);
//
////結果セットを開放
//$result->free();
//
////接続を閉じる
//$mysqli->close();

header('Content-type: application/json ; charset=utf-8');
echo json_encode($array, JSON_UNESCAPED_UNICODE);
?>