<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー管理</title>
</head>
<body calss="b">
<style>
.cnt {
    text-align: center;
    font-size: 24px;
}
.right {
    margin: 0 0 0 auto;
    font-size: 24px;
}
.shohin {
    display: inline-block; 
    vertical-align: top; 
    margin-left: 20px; 
    font-size: 24px;
}
.button {
    background: red;
    color: white;
    font-size: 24px; 
    padding: 10px 20px; 
    border: none; 
    cursor: pointer;
}
.moji {
    display: inline-block; 
    vertical-align: top; 
    line-height: 20px;
    margin-left: 20px; 
    font-size: 24px;
}
</style>
    <div class="header-logo">
        <h1 class="shine">SHINE</h1>
    </div>
    <div class="cnt">
        <h1>ユーザー管理</h1>
        <p>お名前：　　　　　生年月日：　　月　　日</p>
        <p>住所 <input type="text" name="jusyo"></p>
        <p>メールアドレス <input type="text" name="mail"></p>
        <p>電話番号：　　　　　　</p>
    <hr>
        <input type="submit" class="button" value='アカウント削除' style="background:red;color:white;">
    </div>
    <hr>

    <div class="moji">
        購入した商品
    </div>

        <img src="./img/favo.png" width="200" height="200">

    <div class="shohin">
        <p>商品名</p>
        <p>カラー：　　　　　　数量：　　</p>
        <p>サイズ：　　　　　　￥　　　　円</p>
    </div>
    <hr>
</body>
</html>