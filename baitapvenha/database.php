<?php
$mysqli = new mysqli("localhost", "root", "");
if ($mysqli === false) {
    die("LỖI: Không thể kết nối. " . $mysqli->connect_error);
}

$sql = "CREATE DATABASE THOITRANG";
if ($mysqli->query($sql) === true) {
    echo "Tạo cơ sở dữ liệu thành công.";
} else {
    echo "LỖI: Không thể thực thi $sql. " . $mysqli->error;
}
?>
