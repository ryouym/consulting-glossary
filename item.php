<?php
//URLのidの値を取得
$name = $_GET['name'];

$description = "コンサルティング業界固有のカタカナ語や略語、ITやシステム関連の専門用語をまとめた用語集です。";
$title = "コンサルティング用語集 | ".$name."とは";
require("header.php");
?>

<body>
    <div class="wrapper">
        <div id="site_title"><a href="https://consulting-glossary.com/">コンサル用語集</a></div>
            <div class="detail_page_contents">
            <?php
            try {
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
