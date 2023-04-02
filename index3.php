<?php
// Echo the response back to the API
header('Content-type: text/plain');

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = ltrim($_POST["phoneNumber"],'+');
$text        = $_POST["text"];

$reponse = "";
if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON What would you want to check \n";
    $response .= "1. Check status \n";
    $response .= "2. Make payments";

} else if ($text == "1") {
    // Business logic for first level response
    
   $reponse =  "Baud rate";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $reponse =  $phoneNumber;

} else{
    $response = "END Invalid Request!";
}


echo $response;


