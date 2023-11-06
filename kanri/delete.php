<?php
session_start();
require 'dbconnect.php';

$pdo = new PDO($connect, USER, PASS);

if (isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];

    $sql = 'DELETE FROM client WHERE ID = :client_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':client_id', $client_id, PDO::PARAM_STR); 

    if ($stmt->execute()) {
        echo 'アカウントが削除されました。';
    } else {
        echo 'アカウントの削除に失敗しました。';
    }
} else {
    echo 'ユーザーIDが指定されていません。';
}
?>
