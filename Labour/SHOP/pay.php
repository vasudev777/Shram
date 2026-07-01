<?PHP
include('db.php');
session_start();

if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $total = $_POST['total'];
        $_SESSION["total"]=$total;
        
    // echo "$name";
    // echo  "<br>";
    // echo "$email";
    // echo  "<br>";
    // echo "$number";
    // echo  "<br>";
    // echo "$address";
    // echo  "<br>";
    // echo "$state";
    // echo  "<br>";
    // echo "$city";
    // echo  "<br>";
    // echo "$total";
    // echo  "<br>";
    require("../../Paymentgateway/src/Instamojo.php");


    require("credn.php");
    //create api object
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://test.instamojo.com/api/1.1/');
    

    //1. payment request creation
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "Shram",
            "send_sms" => 1,
            "amount" => $total,
            "phone" => $number,
            "send_email" => true,
            "email" => $email,
            "redirect_url" => "http://localhost/SHRAM/labour/SHOP/success.php"
            ));
    $url=$response["longurl"];
       header("location:$url");
       
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
    
}
?>