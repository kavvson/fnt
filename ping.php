<?php
error_reporting(0);
$res = file_get_contents("https://lightswitch-public-service-prod06.ol.epicgames.com/lightswitch/api/service/bulk/status?serviceId=Fortnite");
function ss()
{

    $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, "");
    // OK cool - then let's create a new cURL resource handle


    // Now set some options (most are optional)

    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, "https://lightswitch-public-service-prod06.ol.epicgames.com/lightswitch/api/service/bulk/status?serviceId=Fortnite");

    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "Kavvson_Market_Fraud_Checker");

    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Download the given URL, and return output
    $output = curl_exec($ch);

    // Close the cURL resource, and free system resources
    curl_close($ch);

    return $output;
}


//$res = ss();
$res = json_decode($res);



$apiStatus = 0;
if(count($res) > 0){
    $apiStatus = 1;
}
$res[0]->api = $apiStatus;

header("Content-type: application/json");
echo json_encode($res);
