<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search_term" required>
        <button type="submit" name="submit">OK</button>
    </form>

    <?php
        function Search($value, $array){
            return array_search($value, $array);
        }
        $array = array(
            "chikukku",
            "chacha",
            "kukurela",
            "lukaku",
            "mpape"
        );
        if (isset($_POST['submit'])) {
            $value = $_POST['search_term'];
            if (Search($value, $array) !== false) {
                echo "Co thanh vien";
            } else {
                echo "chim cuttttttt";
            }
        }
    ?>
</body>
</html>
