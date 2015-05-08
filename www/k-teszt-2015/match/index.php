<?php
error_reporting(0);
 ini_set("display_errors", 1);

/**
* VAA
* calculate match
*/
session_start();

include("../common.php");
//get language
$lang = lang();
include("../texts_".$lang.".php");
// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('../../../smarty/templates/' . $text['template_code']);
$smarty->setCompileDir('../../../smarty/templates_c');

//extract user values
$user = get_user_values();
//print_r($user);
$score = calc_score($user);
//echo $score; //die();
//read averages
$afile = 'averages_'.$lang.'.csv';
$averages = csv_to_array($afile);
$averages = $averages[0];
//print_r($averages);//die();
$category = cat($score,$averages);
$stars = 6-$category/20;

//this page
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ;
//read situations
$qfile = '../sources/'.$text['source_code'].'.csv';
$questions = csv_to_array($qfile);

//read order
if (isset($_GET['order'])){
    $o2id = explode(',',$_GET['order']);
}
#print_r($questions);
#print_r($o2id);die();
$infotext = file_get_contents('../info_'.$lang.'.html');

//smarty
$smarty->assign('result',$text['message_' . $category]);
$smarty->assign('result_description',$text['description_' . $category]);
$smarty->assign('fb_result',$text['fb_message_' . $category]);
$smarty->assign('stars',$stars);
$smarty->assign('o2id',$o2id);
$smarty->assign('url',$url);
$smarty->assign('averages',$averages);
$smarty->assign('user',$user);
$smarty->assign('text',$text);
$smarty->assign('infotext',$infotext);
$smarty->assignByRef('questions', $questions);
$smarty->assign('session_id',session_id());
$smarty->display('match.tpl');

//save results
$letters = Array('q','r','s');
$line = Array(session_id(),$text['test_code'],date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']);
foreach ($letters as $letter) {
    for ($i=1;$i<=15;$i++) {
        if (isset($user[$letter . '-' . $i]))
            $line[] = $user[$letter . '-' . $i];
        else
            $line[] = '';
    }
}
    //demographics
$dgs = Array('gender','age','education','municipality');
foreach ($dgs as $dg) {
  if (isset($user['demographics-'.$dg]))
    $line[] = $user['demographics-'.$dg];
  else
    $line[] = '';
}

$fp = fopen('result_'.$lang.'.csv', 'a');
fputcsv($fp,$line);
fclose($fp);

//recalculate if old file
//echo time() . "::" . filectime('averages_'.$lang.'.csv');
if ((time()-filectime('averages_'.$lang.'.csv')) > 3600) {
  include('recalculate.php');
}

/**
* get category of score
*/
function cat($score, $averages) {
    for ($p=20;$p<100;$p = $p + 20) {
        if ($score <= $averages['n-'.$p]) {
            return $p;   
        }
    }
    return 100;
}



?>
