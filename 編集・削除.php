<!DOCTYPE html>
<html lang="ja">
<head>
    <title>編集・削除</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="閲覧画面.css">
</head>

<body>
     <div class="header">
            <div class="container">
                <h1 class="title">temples and shrines</h1>
            </div>
            <p class="headder" style="text-align: right;"><span class="headerForm">編集・削除</span></p>
    </div>
    
    <?php
    include('DB.php');
    $name=$_GET['name'];
    $sql = 'SELECT* FROM mission62 where name=:name ORDER BY id DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(); 
    ?>
    
    <div class="blog">
        <div class="container">
        <!--ループして、取得したデータを表示-->
            <?php foreach ($results as $row): 
                $comment=nl2br(htmlspecialchars($row['comment']));?>
            <!--$rowの中にはテーブルのカラム名が入る-->
                <a href="編集削除詳細表示.php?id=<?php echo $row['id']; ?>&name=<?php echo $name ?>" class="blogTitle"><?php echo $row['title']."<br>"; ?></a>
                <?php echo $row['place']."<br>"; ?>
                <?php echo $comment."<br>"; ?>
                <?php echo "<hr>"; ?>
        
            <?php endforeach ?>
        </div>
        <a class="footer" href="閲覧画面.php?name=<?php echo $name ?>">戻る</a>
    </div>

</body>