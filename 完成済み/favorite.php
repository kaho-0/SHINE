<link rel="stylesheet" href="css/favo.css">
<?php
// echo '<hr width="100%">';
echo '<h1 class="cart" font-size: 15px;>お気に入り</h1>';
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
        $name=$row['S_name'];
        echo '<tr>';
        echo '<td id="osamu"><img alt="image" src="',$row['img_pass'],'" width="200" height="200"></td>';
        echo '<td>';
        echo '<div class="product-info">';
        echo '<p class="product-name"><a href="detail.php?S_name='.$name.'">',$row['S_name'],'</a></p>';
        echo '<p>価格：¥',number_format($row['S_price']),'</p>';
        echo '</td>';
        echo '<td><a href="favorite-delete.php?id=', $id, '" style="font-size: 25px;">削除</a></td>';
        echo '<tr>';
        echo '<tr><td colspan="6"><hr></td></tr>';
    }
    echo '</table>';
}else{
    echo 'お気に入りを表示するには、ログインしてください。';
}
?>
