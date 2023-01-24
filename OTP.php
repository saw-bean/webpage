<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Registration";

//connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

//check if connection was successful
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


$user_input = $_POST['code'];

$code_from_db = "SELECT * FROM code where otp =  '$user_input'  ";
$result = $conn->query($code_from_db);

if ($result->num_rows>0){
    echo "<script>
    alert('Purchase Succesded. Thank you for shopping with us');
    window.location.href='Front_page.html';
    </script>";
    } 
else {
    echo "<script>
    alert('Invalid OTP');
    window.location.href='OTP.html';
    </script>";
    }

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$phone_from_db = "SELECT * FROM register where ph_no";


//require the Twilio library
require_once 'twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;

// Twilio account SID and auth token
$accountSid = 'SK21e071104d9fcb81c556595f1eb18e9f';
$authToken = '112654bc2c7b62bd596102cc50c01c15';

//create a new instance of the Twilio client
$client = new Client($accountSid, $authToken);

//define the phone number you want to send the message to
$toPhoneNumber = $phone_from_db;

//define the message you want to send
$message = 'Your transcation verificaton code is : $code_from_db ';

//define the phone number you are sending the message from
$fromPhoneNumber =  '32133' ;

//send the message
$client->messages->create(
    $toPhoneNumber,
    array(
        'from' => $fromPhoneNumber,
        'body' => $message
    )
);

echo 'Message sent successfully!';


?>



