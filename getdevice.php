<?php

$servername = "localhost";
$dbname   = "school";
$username = "school";
$password = "abc123";

try {

    $id = $_GET['id'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `device` WHERE `devID`='$id';");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <?php

        echo "<table class=\"table table-hover\" id=\"myData\">";
        
        echo "<tr><td>設備名稱</td><td>".$row["devName"]."</td></tr>";
        echo "<tr><td>型號</td><td>".$row["model"]."</td></tr>";
        echo "<tr><td>價格</td><td>".$row["price"]."</td></tr>";
        echo "<tr><td>購買日期</td><td>".$row["purchaseDate"]."</td></tr>";
        echo "<tr><td>詳細規格</td><td>".$row["specification"]."</td></tr>";
        
        echo "</table>";
      } catch(PDOException $e) {
        echo "無法連線 Connection failed: " . $e->getMessage();
    }
    ?>
    </div>
    
  </body>
</html>
