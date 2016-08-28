<?php

include 'cd_object.php';
$html = new html_object();
$file_array = array('Import'=>'import.php', 'Export'=>'export.php', 'Display'=>'display.php');

$html->open_html();
$html->open_intro();
$html->menu_form($file_array);
echo "</p></body>";
$html->close_html();

?>
