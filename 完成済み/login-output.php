<?php session_start(); ?>
<?php require 'db-connect.php'; ?> 
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['client']);
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from client where ID=?');
$sql->execute([$_POST['ID']]);

if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    if ($_POST['PW'] == $row['PW']) {
        $_SESSION['client'] = [
            'ID' => $row['ID'], 'PW' => $row['PW'], 'name' => $row['name'], 'BD' => $row['BD'],
            'address' => $row['address'], 'mail' => $row['mail'] ,'tell'=>$row['tell']
        ];
    } else {
        echo 'ログイン名またはパスワードが違います。';
    }
} else {
    echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require 'footer.php'; ?>
