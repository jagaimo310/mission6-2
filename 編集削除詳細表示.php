<!DOCTYPE html>
<html lang="ja">
<head>
    <title>編集削除詳細</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="詳細表示.css">
    <script src="script.js"></script>
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
        <div class="editer"  style="text-align: center;">
            <a href="編集.php?id=<?php echo $_GET["id"]?>&name=<?php echo $_GET["name"] ?>"style=" padding:10px 0px; width:10%; color:black; margin: 10px auto; display:block; background-color:#EFEFEF; border-radius:4px; border:1px solid #767676;">編集</a>
            <!--削除フォームの作成-->
            <form method="post" onsubmit="return alart()" action="削除遷移.php?name=<?php echo $_GET["name"]?>&get=<?php echo $_GET["id"]?>">
                <input type="submit" name="delete" value="削除" class="editForm"  style="padding:10px; width:10%; margin: 10px auto; display:block;">
            </form>
        </div>
        <a href="編集・削除.php?name=<?php echo $_GET["name"]; ?>" class="footer">戻る</a> 
        </div>
    </div>

</body>