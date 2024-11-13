<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ok</title>
    <style>
        div {
            width: 100%;
            height: 100%;
            background-color: red;
        }
    </style>
</head>
<body>
    <?php
        $line = file_get_contents("test.txt") or die("Failed to open file");
        echo '<div>';
        echo nl2br($line);
        echo '</div>';
    ?>
</body>
</html>
