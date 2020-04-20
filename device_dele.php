<?php
$servername = "localhost";
$dbname   = "school";
$username = "school";
$password = "abc123";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id ="-1";

    if (isset($_GET["id"])) $id = $_GET["id"];

    if ($id != "-1") {
      $stmt = $conn->prepare("DELETE FROM `device` WHERE `device`.`devID` = '$id';");
      $stmt->execute();
    }

    header('Location: device_list.php');
    exit();

} catch(PDOException $e) {
    echo "無法連線 Connection failed: " . $e->getMessage();
}

?>