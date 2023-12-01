<?php session_start(); ?> 
<?php
if(isset($_SESSION['client'])){
    unset($_SESSION['client']);
    echo 'ログアウトしました。'; 
    echo '<a href="login-input.php">ログイン</a>';
    require 'index.php'; 
}else{
    echo 'すでにログアウトしています。';
    echo '<a href="login-input.php">ログイン</a>';
}
?>
<?php require 'footer.php'; ?>