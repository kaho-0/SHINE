<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "mysql218.phy.lolipop.lan";
    $username = "LAA1517459";
    $password = "Pass0515";
    $dbname = "LAA1517459-ensyu";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("UPDATE users SET name=?, address=?, BD=?, mail=?, PW=?, address1=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['name'], $_POST['address'], $_POST['BD'], $_POST['mail'], $_POST['PW'], $_POST['address1'], $user_id);
    
    if ($stmt->execute() === TRUE) {
        echo "レコードが更新されました";
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close(); 
    $conn->close(); 
}else{
    $name = $address = $BD = $email = $PW = $address1 = '';
if(isset($_SESSION['client'])){
        $name=$_SESSION['client']['name'];
        $address=$_SESSION['client']['address'];
        $address=$_SESSION['client']['BD'];
        $email=$_SESSION['client']['email'];
        $PW=$_SESSION['client']['PW'];
        $address=$_SESSION['client']['address1'];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報管理</title>
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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>○○様の登録情報</h1>
    <div class="container">
        <h2>基本情報</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" required value="<?= $name ?>">
            </div>

            <div class="form-group">
                <label for="address">住所</label>
                <textarea id="address" name="address" required value="<?= $name ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="BD">生年月日</label>
                <input type="date" id="BD" name="BD" required value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="mail">メールアドレス</label>
                <input type="mail" id="mail" name="mail" required value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="PW">パスワード</label>
                <input type="PW" id="PW" name="PW" required value="<?= $name ?>">
            </div>
            <div class="form-group">
                <label for="address1">お届け先の変更</label>
                <textarea id="address1" name="address1" required value="<?= $name ?>"></textarea>
            </div>
        </form>
        <button type="submit">登録情報を確定する</button>
    </form>
</body>
</html>
