<!DOCTYPE html>
<html lang="ja">
<head>
    <title>新規登録</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="投稿.css">
</head>

<body>
     <div class="header">
        <div class="container">
            <h1 class="title">temples and shrines</h1>
        </div>
        <p class="headder"><span class="headerForm">新規登録</span></p>
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
        if(empt($name,$password)){
           
            $sql = "INSERT INTO mission62user (name,password) VALUES (:name,:password)";
            $stmt = $pdo->prepare($sql);
            //プレースホルダに変数を宛がう
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            //実行
            $result=$stmt->execute(); 
            if($result===false){
                
                 echo "重複したユーザー名が登録されています。";
            }else{
                header("Location: 閲覧画面.php?name=$name");
                exit();
            }   
            
        }
    ?>
    <br>
    <a href="閲覧画面.php" class="footer">戻る</a>
    
    </div>    
        
</body>