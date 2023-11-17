<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>
        

        <div class="syori">
            <h1 class="syori">ARIGATOU!</h1>
        </div>
        <p class="syori">郵便番号</p>
        <p class="syori"><input type="text" name="yubin" class="syoritext"></p>
        <p class="syori">住所</p>
        <p class="syori"><input type="text" name="address1" class="syoritext"></p>
        <p class="syori">建物・マンション名</p>
        <p class="syori"><input type="text" name="address2" class="syoritext"></p>
        <p class="syori">メールアドレス</p>
        <p class="syori"><input type="text" name="mail" class="syoritext"></p>
        <hr>
        <p class="syori">お支払方法</p>
        <p class="syori"><input type="radio" name="way" value="credit" class="syori">クレジットカード　
        <input type="radio" name="way" value="cash">代金引換</p>
        <p class="syori"><input type="radio" name="way" value="conveni" class="syori">コンビニ支払い　
        <input type="radio" name="way" value="pay" class="syori">PayPay</p>
        <hr>
        <?php
        if(isset($_SESSION['client'])){
            $total_received = $_POST['total'];
            echo '合計金額：¥' . number_format($total_received);
            
            echo '<form action="detalist-insert.php" method="post">';
            echo '<p class="syori"><input type="submit" value="注文する" class="syori"></p>';
            echo '</form>';
        }
        ?>
    </body>
</html>
