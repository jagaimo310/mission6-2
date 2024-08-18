<!DOCTYPE html>
<html lang="ja">
<head>
    <title>編集</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="投稿.css">
    <script src="script.js"></script>
</head>

<?php
$id=$_GET['id'];
$name=$_GET['name'];
include('DB.php');
$sql = 'SELECT* FROM mission62 where id =:id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
//実行
$stmt->execute();
//新規作成フォームに検索された内容を表示
$results = $stmt->fetchAll();  

foreach ($results as $row){
     $comment=$row['comment'];
    //$rowの中にはテーブルのカラム名が入る
     $title=$row["title"];
     $place=$row["place"];
 
    }

?>
<body>
     <div class="header">
        <div class="container">
            <h1 class="title">temples and shrines</h1>
        </div>
        <p class="header" style="text-align:right;"><span class="headerForm">編集</span></p>
    </div>
        
    <div class="form">
        <form action="編集遷移.php?id=<?php echo $id ?>&name=<?php echo $name ?>" method="post" >
            <div class="input">
                <input type="text" name="title" value=<?php echo $title ?>>
                <input type="text" name="place" value=<?php echo $place ?>>
                <br>
            </div>
            <textarea type="text" name="comment" class="comment"><?php echo $comment ?></textarea>
            <input type="submit" name="submit" class="submit">
        </form>
        <a class="footer" href="編集・削除.php?name=<?php echo $_GET["name"]; ?>">戻る</a>
        <?php 
        @$false=$_GET['false'];
        if(empt($false)):?>
                <script  type="text/javascript">empty();</script>
        <?php endif;?>
    </div>
</body>
