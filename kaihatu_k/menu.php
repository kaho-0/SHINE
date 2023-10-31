<link rel="stylesheet" href="css/menu.css">
<div class="menu">
    <div class="menu-ber">
        <div class="menu-link">
            <a href="product.php" class="sentaku">全て</a>
            <a href="favorite-show.php" class="sentaku">メンズ</a>
            <a href="history.php" class="sentaku">レディース</a>
            <a href="cart-show.php" class="sentaku">シニア</a>
            <a href="purchase-input.php" class="sentaku">キッズ</a>
        </div>
    </div>
    <div class="main">
        <div class="left-menu">
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
            <div class="shohin-img">
                <?php
                echo '<table>';
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo->query('select * from shohin');
                foreach ($sql as $row) {
                    echo '<tr>';
                    echo '<td>';
                    echo '<a href="./kaihatu/shohin1/shosai.php?id=', $id, '"><img src="', $row['img_pass'], '"></a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                ?>
            </div>
        </div>
    </div>
</div>
