<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "users";
//$myID = _GET['userid'];
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////    alert("HELLO");
//
//    // sql to delete a record
//    $sql = 'DELETE FROM users WHERE username = $myID';
//
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo ($myID . "Has been deleted");
//}
//catch(PDOException $e)
//{
//    echo $sql . "<br>" . $e->getMessage();
//}
//
//$conn = null;
//

include("connect.php");
$ID = $_GET['id'];
$NAME = $_GET['name'];
//console.log($NAME);
$stmt = $conn->prepare("DELETE FROM users WHERE userid=?");
$stmt->bindParam(1, $ID);
$stmt->execute();
//echo $NAME ." Has been deleted";

$data = new stdClass();
$data -> name = $NAME." Has been deleted";

$json = json_encode($data);
echo $json;




?>






























