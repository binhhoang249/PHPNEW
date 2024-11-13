<?php 
$fh = fopen("my_setting.txt", 'r') or die("Failed to create file");

$line = fgets($fh);
echo $line;
fclose($fh);
?>