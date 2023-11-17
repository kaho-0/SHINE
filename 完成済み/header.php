<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>SHINE</title>
    
</head>

<body>
    <div class="header">
        <header>
            <div class="header-logo">
                <h1 class=header-h1><a href="product.php">SHINE</a></h1>
            </div>
            <div class="header-kensaku">
                <form action="index.php" method="post">
                    <input id="kensaku" type="text" placeholder="キーワードを入力"></input>
                </form>
            </div>
            <div class="header-cart">
                <a href="cart-show.php"><img src="./image/cart.png" width="50px" height="50px"></a>
            </div>
            <div class="header-mypage">
                <a href="detalist-show.php"><img src="./image/mypage.png" width="50px" height="50px"></a>
            </div>
            <div class="header-favo">
                <a href="favorite-show.php"><img src="./image/favo.png" width="50px" height="50px"></a>
            </div>
        </header>
    </div>
    <hr>
</body>
</html>