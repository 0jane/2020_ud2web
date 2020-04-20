<?php

$servername = "localhost";
$dbname   = "school";
$username = "school";
$password = "abc123";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO `device` (`devID`, `devName`, `model`, `price`, `purchaseDate`, `specification`, `depart`, `manager`) VALUES (NULL, 'qwerqwer', 'asdfasdf', '3212', '2020-04-20', 'asdfasdf\r\nsdfasdfasdf\r\nasdfasdfasdf', 'ddddd', 'mmmm');");
    $stmt->execute();

    header('Location: device_list.php');
    exit();

} catch(PDOException $e) {

    echo "無法連線 Connection failed: " . $e->getMessage();

}
?>