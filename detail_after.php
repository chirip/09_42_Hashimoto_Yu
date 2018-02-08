<?php 

session_start();
include("functions.php");
chkSsid();


$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍詳細(ログイン)</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header">
            <?php if($_SESSION["kanri_flg"]=="0"){ ?>
            <a class="navbar-brand" href="main_after.php">メイン</a>
            <a class="navbar-brand" href="my_page.php">マイページ</a>
            <a class="navbar-brand" href="index.php">書籍登録</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
            <?php } ?>

            <!-- 管理者用メニュー表示 -->
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
                <a class="navbar-brand" href="kanri_main.php">書籍管理</a>
                <a class="navbar-brand" href="kanri_user.php">ユーザー管理</a>
                <a class="navbar-brand" href="logout.php">ログアウト</a>
            <?php } ?>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍登録</legend>
     <label>書籍名：<input type="text" name="bookname"  value="<?=$row["bookname"]?>"></label><br>
     <label>書籍URL：<input type="text" name="bookurl" value="<?=$row["bookurl"]?>"></label><br>
     <label><textArea name="detail" rows="4" cols="40"><?=$row["detail"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
