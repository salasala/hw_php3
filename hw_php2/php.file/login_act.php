<?php
session_start();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(':lid', $_POST["lid"]); 
$stmt->bindValue(':lpw', $_POST["lpw"]);
$res = $stmt->execute();

if ($res==false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

$val = $stmt->fetch(); 


if ($val["id"] != "") {
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["name"]      = $val['name'];
    header("Location:select.php");
} else {
    header("Location:logout.php");
}
exit();

?>