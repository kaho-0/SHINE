<?php
session_start();
$css = 'style3.css';
require 'header.php';
require 'db-connect.php';

if (isset($_SESSION['client'])) {
    $client_id = $_SESSION['client']['ID'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION['client']['ID'];
        $stmt = $pdo->prepare("UPDATE client SET name=?, yubin=?, address=?, mail=?, PW=? WHERE ID=?");
        $stmt->execute([
            $_POST['name'],
            $_POST['yubin'],
            $_POST['address'],
            $_POST['mail'],
            $_POST['PW'],/*  */
            $user_id,
        ]);
    }
    $sql = $pdo->prepare('SELECT * FROM client WHERE ID = ?');
    $sql->execute([$client_id]);
    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '
<h1>', $row['name'], '様の登録情報</h1>
<div class="container">

    <div class="info-section">
        <p>名前: ', $row['name'], '</p>
        <hr>
        <p>郵便番号: ', $row['yubin'], '</p>
        <hr>
        <p>ご住所: ', $row['address'], '</p>
        <hr>
        <p>電話番号: ', $row['tell'], '</p>
        <hr>
        <p>生年月日: ', $row['BD'], '</p>
        <hr>
        <p>メールアドレス: ', $row['mail'], '</p>
        <hr>';
                // カード番号と有効期限を表示
                if(isset($row['card_num']) && isset($row['card_date'])) {
                    echo '<p>カード番号: ', $row['card_num'], '</p>
                    <hr>
                    <p>有効期限: ', $row['card_date'], '</p>
                    <hr>';
                } else {
                    echo '<p>カード情報は登録されていません。</p>';
                }
        echo '
        <hr>
    </div>
    <div>
        <a href="rireki.php?client_id=', $row['ID'], '">注文履歴</a>
        <a href="toroku1.php">登録情報を変更する</a>
        <form action="logout-input.php" method="post">
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