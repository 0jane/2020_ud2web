<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員頁面</title>
</head>
<body>
    <h1>Hello</h1>
    <?php 
        if (isset($_GET["logout"]) && $_GET["logout"]=='1') {
            unset($_SESSION["username"]);
            session_destroy();
            echo "尚未登入, 請先登入:<a href='test_logindb.php?from=".$_SERVER['PHP_SELF']."'>login</a>";
        } else {
            if (isset($_SESSION["username"]) && $_SESSION["username"]!="") {
                echo $_SESSION["username"]."你好";
                echo "<p>會員相關資訊...</p>";
                echo "<p><a href=\"?logout=1\">登出系統</a></p>";
            } else {
                echo "尚未登入, 請先登入:<a href='test_logindb.php?from=".$_SERVER['PHP_SELF']."'>login</a>";
            }
        }
    ?>
</body>
</html>