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
  <div class="wrapper">
    <div id="site_title"><a href="https://consulting-glossary.com/">コンサル用語集</a></div>
      <div class="detail_page_contents">
        <?php
        try
        {
        $name=$_POST['name']; //前の画面から入力値を受け取り、$nameに格納

        // セキュリティ対策入力値を文字列に変換
        $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');

        //$nameがカラならエラーメッセージを表示する
        if($name==''){
          print '用語が入力されていません。<br />';
        }

        //データベースに接続
        $dsn = 'mysql:dbname=LAA1033996-glossary;host=mysql136.phy.lolipop.lan'; //データベース名。''内は一切スペースを入れてはいけない
        $user = 'LAA1033996'; //rootにはユーザ名を入力
        $password = 'ndry462bCo';  //''内にはパスワードを入力
        $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //nameを検索
        $result = $PDO->query("SELECT * FROM contents WHERE name = '$name'");
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          echo "<p>分類 | ".$row['category']."</p>";
          echo "<h1>".$row['name']." (".$row['reading'].")</span></h1>";
          echo "<p>".nl2br($row['description'])."</p>"; //nl2br関数で改行を反映する
        }

        //戻るボタンを表示
        print '<input type="button" onclick="history.back()" value="戻る">';

        // データベースから切断するプログラム
        $dbh = null;
        }
        catch (Exception $e)
        {
          print 'ただいま障害により表示できません。';
          exit(); //強制終了の命令
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
