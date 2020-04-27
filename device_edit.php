<?php

$servername = "localhost";
$dbname   = "school";
$username = "school";
$password = "abc123";

try {

   $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
   // set the PDO error mode to exception
   $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   if (isset($_POST["submit"])) {
        
         // 取出表單的值
        $devID = $_POST["devID"];
        $devName = $_POST["devName"];
        $model = $_POST["model"];
        $price = $_POST["price"];
        $purchaseDate = $_POST["purchaseDate"];
        $specification = $_POST["specification"];
        $depart = $_POST["depart"];
        $manager = $_POST["manager"];

         // 將值寫入到 databse 的 table
         $stmt = $conn->prepare("UPDATE `device` SET `devName` = '$devName', `model` = '$model', `price` = '$price', `purchaseDate` = '$purchaseDate', `specification` = '$specification', `depart` = '$depart', `manager` = '$manager' WHERE `device`.`devID` = $devID;");
         $stmt->execute();
      
         // 將頁面轉到 device_list.php
         header('Location: device_list.php');
         exit();

    } else {

    
      $id ="-1";
      if (isset($_GET["id"])) $id = $_GET["id"];

      $stmt = $conn->prepare("SELECT * FROM `device` WHERE `devID`='$id';");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>修改設備內容</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

  </head>
  <body>
    <div class="container">
    <h2 style="text-align:center;">修改設備內容</h2>
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="devName">品名</label>
       <input type="text" name="devName" class="form-control" value="<?php echo $row["devName"];?>">
    </div>
    <div class="form-group">
       <label for="model">型號</label>
       <input type="text" name="model" class="form-control" value="<?php echo $row["model"];?>">
    </div>

    <div class="form-group">
       <label for="price">價格</label>
       <input type="text" name="price" class="form-control" value="<?php echo $row["price"];?>">
    </div>

    <div class="form-group">
       <label for="purchaseDate">購買日期</label>
       <input type="date" name="purchaseDate" class="form-control" value="<?php echo $row["purchaseDate"];?>">
    </div>

    <div class="form-group">
        <label for="specification">詳細規格</label>
        <textarea name="specification" rows="10" class="form-control"><?php echo $row["specification"]; ?></textarea>
        <script> CKEDITOR.replace( 'specification' ); </script>
    </div>
    
    <div class="form-group">
        <label for="depart">部門</label>
        <select id="depart" name="depart" class="form-control">
            <option value="數位系" <?php if ($row["depart"]=="數位系") echo "selected"; ?>>數位系</option>
            <option value="英文系" <?php if ($row["depart"]=="英文系") echo "selected"; ?>>英文系</option>
            <option value="應華系" <?php if ($row["depart"]=="應華系") echo "selected"; ?>>應華系</option>
        </select>
    </div>

    <div class="form-group">
       <label for="manager">管理者</label>
       <input type="text" name="manager" class="form-control" value="<?php echo $row["manager"];?>">
    </div>

    <p> <input type="submit" name="submit" value="確認修改">  </p>
    
      <input type="hidden" name="devID" value="<?php echo $id;?>">
    </form>


    <?php
        
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
