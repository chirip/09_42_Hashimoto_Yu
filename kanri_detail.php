<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
session_start();
//0.外部ファイル読み込み
include("functions.php");
chkSsid();

$id = $_GET["id"];
// echo $id; //確認用

//1.  DB接続します
  $pdo = db_con();
  //２．データ登録SQL作成
  $stmt = $pdo->prepare("SELECT * FROM 09kadai_user_table WHERE id=:id");
  $stmt ->bindValue(":id", $id, PDO::PARAM_INT);//第3引数は数字なら_INT　文字ならTEXT
  $status = $stmt->execute();
  
  //３．データ表示
  $view="";
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    error_db_info($stmt);
  }else{
        $row = $stmt->fetch();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザーデータ　変更</title>
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
<form method="post" action="kanri_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザーデータ　変更</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>" required></label><br>
     <label>ID：<input type="text" name="lid" value="<?=$row["lid"]?>" required></label><br>
     <label>PASS：<input type="text" name="lpw" value="<?=$row["lpw"]?>" required></label><br>
     <label>管理フラグ<input type="number" name="kanri_flg" value="<?=$row["kanri_flg"]?>" required></label><br>
     <label>アクティブフラグ：<input type="number" name="life_flg" value="<?=$row["life_flg"]?>" required></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
