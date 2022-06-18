<?php
//入力チェック(受信確認処理追加)
if (
  !isset($_POST["name"]) || $_POST["name"] == "" ||
  !isset($_POST["place"]) || $_POST["place"] == "" ||
  !isset($_POST["email"]) || $_POST["email"] == ""
) {
  exit('ParamError');
}

//1. POSTデータ取得
$name = $_POST['name'];
$place = $_POST['place'];
$email = $_POST['email'];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DbConnectError:' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_kadai_table_1(id, name, place, email) VALUES(NULL, :name, :place, :email)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':place', $place, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:" . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
