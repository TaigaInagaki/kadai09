<?php
// LIGIN認証チェック関数
function loginCheck()
{
  if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
    echo "LOGIN Error";
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

function db_connect()
{
  //1.  DB接続します
  try {
    $pdo = new PDO('mysql:dbname=gs_kadai_db;charset=utf8;host=localhost', 'root', 'root');
  } catch (PDOException $e) {
    exit('DbConnectError:' . $e->getMessage());
  }
  return $pdo;
}
