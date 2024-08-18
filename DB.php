<?php
//sqltableがなかった場合作成
    $dsn = 'データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
 
    $sql = "CREATE TABLE IF NOT EXISTS mission62"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name TEXT,"
    . "password TEXT,"
    . "title TEXT,"
    . "place TEXT,"
    . "comment TEXT,"
    ."time TIMESTAMP"
    .");"; 

    $stmt = $pdo->query($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS mission62user"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name VARCHAR(255) UNIQUE,"
    . "password TEXT"
    .");"; 

    $stmt = $pdo->query($sql);
    
    function empt(...$elements){
        foreach($elements as $element){
            if(empty($element)){
                return false;
            }
        }
      return true;  
    }
    
    

?>