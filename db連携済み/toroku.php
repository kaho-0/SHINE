<?php
const SERVER = 'mysql218.phy.lolipop.lan';
const DBNAME = 'LAA1517459-ensyu';
const USER = 'LAA1517459';
const PASS = 'Pass0515';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $pdo = new PDO($connect, USER, PASS);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}

session_start(); 
if (isset($_SESSION['client'])) {
    $client_id = $_SESSION['client']['ID'];
    $sql = $pdo->prepare('SELECT * FROM client WHERE ID = ?');
    $sql->execute([$client_id]);

    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <!DOCTYPE html>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./css/style1.css">
            <title>登録情報</title>
        </head>
        <body>
            <h1>', $row['name'], '様の登録情報</h1>
            <div>
                <p>名前: ', $row['name'], '</p>
                <hr>
                <p>ご住所: ', $row['address'], '</p>
                <hr>
                <p>電話番号: ', $row['tell'], '</p>
                <hr>
                <p>生年月日: ', $row['BD'], '</p>
                <hr>
                <p>メールアドレス: ', $row['mail'], '</p>
                <hr>
                <p>パスワード: ', $row['PW'], '</p>
                <hr>
                <p>カード番号: ', $row['card_number'], '</p>
                <hr>
                <p>セキュリティコード: ', $row['security_code'], '</p>
                <hr>
                <p>有効期限: ', $row['expiration_date'], '</p>
                <hr>
                <p>現在の住所: ', $row['address'], '</p>
                <hr>
            </div>

            <div>
                <a href="rireki.php">注文履歴</a>
                <a href="toroku1.php">登録情報の変更</a>
                <form action="login-input.php" method="post">
                    <input type="submit" value="ログアウト">
                </form>
            </div>
        </body>
        </html>';
    } else {
        echo 'ユーザーの情報が見つかりませんでした。';
    }
} else {
    echo 'ユーザーはログインしていません。情報を表示するにはログインしてください。';
}
?>
