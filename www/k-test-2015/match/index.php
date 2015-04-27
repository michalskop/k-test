<?php
/**
* VAA
* calculate match
*/

session_start();

include("../texts.php");
include("../common.php");

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../../../smarty/templates/' . $text['template_code']);
$smarty->setCompileDir('../../../smarty/templates_c');

//extract user values
$user = get_user_values();
//print_r($user);
//echo calc_score($user);
$score = calc_score($user);

//read averages
$afile = 'averages.csv';
$averages = csv_to_array($afile);
$averages = $averages[0];

$category = cat($score,$averages);

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


//smarty
$smarty->assign('result',$text['message_' . $category]);
$smarty->assign('fb_result',$text['fb_message_' . $category]);
$smarty->assign('o2id',$o2id);
$smarty->assign('url',$url);
$smarty->assign('averages',$averages);
$smarty->assign('user',$user);
$smarty->assign('text',$text);
$smarty->assignByRef('questions', $questions);
$smarty->assign('session_id',session_id());
$smarty->display('match.tpl');

//save results
$letters = ['q','r','s'];
$line = [session_id(),$text['test_code'],date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']];
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        if (isset($user[$letter . '-' . $i]))
            $line[] = $user[$letter . '-' . $i];
        else
            $line[] = '';
    }
}
$fp = fopen('result.csv', 'a');
fputcsv($fp,$line);
fclose($fp);

//recalculate if old file
if ((time()-filectime('averages.csv')) > 3600) {
  include('recalculate.php');
}

/**
* get category of score
*/
function cat($score, $averages) {
    for ($p=20;$p<100;$p = $p + 20) {
        if ($score < $averages['n-'.$p]) {
            return $p;   
        }
    }
    return 100;
}



?>
