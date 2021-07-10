<?php
$id = $_GET["id"];

try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("DELETE FROM movie_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);  
$status = $stmt->execute();

if ($status==false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header("Location: select.php");
    exit;
}


?>