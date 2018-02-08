<?php
session_start();
//0.外部ファイル読み込み
include("functions.php");
chkSsid();
//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM 09kadai_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  error_db_info();
  
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<tr>';

    $view .='<td>';
    $view .='<a href="kanri_detail.php?id='.$result["id"].'">';
    $view .= $result["name"];
    $view .='</a>';    
    $view .='</td>';

    $view .='<td>';
    $view .= $result["lid"];
    $view .='</td>';

    $view .='<td>';
    $view .= $result["lpw"];
    $view .='</td>';

    $view .='<td>';
    $view .= $result["kanri_flg"];
    $view .='</td>';

    $view .='<td>';
    $view .= $result["life_flg"];
    $view .='</td>';

    $view .='<td>';
    $view .='<a href="kanri_delete.php?id='.$result["id"].'">';
    $view .='[削除]';
    $view .='</a>';
    $view .='</td>';
    
    $view .='</tr>';
    
  
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
  div{padding: 10px;font-size:16px;}
  table{  width: 100%; margin:15px;}
  legend{margin-left: 10px;}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<!-- ログイン後メニュー -->
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
<div>
  <div class="container jumbotron">
    <legend>ユーザー一覧</legend>
    <table>
      <tr>
      <th>区分</th>
      <th>ID</th>
      <th>PASS</th>
      <th>管理</th>
      <th>LIFE</th>
      <th>削除</th>
      </tr>
      <?=$view?>
    </table>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
