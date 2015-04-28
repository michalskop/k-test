<?php
/**
* common functions
*/

error_reporting(E_ALL);
//error_reporting(0);


/**
* get language
*/
function lang() {
    if (isset($_GET['lang']) and ($_GET['lang'] == 'en'))
        return 'en';
    else //default language
        return 'hu';
}

/**
* check for malicious attempts to retrieve files
* http://stackoverflow.com/questions/1587695/sanitize-get-parameters-to-avoid-xss-and-other-attacks
*/
function sanitize($input) {
    return preg_replace('/[^-a-zA-Z0-9_.]/', '', $input);;
}

/**
* extracts user's answers
*/
function get_user_values() {
  $user = [];
  if (count($_GET) > 0) {
    foreach ($_GET as $key => $param) {
      //votes;
      if ((substr($key,0,2) == 'q-') or (substr($key,0,2) == 'r-') or (substr($key,0,2) == 's-'))
        $user[$key] = (int) $param;
      if (substr($key,0,13) == 'demographics-')
        $user[$key] = $param;
    }
  } else
      return $user;
  return $user;
}


/**
* calculate overall score
*/
function calc_score($user) {
    $pro = [1, 3, 5, 6, 10, 12, 13, 15];
    $contra = [4, 7, 9, 11, 16, 18, 19];
    $score = 0;
    $possible = 0;
    for ($i=1; $i<=20; $i++) {
        if (!isset($user['q-'.$i]))
            $u = 5;
        else {
            $u = $user['q-'.$i];
        }
        $possible = $possible + 10;
        if (in_array($i,$pro))
            $score += $u;
        if (in_array($i,$contra))
            $score += 10-$u; 
    }
    if ($possible == 0)
        return 0.5;
    //echo $score . "::" . $possible . "::";
    return $score/$possible;
}



/**
 * Convert a comma separated file into an associated array.
 * The first row should contain the array keys.
 * 
 * Example:
 * 
 * @param string $filename Path to the CSV file
 * @param string $delimiter The separator used in the file
 * @return array
 * @link http://gist.github.com/385876
 * @author Jay Williams <http://myd3.com/>
 * @copyright Copyright (c) 2010, Jay Williams
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}


/**
*
* http://stackoverflow.com/questions/5249279/file-get-contents-php-fatal-error-allowed-memory-exhausted/5249971#5249971
*/

function file_get_contents_chunked($file,$chunk_size,$callback)
{
    try
    {
        $handle = fopen($file, "r");
        $i = 0;
        while (!feof($handle))
        {
            call_user_func_array($callback,array(fgets($handle,$chunk_size),&$handle,$i));
            $i++;
        }

        fclose($handle);

    }
    catch(Exception $e)
    {
         trigger_error("file_get_contents_chunked::" . $e->getMessage(),E_USER_NOTICE);
         return false;
    }

    return true;
}
