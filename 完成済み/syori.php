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

        <?php
            $ID=$PW=$name=$BD=$mail=$yubin=$address=$tell='';
        
            if(isset($_SESSION['client'])){
                $ID=$_SESSION['client']['ID'];
                $PW=$_SESSION['client']['PW'];
                $name=$_SESSION['client']['name'];
                $BD=$_SESSION['client']['BD'];
                $mail=$_SESSION['client']['mail'];
                $yubin=$_SESSION['client']['yubin'];
                $address=$_SESSION['client']['address'];
                $tell = $_SESSION['client']['tell'];
            }
        echo '<p class="syori">郵便番号</p>';
        echo '<p class="syori"><input type="text" name="yubin" class="syoritext" value="',$yubin,'"></p>';
        echo '<p class="syori">住所</p>';
        echo '<p class="syori"><input type="text" name="address1" class="syoritext" value="',$address,'"></p>';
        echo '<p class="syori">建物・マンション名</p>';
        echo '<p class="syori"><input type="text" name="address2" class="syoritext"></p>';
        echo '<p class="syori">メールアドレス</p>';
        echo '<p class="syori"><input type="text" name="mail" class="syoritext" value="',$mail,'"></p>';

        echo '<hr>';
        echo '<p class="syori">お支払方法</p>';
        echo '<p class="syori"><input type="radio" name="way" value="credit" class="syori">クレジットカード　';
        echo '<input type="radio" name="way" value="cash">代金引換</p>';
        echo '<hr>';
        if(isset($_SESSION['client'])){
            
            $total_received = $_POST['total'];
            echo '商品合計：¥' . number_format($total_received),'<br>';

            if($total_received<15000){
                $soryo = 380;
            }else{
                $soryo = 0;

            }
            echo '送料：¥' . number_format($soryo),'<br>';
            echo '合計金額：¥' . number_format($total_received+$soryo);
            
            
            echo '<form action="detalist-insert.php" method="post">';
            echo '<a href="detalist-insert.php" class="btn btn-3d-flip btn-3d-flip2">
            <span class="btn-3d-flip-box2">
              <span class="btn-3d-flip-box-face btn-3d-flip-box-face--front2">注文する<i class="fas fa-angle-right fa-position-right"></i></span>
              <span class="btn-3d-flip-box-face  btn-3d-flip-box-face--back2">いいセンス！<i class="fas fa-angle-right fa-position-right"></i></span>
            </span>
          </a>';
            echo '</form>';
        }
        ?>
    </body>
</html>
