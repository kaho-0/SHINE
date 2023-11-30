<?php
session_start();
require 'db-connect.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['client']['ID'];
    $stmt = $pdo->prepare("UPDATE client SET name=?, address=?, mail=?, PW=?, yubin=? WHERE ID=?");
    $stmt->execute([
        $_POST['name'],
        $_POST['address'],
        $_POST['mail'],
        $_POST['PW'],
        $_POST['yubin'],
        $user_id
    ]);
 
$updatedData = $pdo->prepare('SELECT * FROM client WHERE ID = ?');
$updatedData->execute([$user_id]);
$updatedClient = $updatedData->fetch(PDO::FETCH_ASSOC);
$_SESSION['client'] = $updatedClient;

 
 
}
 
$name = $yubin = $address = $mail = $PW = '';
if (isset($_SESSION['client'])) {
    $name = $_SESSION['client']['name'];
    $yubin = $_SESSION['client']['yubin'];
    $address = $_SESSION['client']['address'];
    $mail = $_SESSION['client']['mail'];
    $PW = $_SESSION['client']['PW'];
}
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録情報変更</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
 
        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            margin-top: 0;
        }
 
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
 
        .form-group {
            margin-bottom: 20px;
        }
 
        label {
            display: block;
            font-weight: bold;
        }
 
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
 
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
 
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form method="post" action="toroku.php">
    <h1><?= $name ?>様の登録情報</h1>
        <div class="container">
            <h2>基本情報</h2>
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" required value="<?= $name ?>">
            </div>

            <div class="form-group">
                <label for="name">郵便番号</label>
                <input type="text" id="yubin" name="yubin" required value="<?= $yubin ?>">
            </div>
 
            <div class="form-group">
                <label for="address">住所</label>
                <input type="address" id="address" name="address" required value="<?= $address ?>">
            </div>
           
            <div class="form-group">
                <label for="mail">メールアドレス</label>
                <input type="mail" id="mail" name="mail" required value="<?= $mail ?>">
            </div>
           
            <div class="form-group">
                <label for="PW">パスワード</label>
                <input type="PW" id="PW" name="PW" required value="<?= $PW ?>">
            </div>
   
            <button type="submit">登録情報を確定する</button>
        </div>
    </form>
</body>
</html>