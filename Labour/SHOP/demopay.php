<?php

//session start
session_start();

require("../Paymentgateway/src/Instamojo.php");
require("./credn.php");
//create api object
$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');


$custid="rajnish";
//storing details in session
//1. payment request creation
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Testing",
        "amount" => '$amount',
        "phone" => '$phone',
        "send_email" => true,
        "email" => '$email',
        "redirect_url" => "http://localhost:8282/Paymentgatway/instamojo_youtube/success.php"
        ));
$url=$response["longurl"];
   header("location:$url");
   
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>