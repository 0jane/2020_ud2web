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

    $stmt = $conn->prepare("SELECT * FROM `device` WHERE `devID`='$id';");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>設備詳細內容</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
    <h2 style="text-align:center;">設備詳細內容</h2>
    <?php

        echo "<table class=\"table table-hover\" id=\"myData\">";
        echo "<tr><th>項目</th><th>內容</th></tr>";
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
  </body>
</html>
