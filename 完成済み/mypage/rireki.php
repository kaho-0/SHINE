<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style2.css">
    <title>注文履歴</title>
</head>
<body>
<?php
require 'db-connect.php';
require 'header.php';

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];

    $sql = $pdo->prepare('SELECT detalist.*, client.name, shohin.S_name,
                            shohin.S_size, shohin.S_price, shohin.img_pass,shohin.S_color 
                          FROM detalist 
                          INNER JOIN client ON detalist.client_id = client.ID 
                          INNER JOIN shohin ON detalist.shohin_id = shohin.S_ID 
                          WHERE detalist.client_id = ?');

    $sql->execute([$client_id]);
    $purchase_history = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($purchase_history)) {
        echo '<h1 class="rireki">', $purchase_history[0]['name'], '様の注文履歴</h1>';
        echo '<hr>';
        echo '<h1 class="kensu">件数：', count($purchase_history), '件</h1>';

        foreach ($purchase_history as $item) {
            echo '<img src="' . $item['img_pass'] . '" width="250" height="250">';
            echo '<div class="shohin">';
            echo '<p>商品名: ' . $item['S_name'] . '</p>';
            echo '<p>カラー： ' . $item['S_color'] . '</p>';
            echo '<p>サイズ： ' . $item['S_size'] . '</p>';
            echo '<p>￥' . $item['S_price'] . '<span style="margin-right: 150px;"></span>数量：' . $item['kosu'] . '</p>';
            echo '</div>';
            echo '<hr>';
        }
    } else {
        echo '注文履歴がありません。';
    }
} else {
    echo 'ユーザーIDが指定されていません。';
}

?>
</body>
</html>