<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集_編集確認画面</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:800" rel="stylesheet">
</head>

<body>
<?php
$name=$_POST['name']; //前の画面から入力値を受け取り、$nameに格納
$reading=$_POST['reading']; //前の画面から入力値を受け取り、$readingに格納
$category=$_POST['category']; //前の画面から入力値を受け取り、$categoryに格納
$description=$_POST['description']; //前の画面から入力値を受け取り、$escriptionに格納

$name=htmlspecialchars($name,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
$reading=htmlspecialchars($reading,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
$category=htmlspecialchars($category,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）
$description=htmlspecialchars($description,ENT_QUOTES,'UTF-8'); //文字列に変換（セキュリティ対策）

//$nameがカラならエラーメッセージを表示する
//$nameが入力されていれば、$nameを表示する
if($name==''){
  print '用語名が入力されていません。<br />';
}
else
{
  print '用語名：';
  print $name;
  print '<br /><br />';
}

//$readingがカラならエラーメッセージを表示する
//$readingが入力されていれば、$readingを表示する
if($reading==''){
  print '読み方が入力されていません。<br />';
}
else
{
  print '読み：';
  print $reading;
  print '<br /><br />';
}

//$categoryがカラならエラーメッセージを表示する
//$categoryが入力されていれば、$categoryを表示する
if($category==''){
  print 'カテゴリが入力されていません。<br />';
}
else
{
  print 'カテゴリ：';
  print $category;
  print '<br /><br />';
}

//$descriptionがカラならエラーメッセージを表示する
//$descriptionが入力されていれば、$categoryを表示する
if($description==''){
  print '用語説明が入力されていません。<br /><br />';
}
else
{
  print '用語説明：';
  print $description;
  print '<br /><br />';
}

//$name、$category、$descriptionのいずれかがカラなら、戻るボタンのみを表示する
//入力項目が適切なら、戻るボタンとOKボタンを表示する。
if($name==''|| $reading==''|| $category=='' || $description==''){
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<form>';
}
else
{
  print '<form method="post" action="glossary_edit_done.php">';
  print '<input type="hidden" name="name" value="'.$name.'">'; //'<input type="hidden" name="name" value="'と$glossary_nameをドットで連結
  print '<input type="hidden" name="reading" value="'.$reading.'">'; //'<input type="hidden" name="namereading" value="'と$glossary_readingをドットで連結
  print '<input type="hidden" name="category" value="'.$category.'">'; //'<input type="hidden" name="category" value="'と$glossary_categoryをドットで連結
  print '<input type="hidden" name="description" value="'.$description.'">'; //'<input type="hidden" name="description" value="'と$glossary_descriptionをドットで連結
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>
</body>
</html>
