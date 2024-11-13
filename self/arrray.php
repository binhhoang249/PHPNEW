<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color{
            font-size: 30px;
            color: red;
        }
    </style>
</head>
<body>
    <h1>HTML</h1>
    <?php
    $color = array('Chos','Meo','echo');
    $lengthColor = count($color);
    for ($i=0;$i<$lengthColor;$i++){
        echo "<p class='color'>$color[$i]</p>";
    }
    ?>
</body>
</html>