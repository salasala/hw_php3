<?php
$name = $_POST["name"];
$kansou = $_POST["kansou"];
$date = $_POST["date"];

try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("INSERT INTO movie_table(id, name, kansou, date)VALUES(NULL, :name, :kansou, :date)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  
$stmt->bindValue(':kansou', $kansou, PDO::PARAM_STR);  
$stmt->bindValue(':date', $date, PDO::PARAM_STR);


$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: select.php");
    exit;
}

?>