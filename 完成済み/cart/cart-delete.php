<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
    if(isset($_SESSION['client'])){
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('delete from cart where client_id=? and shohin_id=?');
        $sql->execute([$_SESSION['client']['ID'],$_GET['id']]);
        echo 'カート内の商品1件を削除しました。';
        echo '<hr>';
    }else{
        echo 'カート内の商品を削除するには、ログインしてください。';
    }
    require 'cart.php';
?>
<?php require 'footer.php'; ?>