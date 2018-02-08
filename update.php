<?php
include("functions.php");
//1.POSTでParamを取得
$id     = $_POST["id"];
$bookname   = $_POST["bookname"];
$bookurl  = $_POST["bookurl"];
$detail = $_POST["detail"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_an_table 
SET bookname=:bookname, bookurl=:bookurl, detail=:detail WHERE id=:id");
$stmt->bindValue(':bookname', $bookname,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: my_page.php");
  exit;
}

?>


