<?php
 header('Content-Type: text/html; charset=utf-8');
$handle = fopen('./data.txt', 'r');
//echo '<pre>';print_r($handle);echo '</pre>';
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if($buffer == 'авiа- та ракетобудування') echo $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}