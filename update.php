<?php
//1.GETでid値を取得
$id = $_GET['id'];

include("funcs.php");
loginCheck();
$pdo = db_connect();

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}

//3.データ登録SQL作成
$sql = "SELECT * FROM gs_kadai_table_1 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
$view = "";
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:" . $error[2]);
} else {
  //1データのみ抽出をするため、whileループで取り出さない
  $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録ページ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="select.php">データ一覧</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>

  <form method="post" action="renew.php">
    <div class="mb-3">
      <label for="exampleInputName" class="form-label">名前</label>
      <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" value="<?= $row["name"] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputplace" class="form-label">国籍</label>
      <input type="text" name="place" class="form-control" id="exampleInputplace" value="<?= $row["place"] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail" class="form-label">メールアドレス</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?= $row["email"] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $row["id"] ?>">
    <button type="submit" class="btn btn-primary">送信</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>