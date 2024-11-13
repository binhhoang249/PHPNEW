<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        h3 {
            justify-self: center;
            text-align: center;
        }
        .form-container {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .form-container input {
            padding: 10px;
            width: 250px;
        }

        .form-container button {
            padding: 10px 20px;
        }

        #tbl {
            justify-self: center;
            margin-top: 20px;
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        #tbl th, #tbl td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #tbl th {
            background-color: #f2f2f2;
        }

        #add-student-form {
            display: none; 
            margin-top: 20px;
            text-align: center;
        }

        #add-student-form input {
            padding: 10px;
            margin: 5px;
            width: 250px;
        }

        #add-student-form button {
            padding: 10px 20px;
        }

        #show-add-form {
            margin-top: 20px;
            padding: 10px 20px;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h3>Danh sách sinh viên</h3>
    <form action="" method="POST">
        <div class="form-container">
            <input type="text" id="keyword" name="keyword" placeholder="Nhập vào từ khóa cần tìm">
            <button type="submit" name="action" value="search">Tìm kiếm</button>
            <button type="submit" name="action" value="all">Tất cả</button>
        </div>
    </form>

    <button id="show-add-form">Thêm sinh viên</button>

    <form action="" method="POST" id="add-student-form">
        <input type="text" name="student-code" placeholder="Mã sinh viên" required>
        <input type="text" name="fullname-student" placeholder="Họ và tên" required>
        <input type="text" name="sex" placeholder="Giới tính" required>
        <input type="text" name="province" placeholder="Quê quán" required>
        <input type="date" name="bird" placeholder="Ngày sinh" required>
        <input type="text" name="subject" placeholder="Ngành học" required>
        <button type="submit" name="add_student">Thêm</button>
        <button type="button" id="cancel-add-form">Hủy</button>
    </form>

    <table id="tbl">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Ngày sinh</th>
            <th>Ngành học</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        session_start(); 
        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_student'])) {
            $student_code = $_POST['student-code'];
            $fullname = $_POST['fullname-student'];
            $sex = $_POST['sex'];
            $province = $_POST['province'];
            $bird = $_POST['bird'];
            $subject = $_POST['subject'];

            $_SESSION['students'][] = [
                "student_code" => $student_code,
                "fullname" => $fullname,
                "sex" => $sex,
                "province" => $province,
                "bird" => $bird,
                "subject" => $subject
            ];
            echo "<script>alert('Đã thêm sinh viên thành công!');</script>";
        }

        if (isset($_GET['action']) && isset($_GET['id'])) {
            $action = $_GET['action'];
            $id = $_GET['id'];
            if ($action == 'delete') {
                foreach ($_SESSION['students'] as $index => $student) {
                    if ($student['student_code'] == $id) {
                        unset($_SESSION['students'][$index]);
                        echo "<script>alert('Xóa sinh viên thành công!');</script>";
                        break;
                    }
                }
            }
            if ($action == 'edit') {
                foreach ($_SESSION['students'] as &$student) {
                    if ($student['student_code'] == $id) {
                        echo "<script>alert('Sửa sinh viên: {$student['fullname']}');</script>";
                        break;
                    }
                }
            }
        }

        // Tìm kiếm sinh viên
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'search') {
            $keyword = $_POST['keyword'];
            $filtered_students = array_filter($_SESSION['students'], function($student) use ($keyword) {
                return strpos(strtolower($student['fullname']), strtolower($keyword)) !== false ||
                       strpos(strtolower($student['student_code']), strtolower($keyword)) !== false;
            });
        } else {
            $filtered_students = $_SESSION['students'];
        }
        
        foreach ($filtered_students as $student) {
            echo "<tr>";
            echo "<td>{$student['student_code']}</td>";
            echo "<td>{$student['fullname']}</td>";
            echo "<td>{$student['sex']}</td>";
            echo "<td>{$student['province']}</td>";
            echo "<td>{$student['bird']}</td>";
            echo "<td>{$student['subject']}</td>";
            echo "<td>
                <a href='?action=edit&id={$student['student_code']}'>Sửa</a> |
                <a href='?action=delete&id={$student['student_code']}' onclick=\"return confirm('Bạn có chắc muốn xóa sinh viên này không?')\">Xóa</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script>
        document.getElementById('show-add-form').addEventListener('click', function() {
            document.getElementById('add-student-form').style.display = 'block';
        });
        document.getElementById('cancel-add-form').addEventListener('click', function() {
            document.getElementById('add-student-form').style.display = 'none';
        });
    </script>
</body>
</html>
