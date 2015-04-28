<?php
/**
* recalculates the results
*/

//$time1 = microtime(TRUE);
include_once("../common.php");
//get language
$lang = lang();

//prepare variables
global $letters, $v2c, $sum, $ns, $users;
$sums = [];
$ns = [];
$averages = [];
$users = [];
$letters = ['q','r','s'];
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        $sums[$letter . '-' . $i] = 0;
        $ns[$letter . '-' . $i] = 0;
    }
}

//read results
$rfile = 'result_'.$lang.'.csv';

$v2c = [];
$success = file_get_contents_chunked($rfile,1024,function($chunk,&$handle,$iteration){
    global $letters,$v2c, $sums, $ns, $users;
    if ($iteration == 0) {
        $c2v = str_getcsv($chunk);
        foreach ($c2v as $k => $v)
            $v2c[$v] = $k;
    } else {
        $user = [];
        $ar = str_getcsv($chunk);
        if (count($ar) >= 60) {
            foreach ($letters as $letter) {
                for ($i=1;$i<=20;$i++) {
                
                    $g = $ar[$v2c[$letter . '-' . $i]];
                    //print_r($g);die();
                    if ($g === '0')
                        $g0 = true;
                    else
                        $g0 = false;
                    if (((int) $g == 0) and (!$g0))
                        $g = -1;
                    if (isset($g) and ((int) $g >=0) and ((int) $g <=10)) {
                        $sums[$letter . '-' . $i] += $g;
                        $ns[$letter . '-' . $i] += 1;
                        $user[$letter . '-' . $i] = $g;
                    }
                }
            }
            $users[] = calc_score($user);
        }
    }
});
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        $averages[$letter . '-' . $i] = $sums[$letter . '-' . $i] / $ns[$letter . '-' . $i];
    }
}

sort($users);
$c = count($users);
//get percentiles
$percs = [];
for ($p=0.2;$p<1;$p = $p + 0.2) {
   $percs[] = $users[round($p * $c - 1.0-$p)];
}

//prepare rows for writing
$lines = [[],[]];
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        $lines[0][] = $letter . '-' . $i;
        $lines[1][] = $averages[$letter . '-' . $i];
    }
}
$i = 0;
for ($p=20;$p<100;$p = $p + 20) {
    $lines[0][] = 'n-' . $p;
    $lines[1][] = $percs[$i];
    $i++;
}

$fp = fopen('averages_'.$lang.'.csv', 'w');
foreach ($lines as $line) {
    fputcsv($fp, $line);
}
fclose($fp);

//echo microtime(TRUE) - $time1;



?>
