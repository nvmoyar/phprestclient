<?php
/**
 *  Example API call
 *  POST create a new object
 */

//Mandatory fields for POST/PUT methods 



$server1 = '';
$server2 = '';

$data = array(

/**

Uncomment the following values for the array depending on what operation you would like to test

 Note: Type and Cmd fields in the Trade object can have multiple values. And it's throughout these fields when you indicate your type of operation, selling, buying, etc. 
	   In addition, you have to use these parameters to indicate if you want to open a trade, to delete it, or to modify it, therefore you can use the same POST method to perform update operations and delete operations. 

 Type: {BrOrderOpen, BrOrderClose, BrOrderDelete, BrOrderCloseBy, BrOrderCloseAll, BrOrderModify, BrOrderActivate, BrOrderComment, BrBalance}
 Cmd: {Buy, Sell, BuyLimit, SellLimit, BuyStop, SellStop, Balance, Credit}

 **/


/******* Close a trade **********/

/*

"OrderBy" => "35007",
"Order" => "1407482",
"Price" => "1.33331", 
//you need to close the same volume as in open trade. Or for remain volume new trade will be open.
"Volume" => "100", // volume on mt = this value / 100
"Type" => "BrOrderClose"

*/


/****** Modify a trade *********/


/* Bear in mind that options about modify are very limited. 


"OrderBy" => "35007",
"Order" => "1407468",
"Price" => "1.88888", 
"Type" => "BrOrderModify"

*/ 


/****** Opening a trade ********/



/* First perform a balance operation otherwise no trade will be opened

"OrderBy" => "35007",
"Price" => "99", 
"Comment" => "Test opening - webAPI",
"Cmd" => "Buy",
"Symbol" => "EURUSD",
"Volume" => "1", // that's 0.1 as is the minimum volume
"Type" => "BrOrderOpen"



*/

/*
"OrderBy" => "36008",
"Price" => "1.11221",
"Comment" => "Open trade-webAPI",
"Symbol" => "USDJPY",
"Volume" => "100", // that's 0.1 as is the minimum volume depending on the symbol. If the volume is not correct the order won't be created 
"Type" => "BrOrderOpen"
*/

/*

"Price" => "1.11221",
"Comment" => "Open trade-webAPI",
"Symbol" => "USDJPY",
"Volume" => "100", // that's 0.1 as is the minimum volume depending on the symbol. If the volume is not correct the order won't be created 
"Type" => "BrOrderOpen"


/******  Balance operations (symbol and volume fields are not necessary) *************/
 "OrderBy" => "100306",
  "Price" => "11111",
  "Comment" => "Testing from api",
  "Cmd" => "Balance",
  "Type" => "BrBalance" 



/*****  Make a withdrawal ***


  "OrderBy" => "36002",
  "Price" => "-666",
  "Comment" => "numero peich",
  "Cmd" => "Balance",
  "Type" => "BrBalance" 
*/

);


$data_string = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$server1/MP.MetaTrader.WebApi//api/trades");
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
