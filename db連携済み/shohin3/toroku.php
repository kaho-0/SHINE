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
if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
    $sql = $pdo->prepare('SELECT * FROM client WHERE ID = ?');
    $sql->execute([$client_id]);

    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        // Display the user's information
        echo ' <!DOCTYPE html>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./css/userlist.css">
            <title>ユーザー情報</title>
        </head>
        <body>
            <h1>ユーザー情報</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>生年月日</th>
                    <th>メールアドレス</th>
                    <th>ご住所</th>
                    <th>電話番号</th>
                </tr>
                <tr>
                    <td>', $row['ID'], '</td>
                    <td>', $row['name'], '</td>
                    <td>', $row['BD'], '</td>
                    <td>', $row['mail'], '</td>
                    <td>', $row['address'], '</td>
                    <td>', $row['tell'], '</td>
                </tr>
            </table>
        </body>
        </html>';
    } else {
        echo 'User information not found.';
    }
} else {
    echo 'User is not logged in. Please log in to view your information.';
}
?>
