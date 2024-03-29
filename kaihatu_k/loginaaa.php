<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //①エラーメッセージの初期状態を空に
    $err_msg = "";

    //②サブミットボタンが押されたときの処理
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //③データが渡ってきた場合の処理
        try {
            $db = new PDO('mysql:host=localhost; dbname=データベース名', 'ユーザー名', 'パスワード');
            $sql = 'select count(*) from users(認証するテーブル名) where username=? and password=?';
            $stmt = $db->prepare($sql);
            $stmt->execute(array($username, $password));
            $result = $stmt->fetch();
            $stmt = null;
            $db = null;

            //④ログイン認証ができたときの処理
            if ($result[0] != 0) {
                header('Location: http://localhost/home.php');
                exit;

                //⑤アカウント情報が間違っていたときの処理
            } else {
                $err_msg = "アカウント情報が間違っています。";
            }

            //⑥データが渡って来なかったときの処理
        } catch (PDOExeption $e) {
            echo $e->getMessage();
            exit;
        }
    }
    ?>
</body>

</html>
