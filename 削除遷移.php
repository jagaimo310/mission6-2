<?php  
//sqlのデータを消去
include('DB.php');
$get=$_GET['get'];
$sql = 'delete from mission62 WHERE id=:get';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':get', $get, PDO::PARAM_INT); 
    
//実行
$stmt->execute();
$name=$_GET['name'];
header("Location: 編集・削除.php?name=$name");
exit();
        
        ?>