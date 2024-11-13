<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tạo file và xuất dữ liệu dạng bảng</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h2>Nhập thông tin và tạo file dữ liệu</h2>
    <form method="post">
        <label for="filename">Tên file:</label>
        <input type="text" id="filename" name="filename" required><br><br>

        <label for="item_name">Tên hàng:</label>
        <input type="text" id="item_name" name="item_name" required><br><br>

        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="price">Đơn giá:</label>
        <input type="number" id="price" name="price" required><br><br>

        <button type="submit" name="createFile">Tạo và Xuất Dữ liệu</button>
    </form>

    <?php
    if (isset($_POST['createFile'])) {

        $filename = $_POST['filename'] . ".txt";
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $total_price = $quantity * $price;


        $file = fopen($filename, "a");
        $content = "$item_name, $quantity, $price, $total_price\n";
        fwrite($file, $content);
        fclose($file);

        echo "<p>Dữ liệu đã được lưu vào file '$filename'.</p>";
    }

    if (isset($filename) && file_exists($filename)) {
        echo "<h3>Dữ liệu từ file:</h3>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Tên hàng</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";

        $file = fopen($filename, "r");
        while (($line = fgets($file)) !== false) {
            list($item_name, $quantity, $price, $total_price) = explode(", ", trim($line));
            echo "<tr>";
            echo "<td>$item_name</td>";
            echo "<td>$quantity</td>";
            echo "<td>$price</td>";
            echo "<td>$total_price</td>";
            echo "</tr>";
        }
        fclose($file);

        echo "</table>";
    }
    ?>
</body>
</html>
