<?php
$name=$_GET["name"];
include('DB.php');
    
    $title=$_POST["title"];
    $place=$_POST["place"];
    $comment=$_POST["comment"];
    
if(empt($_POST["title"],$_POST["place"],$_POST["comment"])){
    //sqlに反映
    $sql = "INSERT INTO mission62 (name,title,place,comment,time) VALUES (:name,:title,:place,:comment,NOW())";
    $stmt = $pdo->prepare($sql);
    //プレースホルダに変数を宛がう
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':place', $place, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR); 
    //実行
    $stmt->execute(); 
    $name=$_GET['name'];
    header("Location: 閲覧画面.php?name=$name");
    exit(); 

}else{
    $false="投稿失敗";
    header("Location:投稿.php?name=$name&false=$false");
    exit(); 
}
?>
