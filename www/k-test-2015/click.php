<?php
session_start();
include("texts.php");

$str = session_id() . "\t" . $text['test_code'] . "\t" . date("Y-m-d H:i:s") . "\t" . $_GET['action'] . "\n";
$file = fopen('click.txt','a');
fwrite($file,$str);
fclose($file);
?>
