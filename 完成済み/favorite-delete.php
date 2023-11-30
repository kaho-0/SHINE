<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php

    if(isset($_SESSION['client'])){
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('delete from favorites where client_id=? and shohin_id=?');
        $sql->execute([$_SESSION['client']['ID'],$_GET['id']]);
        echo 'お気に入りに商品を削除しました。';
        echo '<hr>';
    }else{
        echo 'お気に入りに商品を削除するには、ログインしてください。';
    }
    require 'favorite.php';
?>

<?php require 'footer.php'; ?>