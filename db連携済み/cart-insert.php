<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<?php
if(isset($_SESSION['client'])){
    $pdo=new PDO($connect, USER, PASS);
    try{
        $sql=$pdo->prepare('insert into cart values(?,?,?)');
        $sql->execute([$_SESSION['client']['ID'],$_POST['S_ID'],$_POST['count']]);
        $id=$_POST['S_ID'];
        if(!isset($_SESSION['shohin'])){
            $_SESSION['shohin']=[];
        }
        $count=0;
        if(isset($_SESSION['shohin'][$id])){
            $count=$_SESSION['shohin'][$id]['count'];
        }
        $_SESSION['shohin'][$id]=[
        'name'=>$_POST['S_name'],
        'price'=>$_POST['S_price'],
        'count'=>$count+$_POST['count']
        ];
        echo '<p>カートに商品を追加しました。</p>';
    }catch(PDOException $e){
        echo 'その商品はすでにカートに入っています。';
    }
    
echo '<hr>';
require 'cart.php';
}else{
    echo 'カートに商品を追加するには、ログインしてください。';
}


?>

<?php require 'footer.php'; ?>