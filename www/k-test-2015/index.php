<?php
/**
* TEST
* reads questions from csv
*/
session_start();


include("common.php");
//get language
$lang = lang();
include("texts_".$lang.".php");


// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../../smarty/templates/' . $text['template_code']);
$smarty->setCompileDir('../../smarty/templates_c');

//read situations
$qfile = 'sources/'.$text['source_code'].'.csv';
$questions = csv_to_array($qfile);
shuffle($questions);
$order = '';
foreach ($questions as $question)
    $order .= $question['id'] . ',';
$order = rtrim($order,',');

$smarty->assign('lang',$lang);
$smarty->assign('text',$text);
$smarty->assignByRef('questions', $questions);
$smarty->assign('order',$order);
$smarty->assign('session_id',session_id());
$smarty->display('page.tpl');


?>
