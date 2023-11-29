<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
    if(isset($_SESSION['client'])){
        $pdo=new PDO($connect, USER, PASS);
        try{
            $sql=$pdo->prepare('insert into favorites values(?,?)');
            $sql->execute([$_SESSION['client']['ID'],$_GET['id']]);
            echo 'お気に入りに商品を追加しました。';
            echo '<hr>';
            require 'favorite.php';
        }catch(PDOException $e){
            echo 'すでにお気に入りに入っています。';
        }
    }else{
        echo 'お気に入りに商品を追加するには、ログインしてください。';
    }
?>

<?php require 'footer.php'; ?>