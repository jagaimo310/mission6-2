<!DOCTYPE html>
<html lang="ja">
<head>
    <title>詳細</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="詳細表示.css">
</head>

<body>
    <div class="header">
        <h1 class="title">temples and shrines</h1>
    </div>
    



    <?php
    $get=$_GET['id'];
    include('DB.php');
    $sql = 'SELECT* FROM mission62 where id =:get';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':get', $get, PDO::PARAM_INT);
    //実行
    $stmt->execute();
    //新規作成フォームに検索された内容を表示
    $results = $stmt->fetchAll();  
            
    ?>

    <div class="blog">
        <div class="form">
            <!--ループして、取得したデータを表示-->
             <?php foreach ($results as $row):
                 $comment=nl2br(htmlspecialchars($row['comment']));?>
                <!--$rowの中にはテーブルのカラム名が入る-->
                <p class="fo formTitle"><?php echo $row['title']; ?></p>
                <p class="fo formName"><?php echo $row['name']; ?></p>
                <p class="fo formPlace"><?php echo $row['place']; ?></p>
                <p class="fo formComment"><?php echo $comment; ?></p>
                <p class="fo formTime"><?php echo $row['time']; ?></p>
            
            <?php endforeach ?>
        </div>
        <a class="footer" href="閲覧画面.php?name=<?php echo $_GET['name']; ?>">戻る</a>
    </div>

</body>