
<?php
if(isset($_SESSION['client'])){
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th>';
    echo '<th>個数</th><th>価格</th><th>小計</th></tr>';
    $total=0;
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from cart, shohin ' .
    'where client_id=? and shohin_id=S_ID');
    $sql->execute([$_SESSION['client']['ID']]);
    foreach($sql as $row){
        $id=$row['S_ID'];
        echo '<tr>';
        echo '<td>',$id ,'</td>';
        echo '<td><a href="detail.php?S_ID='.$id.'">',$row['S_name'],'</a></td>';
        echo '<td>',$row['kosu'],'</td>';
        echo '<td>',$row['S_price'],'</td>';
        $subtotal=$row['kosu']*$row['S_price'];
        $total+=$subtotal;
        echo '<td>',$subtotal,'</td>';
        echo '<td><a href="cart-delete.php?id=',$id,'">削除</a></td>';
        echo '<tr>';
    }
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>',$total,'</td><td></td></tr>';
    echo '</table>';

    echo '<td><a href="syori.php?id=',$id,'">購入手続き</a></td>';
}else{
    echo 'カートを表示するには、ログインしてください。';
}
?>