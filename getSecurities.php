<?php
/**
 *  Example API call
 *  GET profile information
 */


$server1 = '';
$server2 = '';


// set up the curl resource



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$server1/MP.MetaTrader.WebApi//api/CfgSymbolgroup");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



$headers = array(
    'Content-type: application/json',
    
    //Auth header is formed by user,pass,ip:port of MT4 server
    'Authorization: MetaTrader XXXXX',
    'Accept: application/json'
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

// execute the request

$output = curl_exec($ch);
$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header =  substr($output, 0, $header_len);
$body = substr($output, $header_len);


// output the profile information - includes the header

$json = json_decode($body, true);

echo '<pre>';
print_r($header);
echo '</pre>';

echo '<pre>';
print_r($json); 
echo '</pre>';




curl_close($ch);
