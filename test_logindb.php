<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入測試</title>
</head>
<body>

<?php

try {
    $servername = "localhost";
    $dbname   = "school";
    $username = "school";
    $password = "abc123";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $msg ="";
    $username ="";
    $userpass ="";
    if (isset($_POST["submit"])) {

        //檢查帳密是否正確
        $username = $_POST["username"];
        $userpass = $_POST["userpass"];
        $prev = $_POST["prev"];

        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username`='$username' AND `userpass`='$userpass';");
        $stmt->execute();
        
        //帳密正確
        if ($stmt->rowCount()==1) {

            $_SESSION["username"] = $_POST["username"];
        
            if ($_POST['prev'] != "") {
                header('Location: ' . $_POST['prev']);
                exit();
            }

            echo "你好 " . $_SESSION["username"];
            echo "歡迎參觀!";

        } else {
            $msg = $username." 帳號與密碼不正確!";
        }
       
    } 
        $from = "";
        if (isset($_GET["from"])) $from=$_GET["from"];
        
?>

<form action="" method="post">
    <p>
    帳號：<input type="text" name="username" value=<?php echo $username; ?>></p>
    <p>
    密碼：<input type="password" name="userpass" value=<?php echo $userpass; ?>></p>
    <p>
    <input type="hidden" name="prev" value="<?php echo $from; ?>">
    <input type="submit" name="submit" value="登入">
    </p>

</form>
<?php       
    echo $msg;

} catch(PDOException $e) {
    echo "無法連線 Connection failed: " . $e->getMessage();
}
?>

</body>
</html>