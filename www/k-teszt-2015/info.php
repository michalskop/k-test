<?php
/**
* VAA
* Info page
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

$smarty->assign('session_id',session_id());
$smarty->assign('text',$text);
$smarty->display('info.tpl');

?>
