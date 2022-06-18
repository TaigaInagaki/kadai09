<?php
//1. セッションを開始
session_start();

// 2. ポストで受け取る
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_kadai_user_table_1 WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();

//4. SQL実行時にエラーがある場合STOP
if ($res === false) {
  $error = $stmt->errorInfo();
  exit("QueryError:" . $error[2]);
}

//5. 抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法

// 6. 該当レコードがあればSESSIOnに値を代入
if ($val['id'] != '') {
  //Login成功時 該当レコードがあればSESSIONに値を代入
  $_SESSION['chk_ssid'] = session_id();
  $_SESSION['name'] = $val['name'];
  // 成功の場合select.phpへ遷移
  header('Location: select.php');
} else {
  //Login失敗時(Logout経由)
  header('Location: login.php');
}

exit();
