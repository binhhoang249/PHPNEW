<?php 
$fh = fopen("my_setting.txt", 'w') or die("Failed to create file");

$content = "localhost;root;pwd1234;my_database";
fwrite($fh,$content) or die("Could not write to file");

fclose($fh);
echo "File 'my_settings.txt written done"
?>