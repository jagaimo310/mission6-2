<?php
include('DB.php');
$id=$_GET['id'];
$name=$_GET['name'];
if(empt($_POST["title"],$_POST["place"],$_POST["comment"])){
    $editTitle=$_POST["title"];
    $editPlace=$_POST["place"];
    $editComment=$_POST["comment"];

     //sqlを編集
    $sql = 'UPDATE mission62 SET title=:editTitle,place=:editPlace,comment=:editComment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    //プレースホルダに変数を宛がう
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->bindParam(':editTitle', $editTitle, PDO::PARAM_STR);
    $stmt->bindParam(':editPlace', $editPlace, PDO::PARAM_STR);
    $stmt->bindParam(':editComment', $editComment, PDO::PARAM_STR); 

    //実行
    $stmt->execute();
    $name=$_GET["name"];
    header("Location:  詳細表示.php?name=$name&id=$id");
    exit();
    echo "投稿完了";
}else{
    $false="編集失敗";
    header("Location:  編集.php?name=$name&id=$id&false=$false");
    exit();
}
?>