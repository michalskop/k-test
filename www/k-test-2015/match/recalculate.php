<?php
/**
* recalculates the results
*/
$time1 = microtime(TRUE);
include("../common.php");

//prepare variables
global $letters, $v2c, $sum, $ns;
$sums = [];
$ns = [];
$averages = [];
$letters = ['q','r','s'];
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        $sums[$letter . '-' . $i] = 0;
        $ns[$letter . '-' . $i] = 0;
    }
}

//read results
$rfile = 'result.csv';

$v2c = [];
$success = file_get_contents_chunked($rfile,1024,function($chunk,&$handle,$iteration){
    global $letters,$v2c, $sums, $ns;
    if ($iteration == 0) {
        $c2v = str_getcsv($chunk);
        foreach ($c2v as $k => $v)
            $v2c[$v] = $k;
    } else {
        foreach ($letters as $letter) {
            for ($i=1;$i<=20;$i++) {
                $ar = str_getcsv($chunk);
                if (count($ar) >= 60) {
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
                    }
                }
            }
        }
    }
});
foreach ($letters as $letter) {
    for ($i=1;$i<=20;$i++) {
        $averages[$letter . '-' . $i] = $sums[$letter . '-' . $i] / $ns[$letter . '-' . $i];
    }
}
print_r($averages);
echo microtime(TRUE) - $time1;


?>
