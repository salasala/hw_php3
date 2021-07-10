<?php
$name = $_POST["name"];
$kansou = $_POST["kansou"];
$date = $_POST["date"];

$id = $_POST["id"]; 



try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("UPDATE movie_table SET name=:name, kansou=:kansou, date=:date WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  
$stmt->bindValue(':kansou', $kansou, PDO::PARAM_STR); 
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();


if ($status==false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header("Location: select.php");
    exit;
}
?>
