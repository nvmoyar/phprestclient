<?php
/**
 *  Example API call
 *  PUT for edit an object
 */



$server1 = '';
$server2 = '';


// Mandatory fields for POST/PUT method
// PUT in this case updates....

$data = array(
	"Login" => "36370",
	"Name" => "Jean Claude Van Damme XII",
	"Group" => "TEST_wl3_g1",
    "Enable" => "0"
);


$data_string = json_encode($data);


// initialize array

$url = array();

foreach ($data as $key => $value)
{
    // make the url encoded query string
    $url[] = 'fields[]='.urlencode($key.'=='.$value);
}

$url = implode('&', $url);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$server1/MP.MetaTrader.WebApi//api/users");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// specify post method and options

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);


$headers = array(
    'Content-type: application/json',
  
    //Auth header is formed by user,pass,ip:port of MT4 server
    'Authorization: MetaTrader XXXXX',

    'Accept: application/json',
    'Content-Length: ' . strlen($data_string)
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
