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
  コンサル用語検索<br />
  <form method="post" action="glossary_result.php"> <!--postメソッドで、glossary_result.phpに情報を引き渡す-->
    <input type="text" name="name" style="width:100px"><br /> <!--入力された値はtext型。値はnameと名づける-->
    <input type="submit" value="検索"> <!--OKボタンをクリックすると、glossary_add_check.phpに遷移する-->
  </form>
</body>
</html>
