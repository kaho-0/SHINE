<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "mysql218.phy.lolipop.lan";
    $username = "LAA1517459-ensyu";
    $password = "LAA1517459";
    $dbname = "Pass0515";

    $name = $_POST['name'];
    $postal = $_POST['postal'];
    $address = $_POST['address'];
    $BD = $_POST['birthdate'];
    $email = $_POST['email'];
    $PW = $_POST['password'];
    $delivery_address = $_POST['delivery_address'];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO users (name, postal, address, BD, email, PW, delivery_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $postal, $address, $BD, $email, $PW, $delivery_address);
    
    if ($stmt->execute() === TRUE) {
        echo "新しいレコードが追加されました";
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close(); 
    $conn->close(); 
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
    <h1>○○様の登録情報</h1>
    <div class="container">
        <h2>基本情報</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="postal">郵便番号</label>
                <input type="text" id="postal" name="postal" required>
            </div>
            <div class="form-group">
                <label for="address">住所</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="birthdate">生年月日</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="delivery_address">お届け先の変更</label>
                <textarea id="delivery_address" name="delivery_address" required></textarea>
            </div>
            <button type="submit">登録情報を確定する</button>
        </form>
    </div>
</body>
</html>
