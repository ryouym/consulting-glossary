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
  <meta name="description" content="コンサルティング用語集">
  <title>コンサルティング用語集</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:800" rel="stylesheet">

</head>
<body>
  <div class="wrapper">
    <div id="site_title"><a href="https://consulting-glossary.com/">コンサル用語集</a></div>
    <div class="top_page_title_list">
      <ul>
        <li>
          <?php
            try {
            //DB名、ユーザー名、パスワード
            $dsn = 'mysql:dbname=LAA1033996-glossary;host=mysql136.phy.lolipop.lan';
            $user = 'LAA1033996';
            $password = 'ndry462bCo';

            $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
            $sql = 'SELECT * FROM contents ORDER BY name asc'; //SELECT文を変数に格納
            $stmt = $PDO->query($sql); // SQLステートメントを実行し、結果を変数に格納

            // foreach文で配列の中身を一行ずつ出力
            foreach ($stmt as $row) {
                echo "<div class='title_name'><a href='http://consulting-glossary.com/item.php?name=".$row['name']."'>".
                $row['name']."<span class='reading'>(".$row['reading'].")</span></a></div>\n";
                $description =  $row['description'];
                echo "<div class='toppage_descritption'>".mb_substr($description, 0, 50)." ...</div>\n";

            }
            } catch (PDOException $e) {
            exit('データベースに接続できませんでした。' . $e->getMessage());
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</body>
</html>
