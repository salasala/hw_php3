<?php

try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
      exit(' データベースに接続できませんでした！！！ '.$e->getMessage());
    }
    $stmt = $pdo->prepare("SELECT * FROM movie_table");
    $status = $stmt->execute();
    
    $show="";
    
    if($status==false){
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);
    }else{
      while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $show .= "<p>";
        $show .='<a href="detail.php?id='.$result["id"].'">';
        $show .=$result["name"]."　　".$result["kansou"]."　　".$result["date"];
        $show .='</a>';

        $show .='　　　　';


        $show .='<a href="delite.php?id='.$result["id"].'">';
        $show .='削除';
        $show .='</a>';

        $show .= "</p>";
      }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Movie Remember</title>
    
</head>
<body>
    <div>
    <div class="container movielove"><?=$show?></div>
    </div>
</body>
</html>