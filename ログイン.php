<!DOCTYPE html>
<html lang="ja">
<head>
    <title>ログイン</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="投稿.css">
</head>

<body>
     <div class="header">
        <div class="container">
            <h1 class="title">temples and shrines</h1>
        </div>
        <p class="headder"><span class="headerForm">ログイン</span></p>
    </div>
        
    <div class="form">
        <form method="post">
            <input type="text" name="name" placeholder="ユーザー名">
            <input type="password" name="password" placeholder="パスワード">
            <br>
            <input type="submit" name="submit">
        </form>
        
    
    
    <?php
    ini_set('display_errors', 0);
    error_reporting(0);
    include('DB.php');
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');
        if(empt($_POST["name"],$_POST["password"])){
            $sql = 'SELECT password,name FROM mission62user WHERE name=:name';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
             //実行
            $stmt->execute();
            $results = $stmt->fetchAll();
            
            foreach ($results as $row){
                //$rowの中にはテーブルのカラム名が入る
                $formname=$row['name'];
                $formpassword=$row['password'];
            }
            
            if($name==$formname&&$password==$formpassword){
                header("Location: 閲覧画面.php?name=$name");
                exit();
                
                
            }else{
                echo "ユーザー名かパスワードが間違っています";
            }
        }
    ?>
    <br>
    <a class="footer" href="閲覧画面.php">戻る</a>
    
    </div>    
        
</body>