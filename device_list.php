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
?>
<!doctype html>
<html lang="en">
  <head>
    <title>設備列表</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
    <h2 style="text-align:center;">設備列表</h2>
    <?php
        echo "<table class=\"table table-hover\" id=\"myData\">";
        echo "<tr><th>&nbsp;</th>";
        echo "<th>品名</th>";
        echo "<th>型號</th>";
        echo "<th>價格</th>";
        echo "<th>購買日期</th></tr>";
        $i=0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC) )  {
          $i++;
          echo "<tr><td>$i</td>";
          echo "<td><a href=\"device_show.php?id=";
          echo $row["devID"];
          echo "\">".$row["devName"]."</a></td>";
          echo "<td>".$row["model"]."</td>";
          echo "<td>".$row["price"]."</td>";
          echo "<td>".$row["purchaseDate"]."</td>";
          echo "</tr>";
        }
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
