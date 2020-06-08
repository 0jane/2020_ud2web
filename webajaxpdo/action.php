<?php
session_start();
$action = $_POST["action"];

if ($action == "login") {
    $name1 = $_POST["username"];
    $pass1 = $_POST["userpass"];

    $servername = "localhost";
    $dbname   = "school";
    $username = "school";
    $password = "abc123";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // set the PDO error mode to exception
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username`='$name1' AND `userpass`='$pass1';");
    $stmt->execute();

    //帳密正確
    if ($stmt->rowCount()==1) {
        $_SESSION["username"] = $name1;
        echo "Yes";
    } else {
        echo "No";
    }

} elseif ($action == "logout") {

    unset($_SESSION["username"]);
    session_destroy();  

}
?>