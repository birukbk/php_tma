<?php
/**
 * Function to change seconds in to minutes
 * @param seconds
 * @return minutes:seconds, string
 */

function secToMins($seconds){

    $time= round($seconds);
    return sprintf('%02d:%02d',($time / 60 % 60), $time%60);


}

/**
 * parse template function.
 * @param type $tpl 
 * @param placeholders string,
 * @return parsed content, string
 */
function parseTemplate($tpl, $placeholders) {
    $pass = $tpl;
    $content = '';
    foreach ($placeholders as $key => $val) {
        $pass = str_replace($key, $val, $pass);
    }
    // Remove any missed/misspelled tags
    $pass = preg_replace('/{{.*}}/','', $pass, 1);
    $content .= $pass;
    return $content;
}


?>