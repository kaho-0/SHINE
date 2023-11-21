<?php session_start(); ?>
<?php require "db-connect.php"; ?>
<?php
unset($_SESSION['customer']);
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from customer where login=?');
$sql->execute([$_POST['login']]);
foreach ($sql as $row) {
    if (password_verify($_POST['password'], $row['password']) == true) {
        $_SESSION['customer'] = [
            'id' => $row['id'], 'name' => $row['name'],
            'address' => $row['address'], 'login' => $row['login'],
            'password' => $row['password']
        ];
        echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん';
    } else {
        echo 'ログイン名またはパスワードが違います';
    }
}
?>
</body>

</html>
