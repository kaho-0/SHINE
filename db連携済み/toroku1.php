<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "mysql218.phy.lolipop.lan";
    $username = "LAA1517459-ensyu";
    $password = "LAA1517459";
    $dbname = "Pass0515";

    $name = $_POST['name'];
    $address = $_POST['address'];
    $BD = $_POST['BD'];
    $eail = $_POST['mail'];
    $password = $_POST['PW'];
    $address = $_POST['address'];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO users (name, address, BW, email, PW, address)
            VALUES ('$name', '$address', '$BW', '$mail', '$PW', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "新しいレコードが追加されました";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); 
}
?>
