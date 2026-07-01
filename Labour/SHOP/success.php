<?php

//session start
session_start();

require("../../Paymentgateway/src/Instamojo.php");
require('db.php');
//create api object
$api = new Instamojo\Instamojo('test_73e2c313b6ea15f55e2c0749669', 'test_4638bb64c656484472403513802', 'https://test.instamojo.com/api/1.1/');



try {
   $payment_re_id=$_GET['payment_request_id'];
    $payment_id=$_GET['payment_id'] ;
    $response = $api->paymentRequestPaymentStatus($payment_re_id,$payment_id);

// fetching data from response

$status=$response['status'];

if(strcmp($status,'Failed')==0){

echo('Failed');
}
else
{
   //sending data to database
//$orderid=$_SESSION["orderid"];
$custid=$_SESSION["l_id"];
$amount=$_SESSION["total"];
$paymode=$response["payment"]["instrument_type"];

//  echo "$payment_id"; //id
//     echo  "<br>";
//     echo "$response";
//     echo  "<br>";
//     echo "$number";
//     echo  "<br>";
//     echo "$paymode"; //payment mode
//     echo  "<br>";
//     echo "$status";  //status
//     echo  "<br>";
//     echo "$amount";  //amount
//     echo  "<br>";
//     echo "$custid";  //customer id 
$query="INSERT INTO `labour_item_history` (`payment_id`, `l_id`, `payment_amount`, `payment_mode`, `payment_status`) VALUES ('$payment_id', '$custid', '$amount', '$paymode', '$status')";

if(mysqli_query($conn,$query)){



    echo "<script>alert('Order placed successfully')</script>";
    echo "<script>window.location='index.php'</script>";

}
else{
echo 'Error '.mysqli_error($conn);

}
}

//
    
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>