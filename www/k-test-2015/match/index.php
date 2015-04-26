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

print_r($user);

echo calc_score($user);


//save results


/**
* calculate overall score
*/
function calc_score($user) {
    $pro = [1, 3, 5, 6, 10, 12, 13, 15];
    $contra = [4, 7, 9, 11, 16, 18, 19];
    $score = 0;
    for ($i=1; $i<=20; $i++) {
        if (!isset($user['voteq'][$i]))
            $u = 5;
        else
            $u = $user['voteq'][$i];
        if (in_array($i,$pro))
            $score += $u;
        if (in_array($i,$contra))
            $score += 10-$u; 
    }
    return $score/150;
}
?>
