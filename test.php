<?php
//$result = file_get_contents('http://10.4.114.148/etc_monitor');
//$result = file_get_contents('http://www.google.com/');

//$result = file_get_contents('http://covid19.th-stat.com/');
//$result = file_get_contents('https://www.covid19.th-stat.com/json/covid19v2/getTodayCases.json');
//$result = file_get_contents('http://www.google.com/');

//echo $result;
//////////////////////////////////////////////////////
$w = stream_get_wrappers();
echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "<br>";
echo 'http wrapper: ', in_array('http', $w) ? 'yes':'no', "<br>";
echo 'https wrapper: ', in_array('https', $w) ? 'yes':'no', "<br>";
echo 'wrappers: ', var_export($w);
///////////////////////////////////////////////////////

//$response = file_get_contents('https://covid19.th-stat.com/json/covid19v2/getTodayCases.json');
$response = file_get_contents('http://www.thaigold.info/RealTimeDataV2/gtdata_.txt');
echo $response;


echo var_dump($response);

//phpinfo();
?>
