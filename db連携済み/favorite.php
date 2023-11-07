<?php
if(isset($_SESSION['client'])){
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th>';
    echo '<th>価格</th><th></th></tr>';
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from favorites, shohin ' .
    'where client_id=? and shohin_id=S_ID');
    $sql->execute([$_SESSION['client']['ID']]);
    foreach($sql as $row){
        $id=$row['S_ID'];
        echo '<tr>';
        echo '<td>',$id ,'</td>';
        echo '<td><a href="detail.php?id='.$id.'">',$row['S_name'],'</a></td>';
        echo '<td>',$row['S_price'],'</td>';
        echo '<td><a href="favorite-delete.php?id=',$id,'">削除</a></td>';
        echo '<tr>';
    }
    echo '</table>';
}else{
    echo 'お気に入りを表示するには、ログインしてください。';
}
?>