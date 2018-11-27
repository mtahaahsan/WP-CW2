<?php
$target_dir = "upload/";
echo ($target_dir);
$filename = basename($_FILES["doc"]["name"]);
$target_file = $target_dir . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a valid image
function files() {
    global $target_file;
    global $filename;
    global $user;
    if (!file_exists($target_file)) {
        if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
            echo "<h2>The file <a href=\"http://localhost/upload/$filename\">$filename</a> has been uploaded by $user!</h2>";
        }
        else {
            echo "Sorry, there was an error uploading the file.";
        }
    }
    else {
        unlink($target_file) or die("Couldn't delete file");
        if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
            echo '<h2>The file <a href="http://localhost/upload/' . $filename . '">' . $filename . '</a> has been uploaded by ' . $_POST["user"].'!</h2>';
        }
        else {
            echo "Sorry, there was an error uploading the file.";
        }
    }
}

if (isset($_POST["Submit"])) {
	if ($_FILES["doc"]["size"] < 500000) {
		if ($imageFileType == 'gif' || $imageFileType == 'jpg') {
			if (getimagesize($_FILES["doc"]["tmp_name"]) !== false) {

				// Create file if it doesn't exist

				files();
			}
		}

        else if ($imageFileType == 'docx' || $imageFileType == 'doc') {

			// Create file if it doesn't exist
            files();
		}
	}
}

// If there are photos, loop across photos and show them

if (sizeof($photos) > 0) {
	foreach($photos as $photo) {
		echo "<p>Photo: $photo <input type='checkbox' name='picker' value='$photoID'>";
	}
}

?>
<html>
    <body>
        <h4> Submit Your Photo and Name </h4>
        <form action="http://localhost/cw2/cw2part1.php"
            method="post" enctype="multipart/form-data">
                <p> File <input type="file" name="doc"> </p>
                <p> Name <input name="user"> <input type="submit" name="Submit"> </p>
        </form>
    </body>
</html>
<?php

// DATABASE CODE:


$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users where username=?");
    $name=strip_tags($_POST["user"]);
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

class db_connection {
var $connection;

// create a new connection object

function db_connection($type="") { }

// connect to the database server

function connect($host, $port, $login, $password, $pconnect, $database="") {
if($port) { $host .= ":$port"; }

if( !($this->connection = @mysql_connect($host, $login, $password)) ) return false;
if($database) if(!@mysql_select_db($database, $this->connection)) return false;
return true;
}

function query($query) {
return mysql_query($query, $this->connection);
}

function error() {
return mysql_error($this->connection);
}
}

?>