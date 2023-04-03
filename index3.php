<?php
// Echo the response back to the API
header('Content-type: text/plain');

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = ltrim($_POST["phoneNumber"],'+');
$text        = $_POST["text"];


if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON What would you want to check \n";
    $response .= "1. Check soil moisture \n";

} else if ($text == "1") {
    // Business logic for first level response
    $filename = 'soil.txt';
    f = fopen($filename, 'r');

    if ($f) {
        $contents = fread($f, filesize($filename));
        fclose($f);
        $response = "The soil moisture is: ".nl2br($contents);
    }


} else{
    $response = "END Invalid Request!";
}


echo $response;


