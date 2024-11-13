<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Tour List</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Tour Name</th>
            <th>Duration</th>
            <th>Departure Information</th>
            <th>Price</th>
        </tr>

        <?php
        if (($open = fopen("North.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $array[] = $data;
            }
            fclose($open);
        }

        foreach ($array as $items) {
            echo "<tr>";
            echo "<td><img src='{$items[0]}' alt='Tour Image' width='100'></td>";
            echo "<td>{$items[1]}</td>";
            echo "<td>{$items[2]}</td>";
            echo "<td>{$items[3]}</td>";
            echo "<td>{$items[4]}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
