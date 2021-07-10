<?php

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$sql = "SELECT * FROM movie_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();


$view=""; 
if ($status==false) {
   
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    $row = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Movie Memory</title>
    <link href="sample.css" rel="stylesheet">
</head>

<body>

<form method="post" action="update.php">


<fieldset>
<legend class="title">My Movie Memory</legend>
   
    <div class="movielove">
    <label　for="moviename">映画の名前<input type="text" name="name" value="<?=$row["name"]?>"></label></br>
    <label>感想<input type="text" name="kansou" value="<?=$row["kansou"]?>"></br>
    <label>鑑賞した日<input type="date" name="date" value="<?=$row["date"]?>"></br>
     <input type='hidden' name="id" value="<?=$row["id"]?>">
     <input type="submit" value="更新">
   
   <input type="submit" value="保存">
    
    </fieldset>
    </div>
    </form>

</body>
</html>