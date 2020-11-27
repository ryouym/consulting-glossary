<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-4452324-17"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-4452324-17');
  </script>
  <!-- END-Google Analytics -->

  <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KL94RLQ"></script> <!-- Google Optimize -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="コンサルティング、SAP、IT関連の用語集">
  <title>コンサルティング用語集</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:800" rel="stylesheet">

</head>

<body>
  <div class="wrapper">
    <div id="site_title"><a href="https://consulting-glossary.com/">コンサル用語集</a></div>
      <div class="detail_page_contents">
        <?php
        try {
        	//URLのidの値を取得
        	$name = $_GET['name'];

        	//DB名、ユーザー名、パスワード
        	$dsn = 'mysql:dbname=LAA1033996-glossary;host=mysql136.phy.lolipop.lan';
          $user = 'LAA1033996';
          $password = 'ndry462bCo';

        	$PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
        	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //名前付けされたプレースホルダを用いてプリペアドステートメントを実行する。
          // プレースホルダとはSQLを発行する際に後から値を指定する方法のこと。SQLインジェクションを回避してセキュリティを高める
          $result = $PDO->prepare('SELECT * FROM contents WHERE name = :name');
          $result->bindValue(':name', $name);
          $result->execute();
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<p>分類 | ".$row['category']."</p>";
            echo "<h1>".$row['name']." (".$row['reading'].")</span></h1>";
        		echo "<p>".nl2br($row['description'])."</p>"; //nl2br関数で改行を反映する
        	}

        } catch (PDOException $e) {
        	exit('データベースに接続できませんでした。' . $e->getMessage());
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
