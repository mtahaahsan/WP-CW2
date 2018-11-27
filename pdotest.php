<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/5/2018
 * Time: 2:24 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);   //Making the connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     //Catching the error part
    $stmt = $conn->prepare("SELECT * FROM users where username=?");     //Statement for the sql, but no parameter
    $name="peter";      //Parameter is put into here
    $stmt->bindParam(1,$name); // Another option of doing a BIND
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userid=htmlentities($row['userid']);
        $username=htmlentities($row['username']);
        $name=htmlentities($row['name']);
    }
    echo $userid . ' ' .$username .' '. $name;
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>