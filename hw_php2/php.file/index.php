<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Movie Memory</title>
    <link href="sample.css" rel="stylesheet">
</head>

<body>

<form method="post" action="insert.php">
<fieldset>
<legend class="title">My Movie Memory</legend>
   
    <div class="movielove">
    <label　for="moviename">映画の名前<input type="text" name="name"></label></br>
    <label>感想<input type="text" name="kansou"></br>
    <label>鑑賞した日<input type="date" name="date"></br>
    <input type="submit" value="保存">
    </div>
    </fieldset>
    </form>

</body>
</html>