<?php
//1.GETでid値を取得
$id = $_GET['id'];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_kadai_table_1 WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT) 更新したいIDを渡す
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:" . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}
