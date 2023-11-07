<?php session_start(); ?>
<?php require "header.php"; ?>
<?php require "db-connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
</head>
<body>
<div class="container">
    <?php
    if (isset($_SESSION['client'])){
        unset($_SESSION['client']);
        echo '<div class="success-message">ログアウトしました:)</div>';
    }else{
        echo '<div class="info-message">すでにログアウトしています:(</div>';
    }
        echo '<a href="menu.php">トップに戻ろう</a><br>';
    ?>
</div>
<?php require 'footer.php'; ?>
</body>
</html>