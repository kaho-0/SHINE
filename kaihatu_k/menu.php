<link rel="stylesheet" href="css/menu_k.css">
<div class="menu">
    <div class="main">
        <div class="sidebar">
            <div class="category">
                <p class="category-name">カテゴリー</p>
                <ul>
                    <li><a href="#" class="btn2">トップス</a></li>
                    <li><a href="#" class="btn2">アウター</a></li>
                    <li><a href="#" class="btn2">パンツ</a></li>
                    <li><a href="#" class="btn2">スカート</a></li>
                    <li><a href="#" class="btn2">ワンピース</a></li>
                </ul>
            </div>
        </div>
        <div class="main-contents">
            <div class="menu-ber">
                <div class="menu-link">
                    <a href="product.php" class="sentaku">全て</a>
                    <a href="favorite-show.php" class="sentaku">メンズ</a>
                    <a href="history.php" class="sentaku">レディース</a>
                    <a href="cart-show.php" class="sentaku">シニア</a>
                    <a href="purchase-input.php" class="sentaku">キッズ</a>
                </div>
            </div>
            <div class="shohin-img">
                <?php
                for ($i = 0; $i < 3; $i++) {
                    echo '<img class="img" src="./img/favo.png">
                    <img class="img" src="./img/favo.png">
                    <img class="img" src="./img/favo.png"><br>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
