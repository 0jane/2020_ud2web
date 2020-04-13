<?php

$servername = "localhost";
$dbname   = "school";
$username = "school";
$password = "abc123";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM `device`");
    $stmt->execute();

    echo "<table border=1>";
    echo "<tr><th>&nbsp;</th><th>品名</th><th>價格</th><th>購買日期</th></tr>";
    $i=0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) )  {
       $i++;
       echo "<tr><td>$i</td><td>".$row["devName"]."</td><td>".$row["price"]."</td><td>".$row["purchaseDate"]."</td></tr>";
    }
    echo "</table>";

} catch(PDOException $e) {

    echo "無法連線 Connection failed: " . $e->getMessage();

}
?>