<!DOCTYPE html>
<html lang="ja">
<head>
    <title>閲覧</title>    
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="閲覧画面.css">
</head>

<body>
 <div class="header">
    <div class="container">
        <h1 class="title">temples and shrines</h1>
        <div class="form" style="text-align:right;">
            <?php if(empty($_GET['name'])):?>
                <a href="ログイン.php">ログイン</a>
                <a href="新規登録.php">新規登録</a>
            <?php else: ?>
                <a href="投稿.php?name=<?php echo $_GET['name']; ?>" class="create">投稿</a>
                <a href="編集・削除.php?name=<?php echo $_GET['name']; ?>" class="create">編集・削除</a>
                <a href="閲覧画面.php" class="create">ログアウト</a>
            <?php endif;?>
        </div>
    </div>
 </div>







<?php
include('DB.php');

$sql = 'SELECT* FROM mission62 ORDER BY id DESC';
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(); 
@$name=$_GET['name'];
?>

<div class="blog">
    <div class="container">
    <!--ループして、取得したデータを表示-->
        <?php foreach ($results as $row): 
            $comment=nl2br(htmlspecialchars($row['comment']));?>
        <!--$rowの中にはテーブルのカラム名が入る-->
            <a href="詳細表示.php?id=<?php echo $row['id']; ?>&name=<?php echo $name ?>" class="blogTitle"><?php echo $row['title']."<br>"; ?></a>
            <?php echo $row['place']."<br>"; ?>
            <?php echo $comment."<br>"; ?>
            <?php echo "<hr>"; ?>
    
        <?php endforeach ?>
    </div>
</div>

</body>