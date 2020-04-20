<?php 
    if (isset($_POST["submit"])) {

        echo "有收到!";
        /* 取出表單資料 */
        $devName = $_POST["devName"];
        $model = $_POST["model"];
        $price = $_POST["price"];
        $purchaseDate = $_POST["purchaseDate"];
        $specification = $_POST["specification"];
        $depart = $_POST["depart"];
        $manager = $_POST["manager"];
        /*
        echo "<p>品名".$devName."</p>";
        echo "<p>型號".$model."</p>";
        echo "<p>價格".$price."</p>";
        echo "<p>購買日期".$purchaseDate."</p>";
        echo "<p>詳細規格".$specification."</p>";
        echo "<p>部門".$depart."</p>";
        echo "<p>管理者".$manager."</p>";
        */
        $servername = "localhost";
        $dbname   = "school";
        $username = "school";
        $password = "abc123";

        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

            // set the PDO error mode to exception
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO `device` (`devID`, `devName`, `model`, `price`, `purchaseDate`, `specification`, `depart`, `manager`) VALUES (NULL, '$devName', '$model', '$price', '$purchaseDate', '$specification', '$depart', '$manager');");
            $stmt->execute();

            header('Location: device_list.php');
            exit();

        } catch(PDOException $e) {

            echo "無法連線 Connection failed: " . $e->getMessage();

        }


    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增設備項目</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
</head>
<body>
    <div class="container">
    <h1>新增資料</h1>
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="devName">品名</label>
       <input type="text" name="devName" class="form-control">
    </div>
    <div class="form-group">
       <label for="model">型號</label>
       <input type="text" name="model" class="form-control">
    </div>

    <div class="form-group">
       <label for="price">價格</label>
       <input type="text" name="price" class="form-control">
    </div>

    <div class="form-group">
       <label for="purchaseDate">購買日期</label>
       <input type="date" name="purchaseDate" class="form-control" value="<?php echo date('Y-m-d');?>">
    </div>

    <div class="form-group">
                <label for="specification">詳細規格</label>
                <textarea name="specification" rows="10" class="form-control"></textarea>
                <script> CKEDITOR.replace( 'specification' ); </script>
    </div>
    
    <div class="form-group">
        <label for="depart">部門</label>
        <select id="depart" name="depart" class="form-control">
            <option value="數位系">數位系</option>
            <option value="英文系">英文系</option>
            <option value="應華系">應華系</option>
        </select>
    </div>

    <div class="form-group">
       <label for="manager">管理者</label>
       <input type="text" name="manager" class="form-control">
    </div>

    <p> <input type="submit" name="submit" value="確認新增">  </p>

    </form>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
<?php 
    }
?>