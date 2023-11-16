<link rel="stylesheet" href="css/cart.css">
<?php
echo '<hr width="100%">';
echo '<h1 class="cart">ショッピングカート</h1>';
if(isset($_SESSION['client'])){
    echo '<table>';
    //echo '<tr><th></th><th>商品名</th>';
    //echo '<th>個数</th><th>価格</th><th>小計</th></tr>';
    $total=0;
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from cart, shohin ' .
    'where client_id=? and shohin_id=S_ID');
    $sql->execute([$_SESSION['client']['ID']]);
    foreach($sql as $row){
        $id=$row['S_ID'];
        echo '<tr>';
        echo '<td><img alt="image" src="',$row['img_pass'],'" width="150" height="100"></td>';
        echo '<td>';
        echo '<div class="product-info">';
        echo '<p class="product-name"><a href="detail.php?S_ID='.$id.'">',$row['S_name'],'</a></p>';
        if($row['S_color']!=null){
            echo '<p>色：',$row['S_color'],'</p>';
        }
        if($row['S_size']!=null){
            echo '<p>サイズ：',$row['S_size'],'</p>';
        }
        echo '<p>個数：',$row['kosu'],'</p>';
        echo '<p>価格：¥',number_format($row['S_price']),'</p>';
        echo '</td>';
        $subtotal=$row['kosu']*$row['S_price'];
        $total+=$subtotal;
        echo '<td>';
        echo '<p>小計</p>';
        echo '<p>¥',number_format($subtotal),'</p>';
        echo '</td>';
        echo '<td><a href="cart-delete.php?id=',$id,'">削除</a></td>';
        echo '<tr>';
        echo '<tr><td colspan="6"><hr></td></tr>';
    }
    echo '</table>';
    echo '<div style="text-align: right;">'; // 右寄せスタイルの追加
    echo '<h1>合計金額：¥',number_format($total),'</h1>';
    echo '</div>';
    echo '<form action="syori.php" method="post">';
    echo '<input type="hidden" name="total" value="' . $total . '">';
    echo '<button class="center">注文する</button>';
    echo '</form>';

}else{
    echo 'カートを表示するには、ログインしてください。';
}
