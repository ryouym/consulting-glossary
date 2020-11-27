<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集_用語一覧</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:800" rel="stylesheet">
</head>
<body>

<?php
//tryはデータベースの接続エラー対策
require_once('db_connect.php');
try
{
    //データベースに接続
    $dbh = db_connect();

    //例外処理。PDOのエラーレポートを表示
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL分を使ってレコードを読み込み
    $sql ='SELECT name FROM contents WHERE 1'; //'SELECT name FROM contents WHERE 1'を変数$sqlに格納する。contentsテーブルのnameカラムのすべての情報(Where 1で全部という意味)を取得する
    $stmt = $dbh->prepare($sql); // レコードを呼び出す準備。この行は定型文としてこのまま書く
    $stmt->execute(); // SQL文で指令を出すための命令文。この行は定型文としてこのまま書く

    // データベースから切断するプログラム
    $dbh = null;

    // 一覧を表示する
    print '用語一覧<br /><br />';

    print '<form method="post" action="glossary_branch.php">';

    While(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC); //$stmtから1レコードを取り出す
        if($rec==false){ //もし、$recがなければ（もうデータがなければ）、Whileから抜け出す
          break;
    }
    print '<input type="radio" name="name" value="'.$rec['name'].'">';
    print $rec['name']; //もし、$recがあれば、$recのnameを表示
    print "<br />\n"; //\nはソースコードの改行コード。\nはシングルクオテーションで囲うと文字として出力されてしまうので注意
    // 上記3行は結合すると右記のように表示される。　<input type="radio" name="glossary" value="AA">AA<br />
    }
    print '<input type="submit" name="add" value="追加">';
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '</form>';
}
catch (Exception $e)
{
    print 'ただいま障害により表示できません。';
    exit(); //強制終了の命令
}
?>

</body>
</html>
