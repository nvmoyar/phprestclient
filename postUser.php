<?php
/**
 *  Example API call
 *  POST create a new object
 */


$server1 = '';
$server2 = '';


// the ID of the profile

//$accountID = $argv[1];


//Mandatory fields for POST/PUT methods 
//Post in this case creates....



$data = array(
	"Name" => "Shane MacGowan VI",
	"Address" => "User created through the webAPI", 
	"Group" => "TEST_wl1_g1",
	"Leverage" => "1",
	"Password" => "olaqASEEE22",
	"PasswordInvestor" => "olaqASEEE22",
	"Enable" => "1"
);


$data_string = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$server1/MP.MetaTrader.WebApi//api/users");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// specify post method and options

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);


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
