<?php

include 'cd_object.php';
$html = new cd_object();
$file_array = array('Import'=>'import.php', 'Export'=>'export.php', 'Display'=>'display.php');
$file = "C:\Users\joef\Desktop\Music.txt";

$html->open_html();
print_r($html->import_data($file));
$html->close_html();


?>
