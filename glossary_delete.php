<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集_編集画面</title>
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
  $name=$_GET['name']; //前画面のlist.phpからGETでnameを受け取る

  //データベースに接続
  $dbh = db_connect();

  //例外処理。PDOのエラーレポートを表示
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // SQL分を使ってレコードを読み込み
  $sql ='SELECT reading, category, description FROM contents WHERE name=?'; //'SELECT name FROM contents WHERE glossary=?'を変数$sqlに格納する。contentsテーブルのnameカラムのあとで指定する(?のこと)値の情報を取得する
  $stmt = $dbh->prepare($sql); // レコードを検索する準備。この行は定型文としてこのまま書く
  $data[] = $name; // 上の上の行の?の値を設定する
  $stmt->execute($data); // SQL文で指令を出すための命令文。この行は定型文としてこのまま書く

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $category=$rec['reading'];
  $category=$rec['category'];
  $description=$rec['description'];

  // データベースから切断するプログラム
  $dbh = null;
}
catch (Exception $e)
{
  print 'ただいま障害により表示できません。';
  exit(); //強制終了の命令
}
?>

用語削除<br /><br />
用語<br />
<?php print $name; ?>
<br />
この用語を削除してよろしいですか？<br /><br />
<form method="post" action="glossary_delete_done.php">
<input type="hidden" name="name" style="width:200px" value="<?php print $name?>"><br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
