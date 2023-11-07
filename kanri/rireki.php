<?php
session_start();
require 'header.php';  
if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
 
    foreach ($purchase_history as $item) {
        echo '<h1 class="rireki">' . $item['client_name'] . '様の注文履歴</h1>';
        echo '<hr>';
        echo '<h1 class="kensu">件数：' . count($purchase_history) . '件</h1>';
        echo '<img src="' . $item['product_image'] . '" width="200" height="200">';
        echo '<div class="shohin">';
        echo '<p>商品名: ' . $item['product_name'] . '</p>';
        echo '<p>カラー/サイズ: ' . $item['color_size'] . '</p>';
        echo '<p>￥' . $item['price'] . '<span style="margin-right: 150px;"></span>数量：' . $item['quantity'] . '</p>';
        echo '</div>';
        echo '<hr>';
    }
} else {
    echo 'ユーザーIDが指定されていません。';
}
?>
