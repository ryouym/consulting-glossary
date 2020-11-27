<?php
$description = "コンサルティング業界固有のカタカナ語や略語、ITやシステム関連の専門用語をまとめた用語集です。";
$title = "コンサルティング用語集 | 用語一覧";
require("header.php");
?>

<body>
  <div class="wrapper">
    <div id="site_title"><a href="https://consulting-glossary.com/">コンサル用語集</a></div>
    <div class="top_page_title_list">
      <ul>
        <li>
          <?php
            require_once('db_connect.php');
            try {
            //データベースに接続
            $dbh = db_connect();

            //例外処理。PDOのエラーレポートを表示
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //データベースからデータを取得
            $sql = 'SELECT * FROM contents ORDER BY name asc'; //SELECT文を変数に格納
            $stmt = $dbh->query($sql); // SQLステートメントを実行し、結果を変数に格納

            // foreach文で配列の中身を一行ずつ出力
            foreach ($stmt as $row) {
                echo "<div class='title_name'><a href='http://consulting-glossary.com/item.php?name=".$row['name']."'>".$row['name'].
                    "<span class='reading'>(".$row['reading'].")</span></a></div>\n";
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
