<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        /* ページ全体にフルスクリーンで表示 */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
        .product-container {
            display: flex;
            border: 1px solid #ccc;
            max-width: 1300px; /* コンテンツの最大幅を設定 */
            width: 130%;
            box-sizing: border-box;
            padding: 70px;
            transform: scale(1.5); /* スケールを1.5倍に設定 */
            transform-origin: top left; /* スケールの基点を左上に設定 */
        }
        .left-column {
            flex-basis: 40%; 
            padding-right: -100px;
        }
        .brand-name {
            font-size: 20px;
            font-weight: bold;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .right-column {
            flex-basis: 60%; 
            padding-left: -100px;
        }
        .product-details {
            font-size: 16px;
            line-height: 1.5;
        }
        .size-inventory {
            list-style: none;
            padding: 0;
        }
        .size-inventory li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .inventory-status {
            margin-right: 10px;
        }
        .size-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10p
        }
    </style>
</head>
<body>
    <div class="product-container">
        <div class="left-column">
            <p class="brand-name">ブランドA</p>
            <img class="product-image" src="商品1の画像URL" alt="商品1の画像">
        </div>
        <div class="right-column">
            <h2>商品名</h2>
            <p>閲覧者数: 100</p>
            <p>価格: $50.00</p>
            <ul class="size-inventory">
                <li>
                    Sサイズ:
                    <span class="inventory-status">在庫あり</span>
                    <button class="size-button">カートに入れる</button>
                </li>
                <li>
                    Mサイズ:
                    <span class="inventory-status">在庫あり</span>
                    <button class="size-button">カートに入れる</button>
                </li>
                <li>
                    Lサイズ:
                    <span class="inventory-status">在庫なし</span>
                    <button class="size-button">カートに入れる</button>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
