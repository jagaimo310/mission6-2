<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>投稿</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="投稿.css">
        <script src="script.js"></script>
    </head>
    
    <body>
         <div class="header">
            <div class="container">
                <h1 class="title">temples and shrines</h1>
            </div>
            <p class="headder"><span class="headerForm">投稿</span></p>
        </div>
            
        <div class="form">
            <form action="投稿遷移.php?name=<?php echo $_GET['name']; ?>" method="post">
                <div class="input">
                    <input type="text" name="title" placeholder="タイトル" >
                    <input type="text" name="place" placeholder="場所" class="text">
                    <br>
                </div>
                <textarea type="text" name="comment" class="comment"></textarea>
                <input type="submit" name="submit" class="submit">
            </form>
                <a class="footer" href="閲覧画面.php?name=<?php echo $_GET["name"]; ?>">戻る</a>
            <?php
            include('DB.php');
            @$false=$_GET['false'];
                if(empt($false)):?>
                <script  type="text/javascript">empty();</script>
            <?php endif;?>
        </div>
    </body>
</html>