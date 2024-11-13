<?php
$mysqli = new mysqli("localhost", "root", "", "THOITRANG");

if ($mysqli->connect_error) {
    die("LỖI: Không thể kết nối. " . $mysqli->connect_error);
}

$sql = "CREATE TABLE product (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    img VARCHAR(100) NOT NULL,
    names VARCHAR(50) NOT NULL,
    price VARCHAR(30) NOT NULL
)";

if ($mysqli->query($sql) === true) {
    echo "Tạo bảng thành công.";
} else {
    echo "LỖI: Không thể thực thi $sql. " . $mysqli->error;
}

$mysqli->close();
?>
