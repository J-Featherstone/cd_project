<?php

include 'cd_object.php';
$html = new html_object();
$file_array = array('Import'=>'import.php', 'Export'=>'export.php', 'Display'=>'display.php');

$html->open_html();
$html->import_data();
$html->close_html();


?>

