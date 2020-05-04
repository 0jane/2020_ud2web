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
    if (isset($_POST["submit"])) {

        //檢查帳密是否正確

        
        //帳密正確
        $_SESSION["username"] = $_POST["username"];
        echo "你好 " . $_SESSION["username"];
        if ($_POST['prev'] != "") {
           header('Location: ' . $_POST['prev']);
           exit();
        }

        echo "歡迎參觀!";
       
    } else {
        $from = "";
        if (isset($_GET["from"])) $from=$_GET["from"];
        
?>

<form action="" method="post">
    <p>
    帳號：<input type="text" name="username" id=""></p>
    <p>
    密碼：<input type="password" name="userpass" id=""></p>
    <p>
    <input type="hidden" name="prev" value="<?php echo $from; ?>">
    <input type="submit" name="submit" value="登入">
    </p>

</form>

<?php        
    }
?>

</body>
</html>