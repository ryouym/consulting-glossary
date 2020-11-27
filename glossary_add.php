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
  用語追加<br />
  <br />
  <form method="post" action="glossary_add_check.php"> <!--postメソッドで、glossary_add_check.phpに情報を引き渡す-->
    用語名を入力してください。<br />
    <input type="text" name="name" style="width:100px"><br /> <!--入力された値はtext型。値はnameと名づける-->

    読み方を入力してください。英語はカナ、日本語は平仮名<br />
    <input type="text" name="reading" style="width:100px"><br /> <!--入力された値はtext型。値はreadingと名づける-->

    カテゴリを入力してください。<br />
    <input type="text" name="category" style="width:100px"><br /> <!--入力された値はtext型。値はcategoryと名づける。-->

    用語の説明文を入力してください。<br />
    <textarea name="description" style="width:500px; height:200px;" wrap="soft"></textarea>
    <br />
    <input type="button" onclick="history.back()" value="戻る"> <!--戻るボタンをクリックすると、前の画面に遷移する-->
    <input type="submit" value="OK"> <!--OKボタンをクリックすると、glossary_add_check.phpに遷移する-->
  </form>
</body>
</html>
