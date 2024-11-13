<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đăng nhập</title>
    <style>
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px; 
            justify-content: center;
            align-items: flex-start;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #c6789;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #c56788;
        }
        .info-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .info-container p {
            color: #333;
            margin: 5px 0;
        }
        .info-container h2 {
            color: #28a745;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Thông tin đăng nhập</h1>
    <form action="" method="POST">
        <label>
            Họ và tên
            <input type="text" id="name" name="name" required>
        </label>
        <label>
            Email
            <input type="email" id="email" name="email" required>
        </label>
        <label>
            Tên đăng nhập
            <input type="text" id="name-login" name="name-login" required>
        </label>
        <label>
            Mật khẩu
            <input type="password" id="password" name="password" required>
        </label>
        <button type="submit" id="enter" name="enter">Đăng nhập</button>
    </form>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enter'])) {
        $name = ($_POST['name']);
        $email = ($_POST['email']);
        $name_login = ($_POST['name-login']);
        $password = ($_POST['password']);

        $_SESSION['informations'][] = [
            "name" => $name,
            "email" => $email,
            "name_login" => $name_login,
            "password" => $password
        ];
        echo "<p>Bạn đã đăng nhập thành công!</p>";
    }

    if (isset($_SESSION['informations'])) {
        echo '<div class="info-container">';
        echo '<h2>Thông tin người dùng:</h2>';
        foreach ($_SESSION['informations'] as $info) {
            echo "<p><strong>Xin chào:</strong> " . $info['name'] . "</p>";
            echo "<p><strong>Email:</strong> " . $info['email'] . "</p>";
            echo "<p><strong>Tên đăng nhập:</strong> " . $info['name_login'] . "</p>";
            echo "<p><strong>Mật khẩu:</strong> " . $info['password'] . "</p><br>";
        }
        echo '</div>';
    }
    ?>
    <a href="session2.php">Click here</a>
</body>
</html>
