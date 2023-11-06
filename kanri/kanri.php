<?php
session_start();
require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style2.css">
    <title>ユーザー管理</title>
</head>
<body calss="b">

    <div class="header-logo">
        <h1 class="shine">SHINE</h1>
    </div>
    <div class="cnt">
        <h1>ユーザー管理</h1>
        <?php
            if (isset($_GET['client_id'])) {
                $client_id = $_GET['client_id'];
                $pdo = new PDO($connect, USER, PASS);
                $sql = 'SELECT * FROM client WHERE ID = :client_id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':client_id', $client_id, PDO::PARAM_STR); 
                $stmt->execute();
                $client = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($client) {
                echo '<p>お名前： ','<span style="color: red;">' . $client['name'] . '</span> 生年月日： ','<span style="color: red;">' . $client['BD'] . '</span></p>';
                echo '<p>住所： ','<span style="color: red;">' . $client['address'] . '</span></p>';
                echo '<p>メールアドレス： ','<span style="color: red;">' . $client['mail'] . '</span></p>';
                echo '<p>電話番号： ','<span style="color: red;">'  . $client['tell'] .  '</span></p>';
            } else {
                echo '登録された情報が見つかりませんでした。';
            }
            } else {
                echo 'ユーザーIDが指定されていません。';
            }
        ?>
     
        <hr>
        <form method="post" action="delete.php">
        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
        <input type="submit" class="button" value="アカウント削除" style="background: red; color: white;">
    </form>

    </div>
    <hr>

    <div class="moji">
        購入した商品
    </div>

    <img src="./img/favo.png" width="200" height="200">

    <div class="shohin">
        <p>商品名</p>
        <p>カラー：○○<span style="margin-right: 80px;"></span>数量：○</p>
        <p>サイズ：○<span style="margin-right: 80px;"></span>￥○○○○円</p>
    </div>
    <hr>
</body>
</html>