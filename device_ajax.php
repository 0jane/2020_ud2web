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
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getdevice.php?id="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">選擇一個項目</option>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC) )  {
    echo "<option value=".$row["devID"].">".$row["devName"]."</option>";
}
?>
  </select>
</form>
<br>
<div id="txtHint"><b>設備的詳細資料將會顯示在這裡...</b></div>

</body>
</html>
<?php
  } catch(PDOException $e) {
        echo "無法連線 Connection failed: " . $e->getMessage();
  }
?>