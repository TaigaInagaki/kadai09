<?php
// いつもsession_startから
session_start();

// sessionを初期化（空にする）
$_SESSION = array();

// Cookieに保存されているsessionIDを破棄
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}

// サーバー側でのsessionIDを破棄
session_destroy();

// 処理後、index.phpへリダイレクト
header("Location: login.php");
exit();
