<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    if(isset($_SESSION['client'])){
        $ID=$_SESSION['client']['ID'];
        $sql=$pdo->prepare('select * from client where ID != ? and PW=?');
        $sql->execute([$ID, $_POST['PW']]);
    }else{
        $sql=$pdo->prepare('select * from client where ID=?');
        $sql->execute([$_POST['PW']]);
    }

    if(empty($sql->fetchAll())){
        if(isset($_SESSION['client'])){
            $sql=$pdo->prepare('update client set ID=?,PW=?,name=?,BD=?,mail=?,yubin=?,address=?,tell=?');
            $sql->execute([
                $_POST['ID'],$_POST['PW'],$_POST['name'],$_POST['BD'],$_POST['yubin'],$_POST['address'],$_POST['mail'],$_POST['tell']]);
            $_SESSION['client']=[
                'ID'=>$ID,'PW'=>$_POST['PW'], 'name'=>$_POST['name'],'BD'=>$_POST['BD'],
                'mail'=>$_POST['mail'],'yubin'=>$_POST['yubin'],'address'=>$_POST['address'], 'tell'=>$_POST['tell']
                ];
            echo 'お客様情報を更新しました。';
        }else{
            $sql=$pdo->prepare('insert into client values(?,?,?,?,?,?,?,?)');
            $sql->execute([
                $_POST['ID'],$_POST['PW'],
                $_POST['name'],$_POST['BD'],$_POST['mail'],
                $_POST['yubin'],
                $_POST['address'],$_POST['tell']]);
            echo 'お客様情報を登録しました。';
            echo '<a href="login-input.php">ログイン</a>';
        }
    }else{
        echo 'ログイン名がすでに使用されていますので、変更してください。';
    }
?>
<?php require 'footer.php'; ?>