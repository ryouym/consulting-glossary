<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:800" rel="stylesheet">
</head>
<body>

<?php
require_once('db_connect.php');

//tryはデータベースの接続エラー対策
try
{
  // POSTメソッドで前の画面の入力値を取得する
  $name = $_POST['name'];
  $reading = $_POST['reading'];
  $category = $_POST['category'];
  $description = $_POST['description'];

  // セキュリティ対策入力値を文字列に変換。出力時にエスケープする
  // エスケープ忘れ、多重エスケープ、エスケープ前の文字列が必要になった際にhtmlspecialchars_decode()等で元に戻す必要があるため
  $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
  $reading = htmlspecialchars($reading,ENT_QUOTES,'UTF-8');
  $category = htmlspecialchars($category,ENT_QUOTES,'UTF-8');
  $description = htmlspecialchars($description,ENT_QUOTES,'UTF-8');

  //データベースに接続
  $dbh = db_connect();

  //例外処理。PDOのエラーレポートを表示
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // SQL分を使ってレコードを追加
  $sql ='INSERT INTO contents(name,reading,category,description) VALUES (?,?,?,?)'; //'INSERT INTO mst_staff(name,reading,category,description) VALUES (?,?,?,?)'を変数$sqlに格納する
  $stmt = $dbh->prepare($sql); // レコードを追加する準備。この行は定型文としてこのまま書く
  $data[] = $name; // 一つ目の?にセットしたいデータが入っている変数を書く
  $data[] = $reading; // 二つ目の?にセットしたいデータが入っている変数を書く
  $data[] = $category; // 三つ目の?にセットしたいデータが入っている変数を書く
  $data[] = $description; // 四つ目の?にセットしたいデータが入っている変数を書く
  $stmt->execute($data); // SQL文で指令を出すための命令文。この行は定型文としてこのまま書く

  // データベースから切断するプログラム
  $dbh = null;

  //結果を表示
  print $name;
  print 'を追加しました。<br />';

}
catch (Exception $e)
{
  print 'ただいま障害により接続できません。';
  exit(); //強制終了の命令
}
?>

<a href="glossary_list.php">戻る</a>

</body>
</html>
