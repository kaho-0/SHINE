<link rel="stylesheet" href="css/favo.css">
<?php
echo '<hr width="100%">';
echo '<h1 class="cart">お気に入り</h1>';
if(isset($_SESSION['client'])){
    echo '<table>';
    //echo '<tr><th></th><th>商品名</th>';
    //echo '<th>個数</th><th>価格</th><th>小計</th></tr>';
    $total=0;
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from favorites, shohin ' .
    'where client_id=? and shohin_id=S_ID');
    $sql->execute([$_SESSION['client']['ID']]);
    foreach($sql as $row){
        $id=$row['S_ID'];
        echo '<tr>';
        echo '<td><img alt="image" src="',$row['img_pass'],'" width="200" height="200"></td>';
        echo '<td>';
        echo '<div class="product-info">';
        echo '<p class="product-name"><a href="detail.php?S_ID='.$id.'">',$row['S_name'],'</a></p>';
        if($row['S_color']!=null){
            echo '<p>色：',$row['S_color'],'</p>';
        }
        if($row['S_size']!=null){
            echo '<p>サイズ：',$row['S_size'],'</p>';
        }
        echo '<p>価格：¥',number_format($row['S_price']),'</p>';
        echo '</td>';
        echo '<td>';
        echo '<input type="hidden" name="S_ID" value="',$row['S_ID'],'">';
        echo '<p><input type="submit" value="カートに追加"></p>';
        echo '</td>';
        echo '<td><a href="favorite-delete.php?id=',$id,'">削除</a></td>';
        echo '<tr>';
        echo '<tr><td colspan="6"><hr></td></tr>';
    }
    echo '</table>';
}else{
    echo 'お気に入りを表示するには、ログインしてください。';
}
?>