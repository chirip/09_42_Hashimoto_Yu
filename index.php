<?php
session_start();
include("functions.php");
chkSsid();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍登録</title>
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
                <a class="navbar-brand" href="main_after.php">メイン</a>
                <a class="navbar-brand" href="kanri_main.php">書籍管理</a>
                <a class="navbar-brand" href="kanri.php">ユーザー管理</a>
                <a class="navbar-brand" href="logout.php">ログアウト</a>
            <?php } ?>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍登録</legend>
     <label>書籍名：<input type="text" name="bookname"></label><br>
     <label>書籍URL：<input type="text" name="bookurl"></label><br>
     <label><textArea name="detail" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
