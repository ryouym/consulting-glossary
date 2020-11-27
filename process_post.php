<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=LAA1033996-glossary;host=mysql136.phy.lolipop.lan';
    $user = 'LAA1033996';
    $password = 'ndry462bCo';

    $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); //PDOのエラーレポートを表示

    //URLのidの値を取得
    $name = $_POST['name'];
    $reading = $_POST['reading'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $sql = "INSERT INTO contents (name, reading, category, description) VALUES (:name, :reading, :category, :description)"; // INSERT文を変数に格納。:nameや:readingや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $PDO->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array(':name' => $name, ':reading' => $reading,':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行


    echo "<p>name: ".$name."</p>";
    echo "<p>reading: ".$reading."</p>";
    echo "<p>categore: ".$category."</p>";
    echo "<p>description: ".$description."</p>";
    echo '上記を登録しました'; // 登録完了のメッセージ

  } catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
  }

  ini_set( 'display_errors', 1 );

?>
</body>
</html>
